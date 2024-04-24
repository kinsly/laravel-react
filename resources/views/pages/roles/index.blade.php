@extends('layouts.admin-layout')
@section('content')
    <div class="card">




        <h5 class="card-header">
            All user Roles
            @can('create-role')
                <div class="mb-3 float-end align-middle">
                    <a href={{ route('roles.create') }} type="button" class="btn rounded-pill btn-primary">
                        <span class="tf-icons bx bx-pie-chart-alt"></span>&nbsp; Create New
                    </a>
                </div>
            @endcan
        </h5>
        <div class="table-responsive text-nowrap">
            @if (session()->has('success'))
                <div class="alert alert-primary m-3" role="alert">{{ session('success') }}</div>
            @endif
            @if (session()->has('error'))
                <div class="alert alert-danger m-3" role="alert">{{ session('error') }}</div>
            @endif


            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Permissions</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">

                    @forelse ($roles as $role)
                        <tr>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $role->id }}</strong>
                            </td>
                            <td>{{ $role->name }}</td>

                            <td>
                                @foreach ($role->permissions as $permission)
                                    <span class="badge bg-label-primary mr-2">{{ $permission->name }}</span>
                                @endforeach
                            </td>

                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{ route('roles.show', $role->id) }}" class="btn btn-warning">Show</a>
                                    @if ($role->name != 'Super Admin')
                                        @can('edit-role')
                                            <a href="{{ route('roles.edit', $role->id) }}" type="button"
                                                class="btn btn-primary">Edit</a>
                                        @endcan
                                    @endif
                                    @can('delete-role')
                                        @if ($role->name != Auth::user()->hasRole($role->name))
                                            <div  class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#roleDeleteModal{{ $role->id }}">
                                                <i class="bi bi-trash"></i> Delete
                                            </div>
                                        @endif
                                        <!-- Modal -->
                                        <x-partials.delete-modal id="roleDeleteModal{{ $role->id }}" title="Delete Now!" :formAction="route('roles.destroy', $role->id)">
                                            Are you sure want to delete?    
                                        </x-partials.delete-modal>    
                                        
                                        

                                        
                                    @endCan
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3"><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>No result
                                    found</strong></td>

                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{ $roles->links() }}
        </div>
    </div>
@endsection
