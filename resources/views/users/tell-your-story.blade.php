@extends('layouts.userdashboard')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-12">

                {{-- @auth
                    The user is authenticated...
                @endauth

                @guest
                    The user is not authenticated...
                @endguest --}}

                @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('tellStory') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="storytitle"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Story Title') }}</label>

                                <div class="col-md-6">
                                    <input id="storytitle" type="text"
                                        class="form-control @error('storytitle') is-invalid @enderror" name="storytitle"
                                        value="{{ old('storytitle') }}" required autocomplete="name">

                                    @error('storytitle')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="storydescription"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Story Description') }}</label>

                                <div class="col-md-6">
                                    <textarea id="storydescription"
                                        class="form-control @error('storydescription') is-invalid @enderror" name="storydescription"
                                        value="{{ old('storydescription') }}" required >
                                    </textarea>

                                    @error('storydescription')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="whereithappened"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Where It Happened') }}</label>

                                <div class="col-md-6">
                                    <input id="whereithappened" type="text"
                                        class="form-control @error('whereithappened') is-invalid @enderror" name="whereithappened"
                                        value="{{ old('whereithappened') }}" required autocomplete="whereithappened">

                                    @error('whereithappened')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="estimatedattendees"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Estimated Number Of Attendees') }}</label>

                                <div class="col-md-6">
                                    <input id="estimatedattendees" type="number"
                                        class="form-control @error('estimatedattendees') is-invalid @enderror" name="estimatedattendees"
                                        value="{{ old('estimatedattendees') }}" required autocomplete="estimatedattendees">

                                    @error('estimatedattendees')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="dateithappened"
                                    class="col-md-4 col-form-label text-md-right">{{ __('dateithappened') }}</label>

                                <div class="col-md-6">
                                    <input id="dateithappened" type="date"
                                        class="form-control @error('dateithappened') is-invalid @enderror" name="dateithappened"
                                         >

                                    @error('dateithappened')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="images"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Upload Pictures Of The Event') }}</label>

                                <div class="col-md-6">
                                    <input type="file" class="form-control-file" id="images" name="images[]" multiple >

                                    @error('images')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>





                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Upload Your Story') }}
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
