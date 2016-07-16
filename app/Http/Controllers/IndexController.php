<?php namespace Msenl\Http\Controllers;

/**
 * Class IndexController
 * @package Msenl\Http\Controllers
 */
class IndexController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('pub.index');
    }
}
