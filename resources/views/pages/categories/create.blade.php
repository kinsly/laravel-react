@extends('layouts.admin-layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-4">
                    <h5 class="card-header">
                        Create New Category
                        <x-partials.back-btn :route="route('categories.index')" />

                    </h5>
                    <div class="card-body">
                        <form action="{{ route('categories.store') }}" method="post">
                          @csrf
                            <div>
                                <label for="name" class="form-label">Name: </label>
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

                            <div class="mb-3">
                              <label for="defaultSelect" class="form-label">Select Parent Category:</label>
                              <select id="defaultSelect" class="form-select" name="parent_id">
                                <option value=0>None</option>
                                @foreach ($parents as $parent)
                                  <option value={{$parent->id}}>{{$parent->name}}</option>    
                                @endforeach
                                
                                
                              </select>
                              @if ($errors->has('parent_id'))
                                  <div class="invalid-feedback">
                                    {{ $errors->first('parent_id') }}
                                  </div>    
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary">Create New Category</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
