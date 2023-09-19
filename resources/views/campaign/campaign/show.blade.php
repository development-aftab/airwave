@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">{{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Campaign') }} {{ $campaign->id }}</h3>
                    @can('view-'.str_slug('Campaign'))
                        <a class="btn btn-success pull-right" href="{{ url('/campaign/campaign') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $campaign->id }}</td>
                            </tr>
                            <tr><th> Name </th><td> {{ $campaign->name }} </td></tr><tr><th> Subject </th><td> {{ $campaign->subject }} </td></tr><tr><th> Body </th><td> {!! $campaign->body !!} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

