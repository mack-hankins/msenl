@extends('layouts.master')

@section('content')
    @include('partials.page-header')

    <div class="container">
        <div class="row">
            <div class="col-md-12 page-404">
                <div class="number font-green"> 404 </div>
                <div class="details">
                    <h3>Not an active page.</h3>
                    <p> You must be lost.
                        <br/>
                        <a href="{{ route('/') }}"> Return home </a></p>
                </div>
            </div>
        </div>
    </div>
@endsection    