@extends('layouts.admin-layout')
@section('content')
  <div class="card">
      <h5 class="card-header">
          Categories
          @can('create-role')
              <div class="mb-3 float-end align-middle">
                  <a href={{ route('items.create') }} type="button" class="btn rounded-pill btn-primary">
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
                      <th>title</th>
                      <th>Image</th>
                      <th>unit_price</th>
                      <th>ratings</th>
                      <th>category</th>
                      <th>isAvailable</th>
                      <th>action</th>
                  </tr>
              </thead>
              <tbody class="table-border-bottom-0">

                  @forelse ($items as $item)
                      <tr>
                          <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $item->id }}</strong>
                          </td>
                          <td>{{ $item->title }}</td>
                          <td>
                            @if($item->image)
                            <img src="{{$item->image?->url}}" style="width:37px" class="img-thumbnail rounded-circle"/>
                            @endif
                          </td>
                          <td>
                              {{$item->unit_price}}$
                          </td>

                          <td>
                            {{$item->ratings}}/5
                          </td>

                          <td>
                            {{$item->category?->name}}
                          </td>
                          <td>
                            @if($item->isAvailable == 1) in Stock @else Not available @endif
                          </td>

                          <td>
                              <a href="{{ route('items.show', $item->id) }}" class="btn btn-warning">Show</a>
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

          {{ $items->links() }}
      </div>
  </div>
@endsection
