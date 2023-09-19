@extends('layouts.master')

@push('css')

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />


<style>
    .info-box .info-count {
        margin-top: 0px !important;
    }
</style>
@endpush

@section('content')

<section class="dash_heading_sec">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xs-12">
                <div class="inner_section_heading_wrapper">
                    <div class="top_heading">
                        <h1>Email Logs</h1>
                    </div>
                    <div class="search_form">
                        <form action="">
                            <div class="txt_field">
                                <i class="fa-regular fa-calendar"></i>
                                <input class="form-control" name="dates" type="text">
                            </div>
                            <div class="txt_field">
                                <!-- <i class="fa-solid fa-magnifying-glass"></i> -->
                                <select class="form-control" name="" id="">
                                    <option value="0">Any Status</option>
                                    <option value="0">New</option>
                                    <option value="0">Delivered</option>
                                    <option value="0">Pending</option>
                                </select>
                            </div>
                            <div class="txt_field">
                                <i class="fa-solid fa-magnifying-glass"></i>
                                <input class="form-control" type="text" placeholder="Search">
                            </div>
                            <!-- <div class="search_btn">
                                <input class="btn btn_primary" type="submit" value="Search">
                            </div> -->
                            <div class="filter_btn">
                                <a class="btn btn_primary" href="javascript:void(0)">
                                    Download Logs
                                </a>
                            </div>
                            <!-- <div class="add_sticker_btn">
                                <a class="btn btn_primary" href="javascript:void(0)" data-toggle="modal" data-target="#add_users_modal">Add User</a>
                            </div> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="dash_orderDetails_sec">
    <div class="container-fluid">
        <div class="row">
            <!-- <div class="col-md-12 col-lg-12 col-xs-12">
                <div class="inner_section_heading_wrapper">
                    <div class="top_heading">
                        <h1>Recent Emails</h1>
                    </div>
                    <div class="btn_sec">
                        <a class="btn btn_primary" href="#!">View All</a>
                    </div>
                </div>
            </div> -->
            <div class="col-md-12 col-lg-12 col-xs-12">
                <div class="inner_section_table">
                    <div class="table-responsive">
                        <table class="table table-fixed sticker_table">
                            <thead>
                                <tr>
                                    <!-- <th>
                                        <div class="checkbox checkbox-info">
                                            <input id="c1" type="checkbox">
                                            <label for="c1"></label>
                                        </div>
                                    </th> -->
                                    <th scope="col">From</th>
                                    <th scope="col">Timestamp</th>
                                    <th scope="col">Event(Status)</th>
                                    <th scope="col">Recipient</th>
                                    <th scope="col">Open</th>
                                    <th scope="col">Click</th>
                                    <th scope="col">Subject</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($result['messages'] as $key => $item)
                                @php $eventdate=\Carbon\Carbon::createFromFormat('Y-m-d\TH:i:s\Z',@$item['last_event_time']);@endphp
                                <tr>
                                    <td>{{ @$item['from_email']??'N/A' }}</td>
                                    <td>{{$eventdate->format('Y-m-d H:i:A')??'N/A'}}</td>
                                    <td>{{@$item['status']??'N/A'}}</td>
                                    <td>{{@$item['to_email']??'N/A' }}</td>
                                    <td>{{@$item['opens_count']??'N/A'}}</td>
                                    <td>{{@$item['clicks_count']??'N/A'}}</td>
                                    <td>{{@$item['subject']??'N/A'}}</td>
                                </tr>
                            @endforeach
                           {{-- <?php for ($x = 0; $x <= 6; $x++) { ?>
                                <tr>
                                    <td>
                                        <div class="custom_checkbox">
                                            <input id="chk_<?php echo $x ?>" type="checkbox" name="" id="">
                                            <label class="custom_check" for="chk_<?php echo $x ?>"></label>
                                        </div>
                                    </td>
                                    <td>John Smith</td>
                                    <td>2022-11-02  |  07:29:24</td>
                                    <td>Delivered</td>
                                    <td>jahmed@datalushq.com</td>
                                    <td>Email has been delivered.</td>
                                    <!-- <td>
                                        <div class="dropdown">
                                            <button class="btn dropdown-toggle action_btn" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="javascript:void(0)">Send</a>
                                                <a class="dropdown-item" href="{{ route('edit_campaign') }}">Edit</a>
                                                <a class="dropdown-item" href="javascript:void(0)">Delete</a>
                                            </div>
                                        </div>
                                    </td> -->
                                </tr>
                                <?php } ?>--}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('js')

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<script>
    $('input[name="dates"]').daterangepicker();
</script>

<script src="{{asset('js/db1.js')}}"></script>

<script>
    jQuery(".upload_csv_input").on("change", function(e){
        var fileName = e.target.files[0].name;
        // alert(fileName);
        jQuery("#upload_csv_modal .inner_section_upload_field .upload_field .file_name").html(fileName);
    });
</script>

@endpush