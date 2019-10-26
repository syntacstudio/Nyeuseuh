@extends('layouts.admin')

@section('content')
   <div class="row">
       <div class="col-md-7 mx-auto">
            <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between align-content-center">
                        <h6 class="m-0 font-weight-bold text-primary pt-2">Add Price</h6>
                        <a href="{{ route('admin.price.index') }}" class="btn btn-sm btn-secondary btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-times"></i>
                            </span>
                            <span class="text">Cancel</span>
                        </a>
                    </div>
                <div class="card-body">
                    @include('components.alerts')
                    <form action="{{ route('admin.price.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="code" id="code" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" value="{{ old('code') ?? '' }}" placeholder="Code">
                            @if ($errors->has('code'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('code') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="text" name="name" id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') ?? '' }}" placeholder="Name">
                            @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="number" name="price" id="price" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" value="{{ old('price') ?? '' }}" placeholder="Price in IDR">
                            @if ($errors->has('price'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('price') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Icon for Price</label>
                            <input type="file" name="icon" id="icon" class="form-control{{ $errors->has('icon') ? ' is-invalid' : '' }}" value="{{ old('icon') ?? '' }}">
                            @if ($errors->has('icon'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('icon') }}</strong>
                            </span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Add Price</button>
                    </form>
                </div>
            </div>
       </div>
   </div>
@endsection