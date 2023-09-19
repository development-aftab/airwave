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
<section class="dash_heading_sec">
    <div class="container-fluid ">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xs-12">
                <div class="inner_section_heading_wrapper search_space">
                    <div class="top_heading">
                        <h1>Manage Email User</h1>
                    </div>
                    <div class="search_form ">
                        <form action="">
                            <div class="download_sticker_btn">
                                <a class="btn btn_primary" onclick="document.getElementsByClassName('buttons-excel')[0].click();" href="javascript:void(0)">Download Logs</a>
                            </div>
                            <div class="filter_btn">
                                <a class="btn btn_primary" href="javascript:void(0)" data-toggle="modal" data-target="#upload_csv_modal">
                                    Upload CSV
                                </a>
                            </div>
                            <div class="add_sticker_btn">
                                <a class="btn btn_primary" href="javascript:void(0)" data-toggle="modal" data-target="#add_users_modal">Add User</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="dash_orderDetails_sec remove_download_btn search_bar_position button_exists">
    <div class="container-fluid" style="padding-top: 0;">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                {{--<h3 class="box-title pull-left">{{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'EmailUser') }}</h3>
                @can('add-'.str_slug('EmailUser'))
                    <a class="btn btn-success pull-right" href="{{ url('/emailUser/email-user/create') }}"><i
                                class="icon-plus"></i> Add {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'EmailUser') }}</a>
                @endcan --}}
                <div class="clearfix"></div>
                {{--<hr>--}}
                <div class="inner_section_table">
                    <div class="table-responsive">
                        <table class="table table table-fixed sticker_table" id="myTable">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Group</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($emailuser as $item)
                                <tr>
                                    <td>
                                        {{-- {{ $loop->iteration??$item->id }} --}}
                                        <div class="custom_checkbox">
                                            <input id="chk_<?php echo $item->id ?>" type="checkbox" name="" id="">
                                            <label class="custom_check" for="chk_<?php echo $item->id ?>"></label>
                                        </div>
                                    </td>
                                    <td>{{ @$item->group->name??'' }}</td>
                                    <td>{{ $item->name??'' }}</td>
                                    <td>{{ $item->email??'' }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn dropdown-toggle action_btn" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                {{-- @can('view-'.str_slug('EmailUser'))
                                                <a class="dropdown-item" href="{{ url('/emailUser/email-user/' . $item->id) }}"
                                               title="View {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'EmailUser') }}">View</a>
                                                @endcan --}}
                                                @can('edit-'.str_slug('EmailUser'))
                                                <a class="dropdown-item" href="{{ url('/emailUser/email-user/' . $item->id . '/edit') }}"
                                               title="Edit {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'EmailUser') }}">Edit</a>
                                                @endcan
                                                @can('delete-'.str_slug('EmailUser'))
                                                <form action="{{ url('/emailUser/email-user' . '/' . $item->id) }}"
                                                  accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="dropdown-item" title="Delete {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'EmailUser') }}"
                                                        onclick="return confirm(&quot;Confirm delete?&quot;)">Delete</button>
                                                </form>
                                                @endcan
                                            </div>
                                        </div>
                                    </td>
                                    {{--<td>
                                        @can('view-'.str_slug('EmailUser'))
                                            <a href="{{ url('/emailUser/email-user/' . $item->id) }}"
                                               title="View {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'EmailUser') }}">
                                                <button class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye" aria-hidden="true"></i> View
                                                </button>
                                            </a>
                                        @endcan

                                        @can('edit-'.str_slug('EmailUser'))
                                            <a href="{{ url('/emailUser/email-user/' . $item->id . '/edit') }}"
                                               title="Edit {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'EmailUser') }}">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                                </button>
                                            </a>
                                        @endcan

                                        @can('delete-'.str_slug('EmailUser'))
                                            <form method="POST"
                                                  action="{{ url('/emailUser/email-user' . '/' . $item->id) }}"
                                                  accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                        title="Delete {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'EmailUser') }}"
                                                        onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                                </button>
                                            </form>
                                        @endcan
                                    </td>--}}
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $emailuser->appends(['search' => Request::get('search')])->render() !!} </div>
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
     <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.colVis.min.js"></script>
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

        // $(function () {
        //     $('#myTable').DataTable({
        //         'aoColumnDefs': [{
        //             'bSortable': false,
        //             'aTargets': [-1] /* 1st one, start by the right */
        //         }]
        //     });

        // });
          var colsToExport = [1, 2,3]; // the first column has an index of 0
  var table = $('#myTable').DataTable( {
      "bInfo": false,
    "bPaginate": false,
    dom: 'Brftip',
    buttons: [
      // {
      //   extend: 'pdf', 
      //   text: 'Download Logs in PDF',
      //   exportOptions: {
      //     columns: colsToExport
      //   }
      // },
      {
        extend: 'excel', 
        text: 'Download Logs',
        exportOptions: {
          columns: colsToExport
        }
      }
      // {
      //   extend: 'csv', 
      //   text: 'Download Logs in CSV',
      //   exportOptions: {
      //     columns: colsToExport
      //   }
      // }
    ]
  });
      
    </script>

    <script>
        $("#table_filter_search").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tbody tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    </script>

<script>
    jQuery(".upload_csv_input").on("change", function(e){
        var fileName = e.target.files[0].name;
        // alert(fileName);
        jQuery("#upload_csv_modal .inner_section_upload_field .upload_field .file_name").html(fileName);
    });
</script>

@endpush