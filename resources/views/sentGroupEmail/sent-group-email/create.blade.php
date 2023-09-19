@extends('layouts.master')

@section('content')
    <div class="container-fluid custom_form_shadow ">
        <div class="row">
            <div class="col-md-12">
                    <h3 class="box-title pull-left">{{--Create New {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'SentGroupEmail') }}--}} Send Group Email</h3>
                    @can('view-'.str_slug('SentGroupEmail'))
                    <a  class="btn btn-success pull-right" href="{{url('/inbox/inbox')}}">{{--Add {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'SentGroupEmail') }}--}}Back</a>
                    @endcan

                    <div class="clearfix"></div>
                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <form method="POST" action="{{ url('/sentGroupEmail/sent-group-email') }}" accept-charset="UTF-8"
                          class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                            <div class="row">
                                @include ('sentGroupEmail.sent-group-email.form')
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
