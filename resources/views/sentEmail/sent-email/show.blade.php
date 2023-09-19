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
                            <h1>Sent Email {{ $sentemail->id }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="dash_orderDetails_sec">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xs-12">
                    <div class="inner_section_view_email white_box">
                        <div class="mail_header">
                            <div class="user_details_wrapper">
                                <div class="user_image">
                                    <img src="{{asset('website')}}/images/user_img.png" alt="">
                                </div>
                                <div class="user_name_email_wrapper">
                                    <div class="user_name">
                                        <h3>{{ $sentemail->to }}</h3>
                                    </div>
                                    <div class="user_email">
                                        <p>{{$sentemail->email_date??''}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="delete_icon">
                                @can('view-'.str_slug('SentEmail'))
                                    <a href="{{ url('/sentEmail/sent-email') }}"><i class="fa-solid fa-arrow-up-from-bracket"></i></a>
                                @endcan
                            </div>
                        </div>
                        <div class="mail_body">
                            {!! $sentemail->body??'' !!}
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

