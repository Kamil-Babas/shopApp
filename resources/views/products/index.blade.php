@extends('layouts.app')

@section('content')

    <div class="container mt-3">

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="row d-flex justify-content-between align-items-center mb-3">
                <div class="col-auto">
                    <h1 class="mb-0">{{ __('shop.product.products') }}</h1>
                </div>
                <div class="col-auto">
                    <a class="btn btn-primary fw-semibold" href="{{ route('products.create') }}">
                        {{ __('shop.product.create_product_title') }}
                    </a>
                </div>
            </div>


            <div class="row justify-content-center">

            <table class="table table-striped table-hover text-center">

                <thead class="table-dark">
                <tr>
                    <th scope="col">{{ __('shop.product.fields.id') }}</th>
                    <th scope="col">{{ __('shop.product.fields.name') }}</th>
                    <th scope="col">{{ __('shop.product.fields.description') }}</th>
                    <th scope="col">{{ __('shop.product.fields.category') }}</th>
                    <th scope="col">{{ __('shop.product.fields.amount') }}</th>
                    <th scope="col">{{ __('shop.product.fields.price') }}</th>
                    <th scope="col">{{ __('shop.table_columns.actions') }}</th>
                </tr>
                </thead>

                <tbody>

                @foreach($products as $product)
                    <tr>
                        <th scope="row" class="align-middle">{{ $product->id }}</th>
                        <td class="align-middle">{{ $product->name }}</td>
                        <td class="align-middle">{{ $product->description }}</td>
                        <td class="align-middle">{{ $product->category->name ?? '- wwywalic to z widoku (brak kategorii), '  }}</td>
                        <td class="align-middle">{{ $product->amount }}</td>
                        <td class="align-middle">{{ $product->price }}</td>
                        <td class="align-middle">
                            <a class="btn btn-primary" href="{{route('products.show', $product->id)}}">
                                {{__('shop.table_columns.action_options.show')}}
                            </a>
                            <a class="btn btn-success" href="{{route('products.edit', $product->id)}}">
                                {{__('shop.table_columns.action_options.edit')}}
                            </a>
                            <button data-id="{{ $product->id }}" class=" btn btn-danger delete-resource-button">
                                {{__('shop.table_columns.action_options.delete')}}
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

