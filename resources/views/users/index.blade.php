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

            <table class="table table-striped table-hover">

                <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Surname</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone number</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>

                <tbody>

                @foreach($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->surname }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone_number }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{route('users.show', $user->id)}}">
                                Show
                            </a>
                            <a class="btn btn-success" href="{{route('users.edit', $user->id)}}">
                                Edit
                            </a>
                            <button data-id="{{ $user->id }}" class=" btn btn-danger delete-resource-button">
                                Delete
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
@endsection

@push('javascript_files')
    @vite('resources/js/deleteResource.js')
@endpush

