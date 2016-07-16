@extends('layouts.master')

@section('content')
    @include('partials.page-header')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            {{ $title }}
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="alert alert-warning">
                            <strong>Important:</strong> The badge slug needs to directly match the image name.
                            The images I normally use are from the <a href="https://github.com/hubot-scripts/hubot-ingress/tree/master/badges">Hubot Ingress Repository</a>.
                            If the badges has levels, (ie: bronze, silver, etc) be sure to check has_levels.
                            The script will use the slug field and the users selected level to produce a result like <strong>trekker3.png</strong>.
                        </div>
                        {!! Former::open()->action(route('admin.badges.store')) !!}
                        {!! Former::text('name')->required() !!}
                        {!! Former::text('slug')->required() !!}
                        {!! Former::select('has_levels')->label('Has Levels?')->options(['true' => ['value' => 1], 'false' => ['value' => 0]])->select(0)->required() !!}
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