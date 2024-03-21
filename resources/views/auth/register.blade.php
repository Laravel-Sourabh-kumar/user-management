@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Full Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="date-of-birth" class="col-md-4 col-form-label text-md-end">{{ __('Date Of Birth') }}</label>

                            <div class="col-md-6">
                                <input id="date-of-birth" type="date" class="form-control" name="date_of_birth" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="gender" class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>

                            <div class="col-md-6">
                                <select id="gender" type="" class="form-control" name="gender" required>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                                 <label for="country" class="col-md-4 col-form-label text-md-end">{{ __('Country') }}</label>

                             
                            <div class="col-md-6">
                        <select class=" form-control custom-select{{ $errors->has('country_id') ? ' is-invalid' : '' }}" id="country_id" name="country_id">
                            <option value="" selected>Choose country</option>
                            @foreach($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('country_id'))
                            <div class="invalid-feedback">
                                {{ $errors->first('country_id') }}
                            </div>
                        @endif
                        </div>
                    </div>



                    
                    <div class="row mb-3" id="state" style="display:none">
                                 <label for="state" class="col-md-4 col-form-label text-md-end">{{ __('state') }}</label>
 
                            <div class="col-md-6">
                        <select class=" form-control custom-select{{ $errors->has('state_id') ? ' is-invalid' : '' }}" id="state_id" name="state_id">
                            <option value="" selected>Choose state</option>
                            @foreach($countries as $state)
                                <option value="{{ $state->id }}">{{ $state->name }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('state_id'))
                            <div class="invalid-feedback">
                                {{ $errors->first('state_id') }}
                            </div>
                        @endif
                        </div>
                    </div>

                    <div class="row mb-3" id="city" style="display:none">
                                 <label for="city" class="col-md-4 col-form-label text-md-end">{{ __('City') }}</label>

                                 <div class="col-md-6">
                          <select class=" form-control custom-select{{ $errors->has('city_id') ? ' is-invalid' : '' }}" id="city_id" name="city_id">
                            <option value="" selected>Choose city</option>
                            @foreach($countries as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('city_id'))
                            <div class="invalid-feedback">
                                {{ $errors->first('city_id') }}
                            </div>
                        @endif
                        </div>
                    </div>
                   
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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

 