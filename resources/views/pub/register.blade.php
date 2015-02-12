@extends('_layouts.master')

@section('content')

    @include('_partials.page-header')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-body">
                        {{ Former::open()->action(URL::action('Msenl\Controllers\AuthController@submit')) }}
                        {{ Former::text('name')->value($register['name'])->readonly()->required() }}
                        {{ Former::text('link')->label('Google+ Profile')->value($register['link'])->readonly()->required() }}
                        {{ Former::text('email')->label('Google+ Email')->value($register['email'])->readonly()->required() }}
                        {{ Former::text('agent')->label('Agent Name')->required() }}
                        {{ Former::inline_radios('faction')
                        ->radios([
                            'enlightened' => ['value' => '1'],
                            'resistance' => ['value' => '0'],
                        ])->check('1')->required()
                         }}
                        {{ Former::select('level')
                            ->options($levels)
                            ->required()
                        }}
                        {{ Former::hidden('avatar')->value($register['picture']) }}
                        {{ Former::actions()
                           ->large_primary_submit('Complete')
                           ->large_inverse_reset('Reset')
                        }}
                        {{ Former::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection