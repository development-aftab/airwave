@extends('layouts.master')
@section('content')
<section class="dash_heading_sec">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xs-12">
                <div class="inner_section_heading_wrapper">
                    <div class="top_heading">
                        <h1>Edit {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'EmailUser') }} #{{ $emailuser->id }}</h1>
                    </div>
                    <div class="search_form">
                        <form action="">
                        {{--<div class="txt_field">
                                <i class="fa-solid fa-magnifying-glass"></i>
                                <input class="form-control" type="text" placeholder="Search">
                            </div>
                            <div class="search_btn">
                                <input class="btn btn_primary" type="submit" value="Search">
                            </div>
                            <div class="filter_btn">
                                <a class="btn btn_primary" href="javascript:void(0)" data-toggle="modal" data-target="#upload_csv_modal">
                                    Upload CSV
                                </a>
                            </div>--}}
                            <div class="add_sticker_btn">
                                @can('view-'.str_slug('EmailUser'))
                                    <a class="btn btn-success" href="{{ url('/emailUser/email-user') }}">Back</a>
                                @endcan
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white_box">
                    {{--<h3 class="box-title pull-left">Edit {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'EmailUser') }} #{{ $emailuser->id }}</h3>--}}
                    {{--@can('view-'.str_slug('EmailUser'))
                        <a class="btn btn-success pull-right" href="{{ url('/emailUser/email-user') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan--}}
                    <div class="clearfix"></div>
                    {{--<hr>--}}
                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <form method="POST" action="{{ url('/emailUser/email-user/' . $emailuser->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}

                        @include ('emailUser.email-user.form', ['submitButtonText' => 'Update'])

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
