@extends('layouts.admin-layout')
@section('content')
    <div class="card">
        <h5 class="card-header">
            All users
            @can('create-user')
                <div class="mb-3 float-end align-middle">
                    <a href={{ route('users.create') }} type="button" class="btn rounded-pill btn-primary">
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
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">

                    @forelse ($users as $user)
                        <tr>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $user->id }}</strong>
                            </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>

                            <td>
                              @forelse ($user->getRoleNames() as $role)
                                  <span class="badge bg-label-primary mr-2">{{ $role }}</span>
                              @empty
                              @endforelse
                            </td>

                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-warning">Show</a>
                                    @if ($user->name != 'Super Admin')
                                        @can('edit-user')
                                            <a href="{{ route('users.edit', $user->id) }}" type="button"
                                                class="btn btn-primary">Edit</a>
                                        @endcan
                                    @endif
                                    @can('delete-user')
                                        @if (Auth::user()->id != $user->id)
                                            <div class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#userDeleteModal{{ $user->id }}">
                                                <i class="bi bi-trash"></i> Delete
                                            </div>
                                        @endif

                                        <!-- Modal -->
                                        <div class="modal fade" id="userDeleteModal{{ $user->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel1">Delete User: {{ $user->name }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure want to delete?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-outline-secondary"
                                                                data-bs-dismiss="modal">
                                                                Close
                                                            </button>
                                                            <button type="submit" class="btn btn-danger">Delete Now</button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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

            {{ $users->links() }}
        </div>
    </div>
@endsection
