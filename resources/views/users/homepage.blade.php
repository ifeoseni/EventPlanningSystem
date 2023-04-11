@extends('layouts.userdashboard')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                @auth
                     The user is authenticated...
                @endauth

                @guest
                     The user is not authenticated...
                @endguest
            </div>
            <div class="col-md-8">
                Welcome On Board {{ Auth::id() }}
            </div>
        </div>
    </div>
@endsection
