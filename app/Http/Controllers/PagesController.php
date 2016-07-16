<?php

namespace Msenl\Http\Controllers;

use Breadcrumbs;

/**
 * Class PagesController
 * @package Msenl\Http\Controllers
 */
class PagesController extends Controller
{


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function QuickStart()
    {
        $title = 'Quick Start';
        $description = 'Welcome to the Enlightened! This guide is meant to provide you with basic knowledge to get you through the first levels and start you towards Level 8.';
        $breadcrumbs = Breadcrumbs::render('quickstart');

        return view('pub.quick_start', compact('title', 'description', 'breadcrumbs'));
    }
}
