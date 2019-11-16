@extends('layouts.operator')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid pb-5">
    @include('components.alerts')
    <div class="row mt-3">
        <div class="col-md-4">
            <div class="card card-body shadow border-left-primary">
                <h5 class="text-primary">Customer Information</h5>
                <table class="table mb-0">
                    <tbody>
                        <tr>
                            <th class="pl-0">Name</th>
                            <td>{{ $customer->name }}</td>
                        </tr>
                        <tr>
                            <th class="pl-0">Email</th>
                            <td>{{ $customer->email }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card card-body">
                <h5 class="text-primary">Order Lists</h5>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Number</th>
                                <th>Order Date</th>
                                <th>Status</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($customer->orders as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->number }}</td>
                                <td>{{ $item->created_at->format('Y-m-d') }}</td>
                                <td>{{ ucfirst($item->status) }}</td>
                                <td>{{ numToRupiah($item->total) }}</td>
                                <td>
                                    <a href="{{ route('operator.order', $item->number) }}" class="btn btn-sm btn-primary shadow">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection