@extends('layouts.master')

@push('css')
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
                        <h1>View Email</h1>
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
                                <a class="btn btn_primary" href="{{ route('add_groups') }}">
                                    Add Group
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
                <div class="inner_section_view_email white_box">
                    <div class="mail_header">
                        <div class="user_details_wrapper">
                            <div class="user_image">
                                <img src="{{asset('website')}}/images/user_img.png" alt="">
                            </div>
                            <div class="user_name_email_wrapper">
                                <div class="user_name">
                                    <h3>Jenny.J</h3>
                                </div>
                                <div class="user_email">
                                    <p>Jenny.James@gmail.com</p>
                                </div>
                            </div>
                        </div>
                        <div class="delete_icon">
                            <a href="javascript:void(0)"><i class="fa-solid fa-trash"></i></a>
                        </div>
                    </div>
                    <div class="mail_body">
                        <h2>5 (more) things I wish I knew when I started photography</h2>
                        <p><b>We at Wasai LLC respect the privacy of your personal information</b></p>
                        <div class="mail_image">
                            <img src="{{asset('website')}}/images/dummy_img.png" alt="">
                        </div>
                        <h2>Originality in Photography</h2>
                        <p>We at Wasai LLC respect the privacy of your personal information and, as such, make every effort to ensure your information is protected and remains private. As the owner and operator of loremipsum.io (the "Website") hereafter referred to in this Privacy Policy.</p>
                        <p>We at Wasai LLC respect the privacy of your personal information and, as such, make every effort to ensure your information is protected and remains private.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('js')
<script src="{{asset('js/db1.js')}}"></script>

<script>
    jQuery(".upload_csv_input").on("change", function(e){
        var fileName = e.target.files[0].name;
        // alert(fileName);
        jQuery("#upload_csv_modal .inner_section_upload_field .upload_field .file_name").html(fileName);
    });
</script>

@endpush