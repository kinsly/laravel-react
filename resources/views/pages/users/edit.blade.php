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
                        <form action="{{ route('users.update', $user->id) }}" method="post">
                          @csrf
                          @method('PUT')
                            <div>
                                <label for="name" class="form-label">Name</label>
                                <input type="text" 
                                    class="form-control @error('name') is-invalid @enderror" 
                                    id="name"
                                    name="name"
                                    value="{{ $user->name }}"/>

                                @if ($errors->has('name'))
                                  <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                  </div>    
                                @endif
                            </div>

                            <div>
                              <label for="email" class="form-label">Email</label>
                              <input type="email" 
                                  class="form-control @error('email') is-invalid @enderror" 
                                  id="email"
                                  name="email"
                                  value="{{ $user->email }}"/>

                              @if ($errors->has('email'))
                                <div class="invalid-feedback">
                                  {{ $errors->first('email') }}
                                </div>    
                              @endif
                          </div>

                          <div>
                            <label for="password" class="form-label">Password</label>
                            <input type="password" 
                                class="form-control @error('password') is-invalid @enderror" 
                                id="password"
                                name="password"
                                value="{{ $user->password }}"/>

                            @if ($errors->has('password'))
                              <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                              </div>    
                            @endif
                        </div>

                        <div>
                          <label for="password_confirmation" class="form-label">Confirm Password</label>
                          <input type="password" 
                              class="form-control @error('password_confirmation') is-invalid @enderror" 
                              id="password_confirmation"
                              name="password_confirmation"
                              value="{{ $user->password_confirmation }}"/>

                          @if ($errors->has('password_confirmation'))
                            <div class="invalid-feedback">
                              {{ $errors->first('password_confirmation') }}
                            </div>    
                          @endif
                      </div>




                            <div class="mb-3">
                                <label for="permissions" class="form-label">Permissions</label>
                                <select multiple class="form-select @error('roles') is-invalid @enderror" 
                                    id="roles"
                                    name="roles[]"
                                    aria-label="Multiple select example">
                                    @forelse ($roles as $role)

                                    @if ($role!='Super Admin')
                                    <option value="{{ $role }}" {{ in_array($role, $userRoles ?? []) ? 'selected' : '' }}>
                                        {{ $role }}
                                    </option>
                                    @else
                                        @if (Auth::user()->hasRole('Super Admin'))   
                                        <option value="{{ $role }}" {{ in_array($role, $userRoles ?? []) ? 'selected' : '' }}>
                                            {{ $role }}
                                        </option>
                                        @endif
                                    @endif

                                @empty

                                @endforelse
                                </select>
                                @if ($errors->has('roles'))
                                  <div class="invalid-feedback">
                                    {{ $errors->first('roles') }}
                                  </div>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-success">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
