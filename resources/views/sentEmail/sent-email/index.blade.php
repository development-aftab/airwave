@extends('layouts.master')

@push('css')
    <link href="{{asset('plugins/components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet"
          type="text/css"/>
          <style type="text/css">
                .dataTables_filter input {
                border: 3px dashed rgb(38 35 35)!important;  
            }
    .info-box .info-count {
        margin-top: 0px !important;
    }

    .inner_section_table .dataTables_length, .inner_section_table .dataTables_filter{display: block !important;}

</style>
@endpush

@section('content')
    <div class="container-fluid search_space">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                    <h1 class="box-title pull-left">{{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'SentEmail') }}</h1>
                    {{--@can('add-'.str_slug('SentEmail'))
                    <a class="btn btn-success pull-right" href="{{ url('/sentEmail/sent-email/create') }}"><i
                                    class="icon-plus"></i> Add {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'SentEmail') }}</a>
                    @endcan--}}
                    <div class="clearfix"></div>
                        <div class="inner_section_table search_bar_position">
                            <div class="table-responsive">
                                <table class="table table-fixed sticker_table" id="myTable">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Group</th>
                                        <th>Campaign</th>
                                        <th>Recepient</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sentemail as $item)
                                        <tr>
                                            <td>{{ $loop->iteration??$item->id }}</td>
                                            <td>{{ $item->group->name??'' }}</td>
                                            <td>{{ $item->campaign->name??'' }}</td>
                                            <td>{{ $item->to??'' }}</td>
                                            <td>{{ $item->created_at->format('Y-m-d | h:i:s') }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn dropdown-toggle action_btn" type="button"
                                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <i class="fa-solid fa-ellipsis"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        @can('view-'.str_slug('SentEmail'))
                                                        <a class="dropdown-item" href="{{ url('/sentEmail/sent-email/' . $item->id) }}">View</a>
                                                        @endcan
                                                        @can('edit-'.str_slug('SentEmail'))
                                                        <a class="dropdown-item" href="{{ url('/sentEmail/sent-email/' . $item->id . '/edit') }}"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                                        @endcan
                                                        @can('delete-'.str_slug('SentEmail'))
                                                        {{--<a class="dropdown-item" href="javascript:void(0)" data-toggle="modal" data-target="#delete_mail_confirm_modal">Delete</a>--}}
                                                        <form method="POST"
                                                        action="{{ url('/sentEmail/sent-email' . '/' . $item->id) }}"
                                                        accept-charset="UTF-8" style="display:inline">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                            <button type="submit" class="dropdown-item"
                                                                    title="Delete {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'SentEmail') }}"
                                                                    onclick="return confirm(&quot;Confirm delete?&quot;)">Delete
                                                            </button>
                                                        </form>
                                                        @endcan
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="pagination-wrapper"> {!! $sentemail->appends(['search' => Request::get('search')])->render() !!} </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script src="{{asset('plugins/components/toast-master/js/jquery.toast.js')}}"></script>

    <script src="{{asset('plugins/components/datatables/jquery.dataTables.min.js')}}"></script>
    <!-- start - This is for export functionality only -->
    <!-- end - This is for export functionality only -->
    <script>
        $(document).ready(function () {

            @if(\Session::has('message'))
            $.toast({
                heading: 'Success!',
                position: 'top-center',
                text: '{{session()->get('message')}}',
                loaderBg: '#ff6849',
                icon: 'success',
                hideAfter: 3000,
                stack: 6
            });
            @endif
        })

        $(function () {
            $('#myTable').DataTable({
                "bPaginate": false,
                "bInfo": false,
                'aoColumnDefs': [{
                    'bSortable': false,
                    'aTargets': [-1] /* 1st one, start by the right */
                }]
            });

        });
    </script>

@endpush
