@extends('layouts.admin-layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-4">
                    <h5 class="card-header">
                        Edit Role: {{ $role->name }}
                        <x-partials.back-btn :route="route('roles.index')" />

                    </h5>
                    <div class="card-body">
                      @if(session()->has('success'))
                          <div class="alert alert-primary m-3" role="alert">{{ session('success') }}</div>
                      @endif
                      @if(session()->has('error'))
                          <div class="alert alert-danger m-3" role="alert">{{ session('error') }}</div>
                      @endif
                        <form action="{{ route('roles.update', $role->id) }}" method="post">
                          @csrf
                          @method('PUT')
                            <div>
                                <label for="name" class="form-label">Name</label>
                                <input type="text" 
                                    class="form-control @error('name') is-invalid @enderror" 
                                    id="name"
                                    name="name"
                                    value="{{ $role->name }}"/>

                                @if ($errors->has('name'))
                                  <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                  </div>    
                                @endif
                                
                            </div>


                            <div class="mb-3">
                                <label for="permissions" class="form-label">Permissions</label>
                                <select multiple class="form-select @error('permissions') is-invalid @enderror" 
                                    id="permissions"
                                    name="permissions[]"
                                    aria-label="Multiple select example">
                                    @forelse ($permissions as $permission)
                                      <option value="{{ $permission->id }}" {{ in_array($permission->id, $rolePermissions ?? []) ? 'selected' : '' }}>
                                          {{ $permission->name }}
                                      </option>
                                    @empty

                                    @endforelse
                                </select>
                                @if ($errors->has('permissions'))
                                  <div class="invalid-feedback">
                                    {{ $errors->first('permissions') }}
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
