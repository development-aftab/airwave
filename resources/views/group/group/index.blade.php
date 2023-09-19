@extends('layouts.master')

@push('css')
    <link href="{{asset('plugins/components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet"
          type="text/css"/>
@endpush

@section('content')
<section class="dash_heading_sec">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xs-12">
                <div class="inner_section_heading_wrapper search_space">
                    <div class="top_heading">
                        <h1>Groups</h1>
                    </div>
                    <div class="search_form">
                        <form action="">
                             <div class="add_sticker_btn">
                                <a class="btn btn_primary" href="javascript:void(0)" data-toggle="modal" data-target="#add_group_modal">Add Group</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="dash_orderDetails_sec search_bar_position button_exists">
    <div class="container-fluid" style="padding-top: 0">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                {{--<h3 class="box-title pull-left">{{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Group') }}</h3>
                @can('add-'.str_slug('Group'))
                    <a class="btn btn-success pull-right" href="{{ url('/group/group/create') }}"><i
                                class="icon-plus"></i> Add {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Group') }}</a>
                @endcan--}}
                <div class="clearfix"></div>
                {{--<hr>--}}
                <div class="inner_section_table">
                    <div class="table-responsive">
                        <table class="table" id="myTable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Group Name</th>
                                <th>Num Of People</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($group as $key => $item)
                                <tr>
                                    <td>{{ $loop->iteration??$item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>@if (is_array(@$item->group_emails))
                                        {{ count($item['groupEmails']) }}
                                        @else
                                        {{ count($item['groupEmails']) }}
                                    @endif
                                </td>
                                    <td>{{ $item->status==1?'Enable':'Disable' }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn dropdown-toggle action_btn" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                               {{-- @can('view-'.str_slug('Group'))
                                                <a class="dropdown-item" href="{{ url('/group/group/' . $item->id) }}" title="View {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Group') }}">View</a>
                                                @endcan --}}
                                                @can('edit-'.str_slug('Group'))
                                                <a class="dropdown-item" href="{{ url('/group/group/' . $item->id . '/edit') }}" title="Edit {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Group') }}">Edit</a>
                                                @endcan

                                                <a class="dropdown-item add_email" href="javascript:void(0)" data-toggle="modal" data-id="{{$item->id}}" data-target="#edit_group_modal">Add Email</a>

                                                @can('delete-'.str_slug('Group'))
                                                <form action="" action="{{ url('/group/group' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="dropdown-item" title="Delete {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Group') }}"
                                                        onclick="return confirm(&quot;Confirm delete?&quot;)">Delete</button>
                                                </form>
                                                @endcan
                                            </div>
                                        </div>
                                    </td>

                                    {{--<td>
                                        @can('view-'.str_slug('Group'))
                                            <a href="{{ url('/group/group/' . $item->id) }}"
                                               title="View {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Group') }}">
                                                <button class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye" aria-hidden="true"></i> View
                                                </button>
                                            </a>
                                        @endcan

                                        @can('edit-'.str_slug('Group'))
                                            <a href="{{ url('/group/group/' . $item->id . '/edit') }}"
                                               title="Edit {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Group') }}">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                                </button>
                                            </a>
                                        @endcan
                                        @can('delete-'.str_slug('Group'))
                                            <form method="POST"
                                                  action="{{ url('/group/group' . '/' . $item->id) }}"
                                                  accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                        title="Delete {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Group') }}"
                                                        onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                                </button>
                                            </form>
                                        @endcan
                                    </td>--}}
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $group->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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

        $('.add_email').on('click',function(){
            $('#group_id').val($(this).attr('data-id'));
        })
    </script>

    <script>
        $("#table_filter_search").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tbody tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    </script>

@endpush
