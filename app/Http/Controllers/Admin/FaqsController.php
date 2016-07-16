<?php

namespace Msenl\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Msenl\Http\Requests;
use Msenl\Http\Controllers\Controller;
use Msenl\Http\Requests\FaqRequest;
use Msenl\Repositories\FaqRepositoryInterface;
use Yajra\Datatables\Facades\Datatables;

/**
 * Class FaqsController
 * @package Msenl\Http\Controllers\Admin
 */
class FaqsController extends Controller
{

    /**
     * FaqController constructor.
     * @param FaqRepositoryInterface $faq
     */
    public function __construct(FaqRepositoryInterface $faq)
    {
        $this->faq = $faq;
        $this->middleware('purifier', ['only' => ['store', 'update', 'destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Manage FAQs';

        return view('admin.faq.index')->with(compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create FAQ';

        return view('admin.faq.create')->with(compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request|FaqRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(FaqRequest $request)
    {
        $input = $request->input();

        $order = $this->faq->lastOrder() + 1;

        $input = array_add($input, 'order', $order);

        $this->faq->store($input);

        return redirect()->route('admin.faqs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Edit FAQ';
        
        $faq = $this->faq->find($id);
        
        return view('admin.faq.edit')->with(compact('title', 'faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request|FaqRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(FaqRequest $request, $id)
    {
        $this->faq->update($request->input(), $id);

        return redirect()->route('admin.faqs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $ids = collect($id);

        $this->faq->destroy($ids);

        return redirect()->route('admin.faqs.index');
    }

    /**
     * @return mixed
     */
    public function data()
    {
        $faqs = $this->faq->tableData();

        $table = Datatables::of($faqs);
        $table->addColumn('actions', '
       {!! Former::open_inline()->action(route(\'admin.faqs.destroy\', $id))->method(\'DELETE\') !!}
        <a href="{{ route(\'admin.faqs.edit\', $id) }}" class="btn btn-xs btn-outline blue">
        <i class="fa fa-edit"></i>
        </a>
       <button class="btn btn-xs btn-outline red"><i class="fa fa-trash"></i></button>
       {!! Former::close() !!}
        ');

        return $table->make();
    }

    /**
     * @param Request $request
     */
    public function updateOrder(Request $request)
    {
        collect($request->moves)->chunk(2)->each(function ($item, $key) {
            $id = $item->first();
            $newOrder = $item->last();
            $this->faq->updateOrder($id, $newOrder);
        });
    }
}
