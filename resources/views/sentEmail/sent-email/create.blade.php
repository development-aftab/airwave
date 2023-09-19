@extends('layouts.master')

@section('content')
    <div class="container-fluid custom_form_shadow">
        <div class="row">
            <div class="col-md-12">
                    <h3 class="box-title pull-left">Create New {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'SentEmail') }}</h3>
                    @can('view-'.str_slug('SentEmail'))
                    <a  class="btn btn-success pull-right" href="{{url('/sentEmail/sent-email')}}"><i class="icon-arrow-left-circle"></i> Add {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'SentEmail') }}</a>
                    @endcan

                    <div class="clearfix"></div>
                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <form method="POST" action="{{ url('/sentEmail/sent-email') }}" accept-charset="UTF-8"
                          class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            @include ('sentEmail.sent-email.form')
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
