@extends('layouts.admin-layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card mb-4">
                    <h5 class="card-header">
                        Edit Item - {{$item->title}}
                        <x-partials.back-btn :route="route('items.index')" />

                    </h5>
                    <div class="card-body">
                        @if (session()->has('success'))
                            <div class="alert alert-primary m-3" role="alert">{{ session('success') }}</div>
                        @endif
                        @if (session()->has('error'))
                            <div class="alert alert-danger m-3" role="alert">{{ session('error') }}</div>
                        @endif
                        <form action="{{ route('items.update', $item->id) }}" method="post">
                          @csrf
                          @method('PUT')
                            <div>
                                <label for="title" class="form-label">Title: </label>
                                <input type="text" 
                                    class="form-control @error('title') is-invalid @enderror" 
                                    id="title"
                                    value="{{ old('title', $item->title) }}"
                                    name="title"
                                    placeholder="item name" aria-describedby="title" />

                                @if ($errors->has('title'))
                                  <div class="invalid-feedback">
                                    {{ $errors->first('title') }}
                                  </div>    
                                @endif
                                
                            </div>

                            <div class="col-md-6 mt-3 mb-2">
                              <label for="title" class="form-label">Image:</label>
                              {{-- image url is set to imagePath hidden input. Use it to find picture id from pictures table --}}
                              <x-partials.image-upload id='1' :image="old('imagePath', $item->image?->url)"/>
                              @if ($errors->has('imagePath'))
                                <div style="color: red">
                                  {{ $errors->first('imagePath') }}
                                </div>    
                              @endif
                            </div>

                            <div>
                              <label for="card_tag" class="form-label">Card Tag: </label>
                              <input type="text" 
                                  class="form-control @error('card_tag') is-invalid @enderror" 
                                  id="card_tag"
                                  value="{{ old('card_tag', $item->card_tag) }}"
                                  name="card_tag"
                                  placeholder="Card Tag" aria-describedby="card_tag" />

                              @if ($errors->has('card_tag'))
                                <div class="invalid-feedback">
                                  {{ $errors->first('card_tag') }}
                                </div>    
                              @endif
                              
                            </div>

                            <div>
                              <label for="card_info" class="form-label">Card Summary</label>
                              <textarea class="form-control @error('card_info') is-invalid @enderror" 
                                name="card_info" id="card_info" rows="3">{{old('card_info', $item->card_info)}}</textarea>

                              @if ($errors->has('card_info'))
                                <div class="invalid-feedback">
                                  {{ $errors->first('card_info') }}
                                </div>    
                              @endif
                              
                            </div>

                            <div class="row mb-2">
                              <div class="col-md-6">
                                
                                  <label for="unit_price" class="form-label">Unit Price ($): </label>
                                  <input type="number"
                                      step="any" 
                                      class="form-control @error('unit_price') is-invalid @enderror" 
                                      id="unit_price"
                                      value="{{ old('unit_price', $item->unit_price) }}"
                                      name="unit_price"
                                      placeholder="4.22" aria-describedby="unit_price" />
    
                                  @if ($errors->has('unit_price'))
                                    <div class="invalid-feedback">
                                      {{ $errors->first('unit_price') }}
                                    </div>    
                                  @endif
                                  
                              </div>
                              <div class="col-md-6">
                                
                                  <label for="ratings" class="form-label">Ratings: (x/5) </label>
                                  <input type="number" 
                                      class="form-control @error('ratings') is-invalid @enderror" 
                                      id="ratings"
                                      value="{{ old('ratings', $item->ratings) }}"
                                      name="ratings"
                                      placeholder="max 5" aria-describedby="ratings" />
    
                                  @if ($errors->has('ratings'))
                                    <div class="invalid-feedback">
                                      {{ $errors->first('ratings') }}
                                    </div>    
                                  @endif
                              </div>
                            </div>

                            <div>
                              <label for="summary" class="form-label">detailed Summary</label>
                              <textarea class="form-control 
                                @error('summary') is-invalid @enderror" name="summary" id="summary" rows="3">{{old('summary', $item->summary)}}</textarea>

                              @if ($errors->has('summary'))
                                <div class="invalid-feedback">
                                  {{ $errors->first('summary') }}
                                </div>    
                              @endif

                            </div>

                            <div>
                              <div>
                                <x-partials.rich-text-editor id="id" :text="old('description', $item->description)" title="Description" inputName="description"/>  
                              </div>
                                @if ($errors->has('description'))
                                  <div style="color:red">
                                    {{ $errors->first('description') }}
                                  </div>    
                                @endif
                              
                              
                            </div>

                            <div class="row mb-3">
                              <div class="col-md-6">
                                <div class="mb-3">
                                  <label for="isAvailable" class="form-label">Is available:</label>
                                  <select id="isAvailable" class="form-select" name="isAvailable">
                                    <option value=1 @if(old('isAvailable', $item->isAvailable) == 1) selected @endif>Yes</option>
                                    <option value=0 @if(old('isAvailable', $item->isAvailable) == 0) selected @endif>No</option>
                                  </select>
                                  @if ($errors->has('isAvailable'))
                                      <div class="invalid-feedback">
                                        {{ $errors->first('isAvailable') }}
                                      </div>    
                                    @endif
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="mb-3">
                                  <label for="fd_category_id" class="form-label">Select Category:</label>
                                  <select id="fd_category_id" class="form-select" name="fd_category_id">
                                    <option value=0>UnCategorized</option>
                                    @foreach ($categories as $category)
                                      <option value={{$category->id}} 
                                        @if(old('fd_category_id', $item->category?->id) == $category->id) selected @endif
                                        >{{$category->name}}</option>    
                                    @endforeach
                                    
                                    
                                  </select>
                                    @if ($errors->has('fd_category_id'))
                                      <div class="invalid-feedback">
                                        {{ $errors->first('fd_category_id') }}
                                      </div>    
                                    @endif
                                </div>
                              </div>
                            </div>     
                            <button type="submit" name="status" value=1 class="btn btn-primary g-2">Publish</button>
                            <button type="submit" name="status" value=0 class="btn btn-success g-2">Save Draft</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
