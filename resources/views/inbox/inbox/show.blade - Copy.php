@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">{{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Inbox') }} {{ $inbox->id }}</h3>
                    @can('view-'.str_slug('Inbox'))
                        <a class="btn btn-success pull-right" href="{{ url('/inbox/inbox') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $inbox->id }}</td>
                            </tr>
                            <tr><th> Recepient </th><td> {{ $inbox->recepient }} </td></tr><tr><th> Subject </th><td> {{ $inbox->subject }} </td></tr><tr><th> Body </th><td> {{ $inbox->body }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

