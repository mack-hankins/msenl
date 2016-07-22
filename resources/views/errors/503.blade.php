@extends('layouts.master')

@section('content')
        <div class="row">
            <div class="col-md-12 page-500">
                <div class="number font-green"> 503 </div>
                <div class="details">
                    <h3>Not an active page.</h3>
                    <p> You must be lost.
                        <br/>
                        <a href="{{ route('/') }}"> Return home </a></p>
                </div>
            </div>
        </div>
@endsection