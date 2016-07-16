@extends('layouts.master')

@section('content')

    @include('partials.page-header')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="actions pull-right">
                        <a href="{{ route('admin.faqs.create') }}"
                           class="btn btn-circle primary-color btn-outline bold uppercase">
                            <i class="fa fa-plus"></i> Create
                        </a>
                    </div>
                    <div class="portlet-body">
                        <div class="alert alert-warning">You may reorder the faq by dragging and dropping on the order column.</div>
                        <table
                                id="faq-table"
                                class="table table-striped table-bordered dt-responsive nowrap"
                                cellspacing="0"
                                width="100%"
                        >
                            <thead>
                            <tr>
                                <th data-priority="3">ID</th>
                                <th data-priority="1">Question</th>
                                <th>Order</th>
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
            var table = $('#faq-table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                paging: false,
                bInfo: false,
                rowReorder: {
                    selector: 'td:nth-child(3)'
                },
                scrollY: 450,
                pageLength: 25,
                order: [[2, 'asc']],
                columnDefs: [
                    { orderable: true, className: 'reorder', targets: 2 },
                ],
                ajax: '{!! route('admin.faqs.data') !!}'
            });

            table.on( 'row-reorder', function ( e, diff, edit ) {
                var result = [];

                for ( var i=0, ien=diff.length ; i<ien ; i++ ) {
                    var rowData = table.row( diff[i].node ).data();

                    result.push(rowData[0], diff[i].newPosition);
                }

                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    url: '{!! route('admin.faqs.update_order') !!}',
                    data: {moves: result },
                });

                //$('#result').html( 'Event result:<br>'+result );
            } );
        });
    </script>
@endsection