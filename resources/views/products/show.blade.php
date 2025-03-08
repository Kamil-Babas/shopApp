@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header fw-bold">{{ __('Product:') . " " . $product->id }}</div>

                    <div class="card-body">

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end fw-bold">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control text-center" readonly value="{{ $product->name }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end fw-bold">{{ __('Description') }}</label>
                            <div class="col-md-6">
                                <textarea id="description" type="text" class="form-control align-middle" readonly>
                                    {{ $product->description }}
                                </textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="amount" class="col-md-4 col-form-label text-md-end fw-bold">{{ __('Amount') }}</label>
                            <div class="col-md-6">
                                <input id="amount" class="form-control text-center" value="{{ $product->amount }}" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="price" class="col-md-4 col-form-label text-md-end fw-bold">{{ __('Price') }}</label>
                            <div class="col-md-6">
                                <input id="price" class="form-control text-center" value="{{ $product->price }}" readonly>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
