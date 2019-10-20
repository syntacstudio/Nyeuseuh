@extends('layouts.admin')

@section('content')
   <div class="row">
       <div class="col-md-7 mx-auto">
            <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between align-content-center">
                        <h6 class="m-0 font-weight-bold text-primary pt-2">Add Administrator</h6>
                        <a href="{{ route('admin.administrator.index') }}" class="btn btn-sm btn-secondary btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-times"></i>
                            </span>
                            <span class="text">Cancel</span>
                        </a>
                    </div>
                <div class="card-body">
                    @include('components.alerts')
                    <form action="{{ route('admin.administrator.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="name" id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') ?? '' }}" placeholder="Name" required>
                            @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') ?? '' }}" placeholder="Email Address" required>
                            @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="text" name="password" id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" required>
                            @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Create Administrator</button>
                    </form>
                </div>
            </div>
       </div>
   </div>
@endsection