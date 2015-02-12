<?php

namespace Msenl\Http\Controllers;


use Illuminate\Support\Facades\View;
use Diego1araujo\Titleasy\Titleasy as Title;


class PagesController extends BaseController {


    public function QuickStart()
    {
        $title = Title::put('Quick Start');
        $description = 'Welcome to the Enlightened! This guide is meant to provide you with basic knowledge to get you through the first levels and start you towards Level 8.';

        return View::make('pub.quick_start', compact('title', 'description'));
    }

}