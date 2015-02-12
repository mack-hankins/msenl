<?php namespace Msenl\Http\Controllers;

use View;

class IndexController extends BaseController {

    public function index()
    {
        return View::make('pub.index');
    }

}
