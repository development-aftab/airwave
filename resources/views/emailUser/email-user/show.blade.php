@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">{{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'EmailUser') }} {{ $emailuser->id }}</h3>
                    @can('view-'.str_slug('EmailUser'))
                        <a class="btn btn-success pull-right" href="{{ url('/emailUser/email-user') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $emailuser->id }}</td>
                            </tr>
                            <tr><th> Group Id </th><td> {{ $emailuser->group_id }} </td></tr><tr><th> Name </th><td> {{ $emailuser->name }} </td></tr><tr><th> Email </th><td> {{ $emailuser->email }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

