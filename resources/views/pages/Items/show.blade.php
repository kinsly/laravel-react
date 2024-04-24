@extends('layouts.admin-layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card mb-4">
                    <h5 class="card-header">
                        {{$item->name}}
                        <x-partials.back-btn :route="route('items.index')" />
                    </h5>
                    <div class="card-body">
                        <div>
                            <label for="title" class="form-label">Title: </label>
                            <input type="text"    class="form-control" readonly="" value="{{$item->title}}"/>                            
                        </div>

                        <div class="col-md-6 mt-3 mb-2">
                          <label for="image" class="form-label">Image: </label>
                          {{-- image url is set to imagePath hidden input. Use it to find picture id from pictures table --}}
                          <img src="{{$item->image?->url}}" class="img"/>                          
                        </div>

                        <div>
                          <label for="card_tag" class="form-label">Card Tag: </label>
                          <input type="text" readonly="" class=" disabled form-control" value="{{$item->card_tag}}"/>                          
                        </div>

                        <div>
                          <label for="card_info" class="form-label">Card Summary</label>
                          <textarea class="form-control" readonly="" readonly="" rows="3">{{ $item->card_info}}</textarea>                          
                        </div>

                        <div class="row mb-2">
                          <div class="col-md-6">
                            
                              <label for="unit_price" class="form-label">Unit Price ($): </label>
                              <input type="number" class="form-control" readonly="" value="{{ $item->unit_price }}"/>                              
                          </div>
                          <div class="col-md-6">                            
                              <label for="ratings" class="form-label">Ratings: (x/5) </label>
                              <input type="number" class="form-control" readonly="" value="{{ $item->ratings}}"/>
                          </div>
                        </div>

                        <div>
                          <label for="summary" class="form-label">detailed Summary</label>
                          <textarea class="form-control" rows="3" readonly="">{{ $item->summary}}</textarea>

                          @if ($errors->has('summary'))
                            <div class="invalid-feedback">
                              {{ $errors->first('summary') }}
                            </div>    
                          @endif

                        </div>

                        <div>
                          <label for="summary" class="form-label">Description</label>
                          <div class="form-control" readonly="" rows="3" readonly="">{!!$item->description!!}</div>
                          
                        </div>

                        <div class="row mb-3">
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label for="isAvailable" class="form-label">Is available:</label>
                              <input type="text" readonly="" class="form-control" 
                                value=@if($item->isAvailable == 0) "NO" @else "Yes" @endif />
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label for="fd_category_id" class="form-label">Category: </label>
                              <input type="text" readonly="" class="form-control" 
                                value="{{$item->category?->name}}" />
                            </div>
                          </div>
                        </div>                          
                        <a href="{{route('items.edit', $item->id)}}" class="btn btn-primary g-2">Edit</a>
                        {{-- @can('delete-role') --}}
                          <div  class="btn btn-danger" data-bs-toggle="modal"
                              data-bs-target="#itemDeleteModal{{ $item->id }}">
                              <i class="bi bi-trash"></i> Delete
                          </div>
                          
                          <!-- Modal -->
                          <x-partials.delete-modal id="itemDeleteModal{{ $item->id }}" title="Delete Now!" :formAction="route('items.destroy', $item->id)">
                              Are you sure want to delete item - {{$item->title}}?    
                          </x-partials.delete-modal>                            
                        {{-- @endCan> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
