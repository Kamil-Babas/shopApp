@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header fw-bold">{{ __('User: ') . $user->id }}</div>

                    <div class="card-body">

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end fw-bold">{{ __('Name') }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" readonly value="{{ $user->name }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="surname" class="col-md-4 col-form-label text-md-end fw-bold">{{ __('Surname') }}</label>
                                <div class="col-md-6">
                                    <input id="surname" type="text" class="form-control" readonly value="{{ $user->surname }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end fw-bold">{{ __('Email Address') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control " name="email" value="{{ $user->email }}" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="phone_number" class="col-md-4 col-form-label text-md-end fw-bold">{{ __('Phone number') }}</label>
                                <div class="col-md-6">
                                    <input id="phone_number" class="form-control" name="phone_number" value="{{ $user->phone_number }}" readonly>
                                </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
