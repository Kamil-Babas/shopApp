@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header fw-bold">{{ __('shop.product.product_with_id', ['id' => $product->id]) }}</div>

                    <div class="card-body">

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end fw-bold">{{ __('shop.product.fields.name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control text-center" readonly
                                       value="{{ $product->name }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description"
                                   class="col-md-4 col-form-label text-md-end fw-bold">{{ __('shop.product.fields.description') }}</label>
                            <div class="col-md-6">
                                <textarea id="description" type="text" class="form-control align-middle text-center" readonly>{{ $product->description }}</textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="category" class="col-md-4 col-form-label text-md-end fw-bold">{{ __('shop.product.fields.category') }}</label>
                            <div class="col-md-6">
                                <input id="category" type="text" class="form-control text-center" readonly value="{{ $product->category->name }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="amount"
                                   class="col-md-4 col-form-label text-md-end fw-bold">{{ __('shop.product.fields.amount') }}</label>
                            <div class="col-md-6">
                                <input id="amount" class="form-control text-center" value="{{ $product->amount }}"
                                       readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="price"
                                   class="col-md-4 col-form-label text-md-end fw-bold">{{ __('shop.product.fields.price') }}</label>
                            <div class="col-md-6">
                                <input id="price" class="form-control text-center" value="{{ $product->price }}"
                                       readonly>
                            </div>
                        </div>

                        @isset($product->image_path)
                            <div class="row mb-3 mt-4 align-content-center">
                                <div class="col-md-12 d-flex justify-content-center">
                                    <img src="{{ asset('storage/' . $product->image_path) }}" alt="Product Image">
                                </div>
                            </div>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
