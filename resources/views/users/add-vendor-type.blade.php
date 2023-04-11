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
                        <form method="POST" action="{{ route('addVendorType') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="servicename"
                                    class="col-md-4 col-form-label text-md-right">{{ __('servicename') }}</label>

                                <div class="col-md-6">
                                    <input id="servicename" type="text"
                                        class="form-control @error('servicename') is-invalid @enderror" name="servicename"
                                        value="{{ old('servicename') }}" autocomplete="servicename">

                                    @error('servicename')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="servicedescription"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Service Description') }}</label>

                                <div class="col-md-6">
                                    <input id="servicedescription" type="text"
                                        class="form-control @error('servicedescription') is-invalid @enderror" name="servicedescription"
                                        value="{{ old('servicedescription') }}" required autocomplete="servicedescription">

                                    @error('servicedescription')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="serviceslug"
                                    class="col-md-4 col-form-label text-md-right">{{ __('serviceslug') }}</label>

                                <div class="col-md-6">
                                    <input id="serviceslug" type="text"
                                        class="form-control @error('serviceslug') is-invalid @enderror" name="serviceslug"
                                         >

                                    @error('serviceslug')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>





                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Add Vendor Service Type') }}
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
