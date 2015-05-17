@extends('layouts.master')

@section('content')

    @include('partials.page-header')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-body">
                        {!! Former::open()->action(URL::action('Auth\AuthController@submit')) !!}
                        {!! Former::text('name')->value($userData->name)->readonly()->required() !!}
                        {!! Former::text('url')->label('Google+ Profile')->value($userData->user['url'])->readonly()->required() !!}
                        {!! Former::text('email')->label('Google+ Email')->value($userData->email)->readonly()->required() !!}
                        {!! Former::text('agent')->label('Agent Name')->required() !!}
                        {!! Former::inline_radios('faction')
                        ->radios([
                            'enlightened' => ['value' => '1'],
                            'resistance' => ['value' => '0'],
                        ])->check('1')->required()
                         !!}
                        {!! Former::select('level')
                            ->options($levels)
                            ->required()
                        !!}
                        {!! Former::hidden('avatar')->value($userData->avatar) !!}
                        {!! Former::hidden('provider')->value($provider) !!}
                        {!! Former::hidden('provider_id')->value($userData->id) !!}
                        {!! Former::actions()
                           ->large_primary_submit('Complete')
                           ->large_inverse_reset('Reset')
                        !!}
                        {!! Former::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection