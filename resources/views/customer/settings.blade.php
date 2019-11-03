@extends('layouts.account')
@section('title', 'Settings')

@section('content')
    <div class="card card-body mb-3 mb-md-3">
        <h4>Settings</h4>
        <form action="{{ route('customer.setting.changeProfile') }}" method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') ? old('name') : $user->name }}">
            </div>
            <div class="form-group">
                <label for="name">Email</label>
                <input type="text" name="email" class="form-control" value="{{ old('email') ? old('email') : $user->email }}">
            </div>
            <button type="submit" class="btn btn-block btn-primary">Update My Account</button>
        </form>
    </div>

    <div class="card card-body mb-3">
        <h4>Change Password</h4>
        <form action="{{ route('customer.setting.changePassword') }}" method="post">
            <div class="form-group">
                <label for="name">Enter new password</label>
                <input type="text" name="name" class="form-control" placeholder="Enter your new password" required>
            </div>
            <div class="form-group">
                <label for="name">Re-enter new password</label>
                <input type="text" name="email" class="form-control" placeholder="Re-enter your new password" required>
            </div>
            <button type="submit" class="btn btn-block btn-primary">Change My Password</button>
        </form>
    </div>
@endsection