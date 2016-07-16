@extends('layouts.master')

@section('content')

    @include('partials.page-header')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <div class="caption-subject">
                                {{ $title }}
                            </div>
                        </div>
                        <div class="actions">
                            <a href="{{ route('admin.badges.create') }}" class="btn btn-sm btn-circle btn-outline primary-color"><i class="fa fa-plus"></i> Create</a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table id="badges-table" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th data-priority="3">ID</th>
                                <th data-priority="1">Name</th>
                                <th>Slug</th>
                                <th>Has Levels</th>
                                <th data-priority="2">Actions</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#badges-table').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 25,
                order: [[ 0, "asc" ]],
                ajax: '{!! route('admin.badges.data') !!}'
            });
        });
    </script>
@endsection