@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">{{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'SentGroupEmail') }} {{ $sentgroupemail->id }}</h3>
                    @can('view-'.str_slug('SentGroupEmail'))
                        <a class="btn btn-success pull-right" href="{{ url('/sentGroupEmail/sent-group-email') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $sentgroupemail->id }}</td>
                            </tr>
                            <tr><th> Group Id </th><td> {{ $sentgroupemail->group_id }} </td></tr><tr><th> From </th><td> {{ $sentgroupemail->from }} </td></tr><tr><th> To </th><td> {{ $sentgroupemail->to }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

