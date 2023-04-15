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
                        <form method="POST" action="{{ route('buildVendorWebsite') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Business Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Business Category') }}</label>

                                <div class="col-md-6">
                                    <select name="vendortype" id="" class="form-control">
                                        @foreach($vendortype as $vendorcategory)
                                            <option value="{{ $vendorcategory->servicename }}">{{ $vendorcategory->servicename }}</option>
                                        @endforeach
                                    </select>


                                    @error('vendortype')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            <p>If your business category is not there, add it by clicking <a href="{{ route('addVendorType') }}"> here</a>.</p>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="location"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Physical Location') }}</label>

                                <div class="col-md-6">
                                    <input id="location" type="text"
                                        class="form-control @error('location') is-invalid @enderror" name="location"
                                        value="{{ old('location') }}" required >


                                    @error('location')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="datebusinessstarted"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Day Business Started') }}</label>

                                <div class="col-md-6">
                                    <input id="datebusinessstarted" type="date"
                                        class="form-control @error('datebusinessstarted') is-invalid @enderror" name="datebusinessstarted"
                                        value="{{ old('datebusinessstarted') }}" required >

                                    @error('datebusinessstarted')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="state"
                                    class="col-md-4 col-form-label text-md-right">{{ __('State / Province Located') }}</label>

                                <div class="col-md-6">
                                    <input id="state" type="number"
                                        class="form-control @error('state') is-invalid @enderror" name="state"
                                        value="{{ old('state') }}" required >

                                    @error('state')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="country"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                                <div class="col-md-6">
                                    <input id="country"  type="text"
                                        class="form-control @error('country') is-invalid @enderror" name="country" placeholder='e.g Nigeria'
                                         >

                                    @error('country')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="aboutus"
                                    class="col-md-4 col-form-label text-md-right">{{ __('About Your Business') }}</label>

                                <div class="col-md-6">
                                    <textarea id="aboutus" name="aboutus" rows="30"  class="form-control @error('aboutus') is-invalid @enderror"
                                         >
                                    </textarea>

                                    @error('aboutus')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone_number"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Telephone Number') }}</label>

                                <div class="col-md-6">
                                    <input id="phone_number"  type="text"
                                        class="form-control @error('phone_number') is-invalid @enderror" name="phone_number"
                                         >


                                    @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Business Email') }}</label>

                                <div class="col-md-6">
                                    <input id="email"  type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                         >


                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="facebook"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Facebook Page URL') }}</label>

                                <div class="col-md-6">
                                    <input id="facebook"  type="text"
                                        class="form-control @error('facebook') is-invalid @enderror" name="facebook"
                                         >


                                    @error('facebook')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="twitter"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Twitter Page URL') }}</label>

                                <div class="col-md-6">
                                    <input id="twitter"  type="text"
                                        class="form-control @error('twitter') is-invalid @enderror" name="twitter"
                                         >


                                    @error('twitter')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="instagram"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Instagram Page URL') }}</label>

                                <div class="col-md-6">
                                    <input id="instagram"  type="text"
                                        class="form-control @error('instagram') is-invalid @enderror" name="instagram"
                                         >


                                    @error('instagram')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="linkedin"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Linkedin Page URL') }}</label>

                                <div class="col-md-6">
                                    <input id="linkedin"  type="text"
                                        class="form-control @error('linkedin') is-invalid @enderror" name="linkedin"
                                         >


                                    @error('linkedin')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="images"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Upload Pictures You Will Like To Share') }}</label>

                                <div class="col-md-6">
                                    <input type="file" class="form-control-file" id="images" name="images[]" multiple >

                                    @error('images')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>

                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12 text-center">
                                    <p>Please upload all images by selecting them once. You can have all your images in a folder and select them once from there.</p>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="logo"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Company Logo') }}</label>

                                <div class="col-md-6">
                                    <input type="file" class="form-control-file" id="logo" name="logo"  >

                                    @error('logo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="color"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Brand Colour/ Favourite Color') }}</label>

                                <div class="col-md-6">
                                    <input id="color"  type="color"
                                        class="form-control @error('color') is-invalid @enderror" name="color" value="#FF0000"
                                         >


                                    @error('color')
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
