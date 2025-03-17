@extends('layouts.app')

@section('content')

    <div class="container mt-3">

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <h1 class="mb-3">{{ __('Users:') }}</h1>

        <div class="row justify-content-center">

            <table class="table table-striped table-hover text-center">

                <thead class="table-dark">
                <tr>
                    <th scope="col">{{ __('shop.users.fields.id') }}</th>
                    <th scope="col">{{ __('shop.users.fields.name') }}</th>
                    <th scope="col">{{ __('shop.users.fields.surname') }}</th>
                    <th scope="col">{{ __('shop.users.fields.email') }}</th>
                    <th scope="col">{{ __('shop.users.fields.phone_number') }}</th>
                    <th scope="col">{{ __('shop.table_columns.actions') }}</th>
                </tr>
                </thead>

                <tbody>

                @foreach($users as $user)
                    <tr>
                        <th class="align-middle" scope="row">{{ $user->id }}</th>
                        <td class="align-middle">{{ $user->name }}</td>
                        <td class="align-middle">{{ $user->surname }}</td>
                        <td class="align-middle">{{ $user->email }}</td>
                        <td class="align-middle">{{ $user->phone_number }}</td>
                        <td class="align-middle">
                            <a class="btn btn-primary" href="{{route('users.show', $user->id)}}">
                                {{ __('shop.table_columns.action_options.show') }}
                            </a>
                            <a class="btn btn-success" href="{{route('users.edit', $user->id)}}">
                                {{ __('shop.table_columns.action_options.edit') }}
                            </a>
                            <button data-id="{{ $user->id }}" class=" btn btn-danger delete-resource-button">
                                {{ __('shop.table_columns.action_options.delete') }}
                            </button>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>

            <span>{{ $users->links() }}</span>

        </div>
    </div>
@endsection

@section('javascript_variables')
    const deleteUrl = "{{ url("users") }}"
    const resourceName = "User";
@endsection

@push('javascript_files')
    @vite('resources/js/deleteResource.js')
@endpush

