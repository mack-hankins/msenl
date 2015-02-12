@extends('_layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-body">
                        {{ Former::open_for_files()->action(URL::action('App\Controllers\Pub\EnemyPortalsController@update'))->rules(['owner' => 'required','json_file' => 'required'])}}
                        {{ Former::text('owner')->required() }}
                        {{ Former::file('json_file')->required() }}
                        {{ Former::actions()
                           ->large_primary_submit('Submit')
                           ->large_inverse_reset('Reset')
                        }}
                        {{ Former::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection