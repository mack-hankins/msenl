@extends('layouts.master')

@section('content')
    @include('partials.page-header')

    <div class="container" id="agents">
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <div class="caption-subject">
                                Verified MS Agents
                            </div>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table id="agents-table" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th data-priority="1">Agent</th>
                                <th data-priority="2">City</th>
                                <th>State</th>
                                <th>Zip</th>
                                <th data-priority="3">Level</th>
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
            $('#agents-table').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 25,
                order: [[ 4, "desc" ]],
                ajax: '{!! route('agents.data') !!}'
            });
        });
    </script>
@endsection