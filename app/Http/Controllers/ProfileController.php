<?php

namespace Msenl\Http\Controllers;

use Illuminate\Http\Request;
use Msenl\Http\Requests\AgentRequest;
use Msenl\Repositories\BadgeRepositoryInterface;
use Msenl\Repositories\UserRepositoryInterface;
use Datatables;
use PragmaRX\ZipCode\Contracts\ZipCode;
use Breadcrumbs;

/**
 * Class ProfileController
 * @package Msenl\Http\Controllers
 */
class ProfileController extends Controller
{

    /**
     * @var UserRepositoryInterface
     */
    protected $users;

    /**
     * @var
     */
    protected $zipCode;

    /**
     * @var BadgeRepositoryInterface
     */
    protected $badges;

    /**
     * ProfileController constructor.
     * @param UserRepositoryInterface $users
     * @param ZipCode $zipCode
     * @param BadgeRepositoryInterface $badges
     */
    public function __construct(UserRepositoryInterface $users, ZipCode $zipCode, BadgeRepositoryInterface $badges)
    {
        $this->users = $users;
        $this->zipcode = $zipCode;
        $this->badges = $badges;
        $this->middleware(['allowed', 'purifier'], ['only' => ['edit','update','destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Verified MS Agents';
        $description = 'This is a list of veririfed MS Agents';
        $breadcrumbs = Breadcrumbs::render('agents');

        return view('pub.agents')->with(compact('title', 'description', 'breadcrumbs'));
    }

    /**
     * Display the specified resource.
     *
     * @param  string $agent
     * @return \Illuminate\Http\Response
     */
    public function show($agent)
    {
        $user = $this->users->findByAgentName($agent);

        $title = 'Agent '.$user->agent;

        if($user->verified)
        {
            $description = 'The status of this agent is verified';
        }else{
            $description = 'The status of this agent is unverified';
        }

        $badges = collect($this->users->userBadges($user))->map( function ($badge) {
            if($badge->has_levels)
            {
                return $badge->slug.$badge->pivot->level;
            }

            return $badge->slug;
        })->toArray();

        $breadcrumbs = Breadcrumbs::render('profile', $user);

        $avatar = str_replace('sz=50', 'sz=150', $user->avatar);

        $telegram = str_replace('@', '', $user->telegram);

        return view('pub.profile')->with(compact('title', 'description', 'breadcrumbs', 'user', 'avatar', 'telegram', 'badges'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $title = 'Update Profile';

        $agent = $this->users->find($id);

        $breadcrumbs = Breadcrumbs::render('edit_profile', $agent);

        $levels = collect(range(0, 16))->values()->toArray();

        $badges = collect($this->badges->all())->each( function ($badge) {
            if($badge->has_levels == 1) {
                return $badge->setAttribute('levels', $this->badges->badgeLevels());
            }
        })->keyBy('id')->each( function($badge) use ($agent) {

            collect($this->users->userBadges($agent))->each( function($user_badge) use($badge) {
                if($badge->id == $user_badge->id){

                    if($user_badge->pivot->level > 0)
                    {
                        return $badge->setAttribute('selected', $user_badge->pivot->level);
                    }

                    return $badge->setAttribute('selected', 'badges['.$user_badge->id.']_0');
                }
            })->toArray();
        });

        //dd($badges);

        return view('pub.edit-profile')->with(compact('title', 'agent', 'breadcrumbs', 'levels', 'badges'));
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

        $user = $this->users->update($id, $new_input, false);

        return redirect()->route('agents.show', $user->agent);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->users->destroy([$id]);

        return redirect()->route('agents.index');
    }

    /**
     * @return mixed
     */
    public function verifiedAgents()
    {
        $users = $this->users->allVerifiedMSUsers();

        $table = Datatables::of($users);
        $table->editColumn('agent', '<img src="{{ $avatar }}" class="profile-img xsm" /> <a href="{!! route("agents.show", $agent) !!}">{{ $agent }}</a>');
        $table->editColumn('verified_on', '{{ \Carbon\ Carbon::parse($verified_on)->toFormattedDateString() }}');
        return $table->make();
    }

}
