@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                 
                    <div class="row ">
                        <div class="col-lg-4">
                        Full Name
                        </div>
                        <div class="col-lg-8">
                        {{Auth::user()->name}}
                        </div>
                        <div class="col-lg-4">
                        Email Address
                        </div>
                        <div class="col-lg-8">
                        {{Auth::user()->email}}
                        </div>
                        <div class="col-lg-4">
                        Date of Birth
                        </div>
                        <div class="col-lg-8">
                        {{Auth::user()->date_of_birth}}
                        </div>
                        <div class="col-lg-4">
                        Gender
                        </div>
                        <div class="col-lg-8">
                        {{Auth::user()->gender}}
                        </div>
                        <div class="col-lg-4">
                       Country
                        </div>
                        <div class="col-lg-8">
                          {{ Auth::user()->country->name ?? '' }}
                        </div>
                        <div class="col-lg-4">
                      State
                        </div>
                        <div class="col-lg-8">
                          {{ Auth::user()->state->name ?? '' }}
                        </div>
                        <div class="col-lg-4">
                      City
                        </div>
                        <div class="col-lg-8">
                          {{ Auth::user()->city->name ?? '' }}
                        </div>
                        

                    
                    
  
    
  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
