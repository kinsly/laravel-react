@extends('layouts.admin-layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-4">
                    <h5 class="card-header">
                        Create New User
                        <div class="mb-3 float-end align-middle">
                            <a href={{ route('users.index') }} type="button" class="btn btn-outline-secondary">
                                <span class="tf-icons bx bx-bell"></span>&nbsp; Back
                            </a>
                        </div>

                    </h5>
                    <div class="card-body">
                        <form action="{{ route('users.store') }}" method="post">
                          @csrf
                            <div>
                                <label for="name" class="form-label">Name</label>
                                <input type="text" 
                                    class="form-control @error('name') is-invalid @enderror" 
                                    id="name"
                                    value="{{ old('name') }}"
                                    name="name"
                                    placeholder="John Doe" aria-describedby="name" />

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
                                  value="{{ old('email') }}"
                                  name="email"
                                  placeholder="name@mail.com" aria-describedby="email" />

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
                                value="{{ old('password') }}"
                                name="password"
                                aria-describedby="password"
                                autocomplete="off" />

                            @if ($errors->has('password'))
                              <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                              </div>    
                            @endif
                        </div>

                        <div>
                          <label for="password_confirmation" class="form-label">Confirm Password</label>
                          <input type="password_confirmation" 
                              class="form-control" 
                              id="password_confirmation"
                              value="{{ old('password_confirmation') }}"
                              name="password_confirmation"
                              aria-describedby="password_confirmation" />
                      </div>


                            <div class="mb-3">
                                <label for="permissions" class="form-label">Permissions</label>
                                <select multiple class="form-select @error('roles') is-invalid @enderror" 
                                    id="roles"
                                    name="roles[]"
                                    aria-label="Multiple select example">
                                    @forelse ($roles as $role)

                                    @if ($role!='Super Admin')
                                        <option value="{{ $role }}" {{ in_array($role, old('roles') ?? []) ? 'selected' : '' }}>
                                        {{ $role }}
                                        </option>
                                    @else
                                        @if (Auth::user()->hasRole('Super Admin'))   
                                            <option value="{{ $role }}" {{ in_array($role, old('roles') ?? []) ? 'selected' : '' }}>
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

                            <button type="submit" class="btn btn-primary">Create New User</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
