@extends('layouts.master')

@push('css')

<link href="{{asset('plugins/components/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet"
    type="text/css" />
<link href="{{asset('plugins/components/custom-select/custom-select.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('plugins/components/switchery/dist/switchery.min.css')}}" rel="stylesheet" />
<link href="{{asset('plugins/components/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet" />
<link href="{{asset('plugins/components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}" rel="stylesheet" />
<link href="{{asset('plugins/components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css')}}"
    rel="stylesheet" />

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
                        <h1>Edit Campaign</h1>
                    </div>
                    <div class="search_form">
                        <form action="">
                            <!-- <div class="txt_field">
                                <i class="fa-solid fa-magnifying-glass"></i>
                                <input class="form-control" type="text" placeholder="Search">
                            </div> -->
                            <!-- <div class="search_btn">
                                <input class="btn btn_primary" type="submit" value="Search">
                            </div> -->
                            <!-- <div class="filter_btn">
                                <a class="btn btn_primary" href="javascript:void(0)">
                                    Create Campaign
                                </a>
                            </div> -->
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
                <div class="inner_section_mail_section white_box">
                    <form action="">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="txt_field_white">
                                    <label>Title</label>
                                    <input class="form-control" type="text" name="campaign_title" id=""
                                        placeholder="Title Here">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="txt_field_white">
                                    <label>Subject</label>
                                    <input class="form-control" type="text" name="campaign_subject" id=""
                                        placeholder="Subject">
                                </div>
                            </div>
                            <!-- <div class="col-md-12 col-sm-12">
                                <div class="txt_field_white">
                                    <label>Subject</label>
                                    <input class="form-control" type="text" name="subject" id="" placeholder="">
                                </div>
                            </div> -->
                            <div class="col-md-12 col-sm-12">
                                <div class="txt_field_white">
                                    <label>Message</label>
                                    <div id="editor">This is some sample content.</div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="inner_section_submit_btn">
                                    <!-- <a class="btn btn_primary" href="javescript:void(0)">Remove User</a> -->
                                    <input class="btn btn_primary" type="submit" value="Save">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('js')

<script src="{{asset('plugins/components/custom-select/custom-select.min.js')}}" type="text/javascript"></script>
<script src="{{asset('plugins/components/bootstrap-select/bootstrap-select.min.js')}}" type="text/javascript"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js"></script>

<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
</script>

<script>
    jQuery(document).ready(function () {
        $(".select2").select2();
        $('.selectpicker').selectpicker();
    });
</script>

<script src="{{asset('js/db1.js')}}"></script>

@endpush