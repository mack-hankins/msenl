<?php

namespace Msenl\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;

use Msenl\Http\Requests;
use Msenl\Http\Controllers\Controller;
use Msenl\Http\Requests\AgentRequest;
use Msenl\Repositories\BadgeRepositoryInterface;
use Msenl\Repositories\RoleRepositoryInterface;
use Msenl\Repositories\UserRepositoryInterface;
use Msenl\Support\Helper;
use PragmaRX\ZipCode\Contracts\ZipCode;
use Yajra\Datatables\Facades\Datatables;

/**
 * Class AgentsController
 * @package Msenl\Http\Controllers\Admin
 */
class AgentsController extends Controller
{

    /**
     * @var UserRepositoryInterface
     */
    protected $users;

    /**
     * @var ZipCode
     */
    protected $zipCode;

    protected $badges;

    protected $roles;

    /**
     * AgentsController constructor.
     * @param UserRepositoryInterface $users
     * @param ZipCode $zipCode
     * @param BadgeRepositoryInterface $badges
     * @param RoleRepositoryInterface $roles
     */
    public function __construct(
        UserRepositoryInterface $users,
        ZipCode $zipCode,
        BadgeRepositoryInterface $badges,
        RoleRepositoryInterface $roles
    ) {
        $this->users = $users;
        $this->zipcode = $zipCode;
        $this->badges = $badges;
        $this->roles = $roles;
        $this->middleware('purifier', ['only' => ['update', 'destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Manage Agents';

        return view('admin.agents.index')->with(compact('title'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agent = $this->users->find($id);

        $title = 'Edit Agent';

        $levels = collect(range(0, 16))->values()->toArray();

        $badges = collect($this->badges->all())->each(function ($badge) {
            if ($badge->has_levels == 1) {
                return $badge->setAttribute('levels', $this->badges->badgeLevels());
            }
        })->keyBy('id')->each(function ($badge) use ($agent) {

            collect($this->users->userBadges($agent))->each(function ($user_badge) use ($badge) {
                if ($badge->id == $user_badge->id) {

                    if ($user_badge->pivot->level > 0) {
                        return $badge->setAttribute('selected', $user_badge->pivot->level);
                    }

                    return $badge->setAttribute('selected', 'badges[' . $user_badge->id . ']_0');
                }
            })->toArray();
        });

        $roles = collect($this->roles->all())->map(function ($role) {
            return [
                'id' => $role->name,
                'label' => $role->name,
                'name' => 'roles['.$role->id.']',
                'value' => $role->id,
            ];
        })->keyBy('label')->toArray();

        $checkedRoles = Helper::checkedObject($agent->roles, 'roles');

        return view('admin.agents.edit')
            ->with(compact('title', 'agent', 'levels', 'badges', 'roles', 'checkedRoles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request|AgentRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(AgentRequest $request, $id)
    {
        $zip = $this->zipcode->find($request->postalcode);

        $input = $request->input();

        $addresses = collect($zip['addresses'])->map(function ($address) {
            return [
                'city'       => $address['city'],
                'state'      => $address['state_id'],
                'postalcode' => $address['postal_code'],
            ];
        })->last();

        $new_input = array_merge($input, $addresses);

        $this->users->update($id, $new_input, true);

        return redirect()->route('admin.agents.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->users->destroy([$id]);

        return redirect()->route('admin.agents.index');
    }

    /**
     * @return mixed
     */
    public function data()
    {
        $users = $this->users->allUsers();

        $verified = Datatables::of($users);
        $verified->editColumn('verified', '@if($verified) true @else false @endif');
        $verified->addColumn('actions', '
       {!! Former::open_inline()->action(route(\'admin.agents.destroy\', $id))->method(\'DELETE\') !!}
        <a href="{{ route(\'admin.agents.edit\', $id) }}" class="btn btn-xs btn-outline blue">
        <i class="fa fa-edit"></i>
        </a>
       <button class="btn btn-xs btn-outline red"><i class="fa fa-trash"></i></button>
       {!! Former::close() !!}
        ');

        return $verified->make();
    }
}
