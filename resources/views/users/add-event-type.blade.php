@extends('layouts.userdashboard')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-12">

                @auth
                    The user is authenticated...
                @endauth

                @guest
                    The user is not authenticated...
                @endguest

                @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('addEventType') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="eventname"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Event Name') }}</label>

                                <div class="col-md-6">
                                    <input id="eventname" type="text"
                                        class="form-control @error('eventname') is-invalid @enderror" name="eventname"
                                        value="{{ old('eventnameame') }}" required autocomplete="eventname">

                                    @error('eventname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="eventdescription"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Event Description') }}</label>

                                <div class="col-md-6">
                                    <input id="eventdescription" type="text"
                                        class="form-control @error('eventdescription') is-invalid @enderror" name="eventdescription"
                                        value="{{ old('eventdescription') }}" required autocomplete="eventdescription">

                                    @error('eventdescription')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="eventslug"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Event Slug') }}</label>

                                <div class="col-md-6">
                                    <input id="eventslug" type="text"
                                        class="form-control @error('eventslug') is-invalid @enderror" name="eventslug"
                                         >

                                    @error('eventslug')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>





                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Add Event Type') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
