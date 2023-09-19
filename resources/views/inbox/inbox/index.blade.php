@extends('layouts.master')

@push('css')
    <link href="{{asset('plugins/components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet"
          type="text/css"/>

@endpush

@section('content')
    <section class="dash_heading_sec search_space">
        <div class="container-fluid">
            <!-- .row -->
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xs-12">
                    <h1 class="top_heading">{{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Inbox') }}</h1>
                    @can('add-'.str_slug('Inbox'))
                        <a class="btn btn-success pull-right" href="{{ url('/inbox/inbox/create') }}"><i
                                    class="icon-plus"></i> Add {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Inbox') }}</a>
                    @endcan
                    <div class="inner_section_table search_bar_position">
                        <div class="table-responsive">
                            <table class="table" id="myTable">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Recepient</th>
                                    <th>Subject</th>
                                    <th>Date</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($inbox as $item)
                                    <tr>
                                        <td>{{ $loop->iteration??$item->id }}</td>
                                        <td>{{ $item->from??'' }}</td>
                                        <td>{{ str_limit($item->subject??'',50,'...')}}</td>
                                        <td>{{ $item->email_date->format('Y-m-d | H:i:s')}}</td>
                                        <td>

                                            <div class="dropdown">
                                                <button class="btn dropdown-toggle action_btn" type="button"
                                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    @can('view-'.str_slug('Inbox'))
                                                        <a class="dropdown-item" href="{{ url('/inbox/inbox/' . $item->id) }}"
                                                           title="View {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Inbox') }}">
                                                            View
                                                        </a>
                                                    @endcan
                                                    @can('edit-'.str_slug('Inbox'))
                                                        <a class="dropdown-item"  href="{{ url('/inbox/inbox/' . $item->id . '/edit') }}"
                                                           title="Edit {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Inbox') }}">
                                                            Edit
                                                        </a>
                                                    @endcan
                                                    @can('delete-'.str_slug('Inbox'))
                                                        <form method="POST" class="dropdown-item"
                                                              action="{{ url('/inbox/inbox' . '/' . $item->id) }}"
                                                              accept-charset="UTF-8" style="display:inline">
                                                            {{ method_field('DELETE') }}
                                                            {{ csrf_field() }}
                                                            <button type="submit" class=" btn dropdown-toggle action_btn"
                                                                    title="Delete {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Inbox') }}"
                                                                    onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete
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
                            <div class="pagination-wrapper"> {!! $inbox->appends(['search' => Request::get('search')])->render() !!} </div>
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
                //'iDisplayLength': 100,
                'aoColumnDefs': [{
                    'bSortable': false,
                    'aTargets': [-1], /* 1st one, start by the right */
                }]
            });

        });
        $('.content').click(function (e) {
            e.preventDefault();
            var id = $(this).attr('id');
            $('#body' + id).show();
        });
    </script>

@endpush
