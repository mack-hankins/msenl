<?php

namespace Msenl\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Msenl\Http\Requests;
use Msenl\Http\Controllers\Controller;
use Msenl\Http\Requests\BadgeRequest;
use Msenl\Repositories\BadgeRepositoryInterface;
use Yajra\Datatables\Facades\Datatables;

/**
 * Class BadgesController
 * @package Msenl\Http\Controllers\Admin
 */
class BadgesController extends Controller
{

    /**
     * BadgeController constructor.
     * @param BadgeRepositoryInterface $badges
     */
    public function __construct(BadgeRepositoryInterface $badges)
    {
        $this->badges = $badges;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Manage Badges';

        return view('admin.badges.index')->with(compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create Badge';

        return view('admin.badges.create')->with(compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request|BadgeRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BadgeRequest $request)
    {
        dd($request->input());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @return mixed
     */
    public function data()
    {
        $badges = $this->badges->tableData();

        $table = Datatables::of($badges);
        $table->addColumn('action', '');
        return $table->make();
    }
}
