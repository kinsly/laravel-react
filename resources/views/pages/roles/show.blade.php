@extends('layouts.admin-layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-4">
                    <h5 class="card-header">
                        Role: {{ $role->name }}
                        <x-partials.back-btn :route="route('roles.index')" />

                    </h5>
                    <div class="card-body">
                        @if (session()->has('success'))
                            <div class="alert alert-primary m-3" role="alert">{{ session('success') }}</div>
                        @endif
                        @if (session()->has('error'))
                            <div class="alert alert-danger m-3" role="alert">{{ session('error') }}</div>
                        @endif
                        <div>
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" disabled value="{{ $role->name }}" />
                        </div>


                        <div class="mb-3">
                            <label for="permissions" class="form-label">Permissions</label>
                            @foreach ($role->permissions as $permission)
                                <span class="badge bg-label-primary mr-2">{{ $permission->name }}</span>
                            @endforeach
                        </div>

                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-success">Edit</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
