@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <div class="caption-subject text-uppercase">
                                {{ $title }}
                            </div>
                        </div>
                    </div>
                    <div class="portlet-body">
                        {!! Former::open()->action(route('admin.agents.update', $agent->id))->method('PATCH') !!}
                        {!! Former::actions()
                        ->large_success_submit('Update')
                        ->large_inverse_reset('Reset')
                        !!}
                        {!! Former::text('name')->value($agent->name)->disabled()->required() !!}
                        {!! Former::text('url')->label('Google+ Profile')->value($agent->provider_url)->disabled()->required() !!}
                        {!! Former::text('email')->label('Google+ Email')->value($agent->email)->disabled()->required() !!}
                        {!! Former::text('agent')->label('Agent Name')->value($agent->agent)->required() !!}
                        {!! Former::select('level')
                            ->options($levels, $agent->level)
                            ->required()
                        !!}
                        {!! Former::text('city')->value($agent->city)->disabled() !!}
                        {!! Former::text('state')->value($agent->state)->disabled() !!}
                        {!! Former::text('postalcode')->label('Zip Code')->value($agent->postalcode)->required() !!}
                        {!! Former::text('telegram')->value($agent->telegram)->placeholder('@username') !!}
                        {!! Former::inline_radio('verified')->radios([
                            'true' => ['name' => 'verified', 'value' => '1'],
                            'false' => ['name' => 'verified', 'value' => '0'],
                        ])->check($agent->verified) !!}
                        {!! Former::inline_checkboxes('roles')->checkboxes($roles)->check($checkedRoles) !!}
                        @foreach($badges as $badge)
                            <div class="form-group">
                                <div class="control-label col-lg-2 col-sm-4">
                                    @if($badge->has_levels)
                                        <img class="ingress-badges right"
                                             src="{{ asset('/images/badges/'.$badge->slug.'5.png') }}"/> {{ $badge->name }}&nbsp;
                                    @else
                                        <img class="ingress-badges right"
                                             src="{{ asset('/images/badges/'.$badge->slug.'.png') }}"/> {{ $badge->name }}&nbsp;
                                    @endif
                                </div>
                                @if($badge->has_levels)
                                    <div class="col-lg-10 col-sm-8">
                                        {!! Former::inline_radios('badges['.$badge->id.'][level]')->Label('')->radios($badge->levels)->check($badge->selected)->raw() !!}
                                    </div>
                                @else
                                    <div class="col-lg-10 col-sm-8 margin-top-8">
                                        {!! Former::inline_checkbox('badges['.$badge->id.']')->label('')->checkboxes(['' => ['value' => $badge->id]])->check($badge->selected)->raw() !!}
                                    </div>
                                @endif
                            </div>
                        @endforeach
                        {!! Former::actions()
                           ->large_success_submit('Update')
                           ->large_inverse_reset('Reset')
                        !!}
                        {!! Former::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
