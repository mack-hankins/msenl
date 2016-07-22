@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12 page-404">
            <div class="portlet light bordered">
                <div class="number font-red"> 403</div>
                <div class="details">
                    <h3>Access Denied.</h3>
                    <p> You must be lost.
                        <br/>
                        <a href="{{ route('/') }}"> Return home </a></p>
                </div>
            </div>
        </div>
    </div>
@endsection    