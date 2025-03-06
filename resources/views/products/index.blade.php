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

            <table class="table table-striped table-hover">

                <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Description</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Price</th>
                    <th scope="col">Phone number</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>

                <tbody>

                @foreach($products as $product)
{{--                    <tr>--}}
{{--                        <th scope="row">{{ $user->id }}</th>--}}
{{--                        <td>{{ $user->name }}</td>--}}
{{--                        <td>{{ $user->surname }}</td>--}}
{{--                        <td>{{ $user->email }}</td>--}}
{{--                        <td>{{ $user->phone_number }}</td>--}}
{{--                        <td>--}}
{{--                            <a class="btn btn-primary" href="{{route('users.show', $user->id)}}">--}}
{{--                                Show--}}
{{--                            </a>--}}
{{--                            <a class="btn btn-success" href="{{route('users.edit', $user->id)}}">--}}
{{--                                Edit--}}
{{--                            </a>--}}
{{--                            <button data-id="{{ $user->id }}" class=" btn btn-danger delete-resource-button">--}}
{{--                                Delete--}}
{{--                            </button>--}}
{{--                        </td>--}}
{{--                    </tr>--}}
                @endforeach

                </tbody>
            </table>

            <span>{{ $products->links() }}</span>

        </div>
    </div>
@endsection

@section('javascript_variables')
{{--    const deleteUrl = "{{ url("products") }}"--}}
@endsection

@push('javascript_files')
{{--    @vite('resources/js/deleteResource.js')--}}
@endpush

