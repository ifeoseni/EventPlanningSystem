@extends('layouts.userdashboard')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <div class="col-md-4">




                <div class="card">
                    <div class="card-header">Total Registered Event Owners</div>
                    <div class="card-body">
                        {{ $eventowner }}
                    </div>
                </div>
            </div>
            <div class="col-md-4">




                <div class="card">
                    <div class="card-header">Total Event Vendors</div>
                    <div class="card-body">
                        {{ $eventvendor }}
                    </div>
                </div>
            </div>
            <div class="col-md-4">




                <div class="card">
                    <div class="card-header">Total Event Center Users</div>
                    <div class="card-body">
                        {{ $eventcenter }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
