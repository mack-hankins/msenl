@extends('layouts.master')

@section('content')
    @include('partials.page-header')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-body">
                        {!! Former::open()->action(route('admin.faqs.store')) !!}
                        {!! Former::text('question')->required() !!}
                        {!! Former::textarea('answer')->required() !!}
                        {!! Former::actions()
                           ->large_success_submit('Create')
                           ->large_inverse_reset('Reset')
                        !!}
                        {!! Former::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection