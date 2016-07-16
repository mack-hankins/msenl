<?php

namespace Msenl\Http\Controllers;

use Illuminate\Http\Request;

use Msenl\Http\Requests;
use Msenl\Repositories\FaqRepositoryInterface;
use Breadcrumbs;

/**
 * Class FaqController
 * @package Msenl\Http\Controllers
 */
class FaqController extends Controller
{

    /**
     * FaqController constructor.
     * @param FaqRepositoryInterface $faq
     */
    public function __construct(FaqRepositoryInterface $faq)
    {
        $this->faq = $faq;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        $faqs = $this->faq->allByOrder();

        $title = 'Frequently Asked Questions';

        $breadcrumbs = Breadcrumbs::render('faq');

        return view('pub.faq')->with(compact('title', 'breadcrumbs', 'faqs'));
    }
}
