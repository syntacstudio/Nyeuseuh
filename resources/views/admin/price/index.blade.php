@extends('layouts.admin')

@section('content')
    @include('components.alerts')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-content-center">
            <h6 class="m-0 font-weight-bold text-primary pt-2">Price List</h6>
            <a href="{{ route('admin.price.create') }}" class="btn btn-sm btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Add Price</span>
            </a>
        </div>
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($data as $price)
                    <tr>
                        <td><img src="{{ asset('storage/icons/'.$price->icon) }}" class="img-thumbnail" width="51px"></td>
                        <td class="align-middle">{{ $price->code }}</td>
                        <td class="align-middle">{{ $price->name }}</td>
                        <td class="align-middle">{{ $price->price }}</td>
                        <td class="align-middle text-right">
                            <a href="{{ route('admin.price.edit', $price->id) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="p-3">
    </div>
@endsection