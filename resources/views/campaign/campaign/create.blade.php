@extends('layouts.master')

@section('content')
<section class="dash_heading_sec">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xs-12">
                <div class="inner_section_heading_wrapper">
                    <div class="top_heading">
                        <h1>Create Campaign</h1>
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
            <div class="col-md-12 col-lg-12 col-xs-12">
                <div class="inner_section_mail_section white_box">
                    {{-- <h3 class="box-title pull-left">Create New {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Campaign') }}</h3>
                    @can('view-'.str_slug('Campaign'))
                    <a  class="btn btn-success pull-right" href="{{url('/campaign/campaign')}}"><i class="icon-arrow-left-circle"></i> Add {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Campaign') }}</a>
                    @endcan --}}

                    <div class="clearfix"></div>
                    {{-- <hr> --}}
                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    
                    <form method="POST" action="{{ url('/campaign/campaign') }}" accept-charset="UTF-8"
                          class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        @include ('campaign.campaign.form')
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
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

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