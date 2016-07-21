@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="cpation">
                            <div class="caption-subject">
                                Manage Agents
                            </div>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table id="agents-verified" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th data-priority="3">ID</th>
                                <th data-priority="1">Agent</th>
                                <th>Email</th>
                                <th>Verified</th>
                                <th>Level</th>
                                <th>City</th>
                                <th>State</th>
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
            $('#agents-verified').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                pageLength: 25,
                order: [[ 0, "asc" ]],
                ajax: '{!! route('admin.agents.data') !!}'
            });
        });
    </script>
@endsection