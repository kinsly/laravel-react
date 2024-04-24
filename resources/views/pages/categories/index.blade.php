@extends('layouts.admin-layout')
@section('content')
  <div class="card">
      <h5 class="card-header">
          Categories
          @can('create-role')
              <div class="mb-3 float-end align-middle">
                  <a href={{ route('categories.create') }} type="button" class="btn rounded-pill btn-primary">
                      <span class="tf-icons bx bx-plus-circle"></span>&nbsp; Create New
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
                      <th>Parent</th>
                      <th>Actions</th>
                  </tr>
              </thead>
              <tbody class="table-border-bottom-0">

                  @forelse ($categories as $category)
                      <tr>
                          <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $category->id }}</strong>
                          </td>
                          <td>{{ $category->name }}</td>

                          <td>
                              {{$category->parent?->name}}
                          </td>

                          <td>
                              <div class="btn-group" role="group" aria-label="Basic example">
                                  {{-- <a href="{{ route('categories.show', $category->id) }}" class="btn btn-warning">Show</a> --}}
                                      {{-- @can('edit-category') --}}
                                          <a href="{{ route('categories.edit', $category->id) }}" type="button"
                                              class="btn btn-primary">Edit</a>
                                      {{-- @endcan --}}
                                  {{-- @can('delete-category') --}}
                                      
                                        <div class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#categoryDelete{{ $category->id }}">
                                            <i class="bi bi-trash"></i> Delete
                                        </div>
                                      
                                        <x-partials.delete-modal id="categoryDelete{{ $category->id }}" title="Delete Now!" :formAction="route('categories.destroy', $category->id)">
                                            Are you sure want to delete?    
                                        </x-partials.delete-modal>    
                                  {{-- @endCan --}}
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

          {{ $categories->links() }}
      </div>
  </div>
@endsection
