@extends('layouts.app')

@section('content')

    <div class="container mt-3">

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

            <div class="row d-flex justify-content-between align-items-center mb-3">
                <div class="col-auto">
                    <h1 class="mb-0">{{ __('Products:') }}</h1>
                </div>
                <div class="col-auto">
                    <a class="btn btn-primary fw-semibold" href="{{ route('products.create') }}">
                        {{ __('Create Product') }}
                    </a>
                </div>
            </div>


            <div class="row justify-content-center">

            <table class="table table-striped table-hover text-center">

                <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Price</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>

                <tbody>

                @foreach($products as $product)
                    <tr>
                        <th scope="row" class="align-middle">{{ $product->id }}</th>
                        <td class="align-middle">{{ $product->name }}</td>
                        <td class="align-middle">{{ $product->description }}</td>
                        <td class="align-middle">{{ $product->amount }}</td>
                        <td class="align-middle">{{ $product->price }}</td>
                        <td class="align-middle">
                            <a class="btn btn-primary" href="{{route('products.show', $product->id)}}">
                                Show
                            </a>
                            <a class="btn btn-success" href="{{route('products.edit', $product->id)}}">
                                Edit
                            </a>
                            <button data-id="{{ $product->id }}" class=" btn btn-danger delete-resource-button">
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>

            <span>{{ $products->links() }}</span>

        </div>
    </div>
@endsection

@section('javascript_variables')
    const deleteUrl = "{{ url("products") }}"
    const resourceName = "Product";
@endsection

@push('javascript_files')
    @vite('resources/js/deleteResource.js')
@endpush

