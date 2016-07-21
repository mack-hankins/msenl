@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-body">
                        {!! Former::open()->action(URL::action('Auth\AuthController@submit')) !!}
                        {!! Former::text('name')->value($userData->name)->disabled()->required() !!}
                        {!! Former::text('url')->label('Google+ Profile')->value($userData->user['url'])->disabled()->required() !!}
                        {!! Former::text('email')->label('Google+ Email')->value($userData->email)->disabled()->required() !!}
                        {!! Former::text('agent')->label('Agent Name')->required() !!}
                        {!! Former::select('level')
                            ->options($levels, 1)
                            ->required()
                        !!}
                        {!! Former::actions()
                           ->large_success_submit('Complete')
                           ->large_inverse_reset('Reset')
                        !!}
                        {!! Former::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection