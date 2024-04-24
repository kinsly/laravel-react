@extends('layouts.admin-layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-4">
                    <h5 class="card-header">
                        Edit User: {{ $user->name }}
                        <div class="mb-3 float-end align-middle">
                            <a href={{ route('users.index') }} type="button" class="btn btn-outline-secondary">
                                <span class="tf-icons bx bx-bell"></span>&nbsp; Back
                            </a>
                        </div>

                    </h5>
                    <div class="card-body">
                      @if(session()->has('success'))
                          <div class="alert alert-primary m-3" role="alert">{{ session('success') }}</div>
                      @endif
                      @if(session()->has('error'))
                          <div class="alert alert-danger m-3" role="alert">{{ session('error') }}</div>
                      @endif
                            <div>
                                <label for="name" class="form-label">Name</label>
                                <input type="text" 
                                    class="form-control" 
                                    id="name"
                                    name="name"
                                    disabled
                                    value="{{ $user->name }}"/>
                            </div>

                            <div>
                              <label for="email" class="form-label">Email</label>
                              <input type="email" 
                                  class="form-control" 
                                  id="email"
                                  name="email"
                                  disabled
                                  value="{{ $user->email }}"/>

                          </div>
                            <div class="mb-3">
                                <label for="permissions" class="form-label">Roles</label>
                                  @forelse ($user->getRoleNames() as $role)
                                      <span class="badge bg-primary">{{ $role }}</span>
                                  @empty
                                  @endforelse
                            </div>

                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-success">Update</a>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
