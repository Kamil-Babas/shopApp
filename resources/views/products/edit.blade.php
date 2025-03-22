@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header fw-bold">{{ __('shop.product.edit_product_with_id', ['id' => $product->id]) }}</div>

                    <div class="card-body">
                        <form method="Post" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">

                            @csrf
                            @method('put')

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('shop.product.fields.name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" maxlength="500" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $product->name }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('shop.product.fields.description') }}</label>

                                <div class="col-md-6">
                                    <textarea id="description" maxlength="1500" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description" autofocus>{{ $product->description }}</textarea>

                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="category_id" class="col-md-4 col-form-label text-md-end">{{ __('shop.product.fields.category') }}</label>

                                <div class="col-md-6">

                                    <select id="category_id" name="category_id" class="form-select form-control @error('category_id') is-invalid @enderror" required>
                                        <option value="" disabled selected>{{ __('shop.product.select_category') }}</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="amount" class="col-md-4 col-form-label text-md-end">{{ __('shop.product.fields.amount') }}</label>

                                <div class="col-md-6">
                                    <input id="amount" name="amount" type="number" min="0" class="form-control @error('amount') is-invalid @enderror" value="{{ $product->amount }}" required autocomplete="amount">

                                    @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="price" class="col-md-4 col-form-label text-md-end">{{ __('shop.product.fields.price') }}</label>

                                <div class="col-md-6">
                                    <input id="price" type="number" step="0.01" min="0.01" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $product->price }}" required autocomplete="price">

                                    @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="product_image" class="col-md-4 col-form-label text-md-end">{{ __('shop.product.fields.image') }}</label>

                                <div class="col-md-6">
                                    <input id="product_image" type="file" class="form-control @error('product_image') is-invalid @enderror" name="product_image">

                                    @error('product_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-0">
                                <div class="col-md-12 offset-md-6">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('shop.product.save_button') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    @isset($product->image_path)
                        <div class="row mb-2 mt-4 align-content-center">
                            <div class="col-md-12 d-flex justify-content-center">
                                <img src="{{ asset('storage/' . $product->image_path) }}" alt="Product Image">
                            </div>
                        </div>
                    @endisset

                </div>
            </div>
        </div>
    </div>

@endsection
