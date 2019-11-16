@extends('layouts.admin')

@section('content')
    <div class="summary mb-4">
        <h4>Summary</h4>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ route('admin.orders', ['status' => 'completed']) }}" class="text-decoration-none d-flex bg-success justify-content-start p-3 rounded shadow-sm">
                    <h3><i class="text-black-50 fas fa-shopping-cart mt-2"></i></h3>
                    <span class="info text-white ml-3">
                        <span class="h4">{{ $completed }} Orders</span>
                        <p class="mb-0 text-black-50">Completed</p>
                    </span>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('admin.orders', ['status' => 'paid']) }}" class="text-decoration-none d-flex bg-primary justify-content-start p-3 rounded shadow-sm">
                    <h3><i class="text-black-50 fas fa-shopping-cart mt-2"></i></h3>
                    <span class="info text-white ml-3">
                        <span class="h4">{{ $paid }} Orders</span>
                        <p class="mb-0 text-black-50">Paid</p>
                    </span>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('admin.orders', ['status' => 'unpaid']) }}" class="text-decoration-none d-flex bg-danger justify-content-start p-3 rounded shadow-sm">
                    <h3><i class="text-black-50 fas fa-shopping-cart mt-2"></i></h3>
                    <span class="info text-white ml-3">
                        <span class="h4">{{ $unpaid }} Orders</span>
                        <p class="mb-0 text-black-50">Unpaid</p>
                    </span>
                </a>
            </div>
        </div>
    </div>
    <div class="recent-orders">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h5 class="m-0 mt-1 text-primary">Recent Orders</h5>
                <a href="{{ route('admin.orders') }}" class="btn btn-primary btn-sm shadow">View All</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Number</th>
                                <th>Order Date</th>
                                <th>Status</th>
                                <th>Customer</th>
                                <th>Total</th>
                                <th>Pickup?</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($orders as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->number }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ ucfirst($item->status) }}</td>
                                <td>{{ $item->customer->name }}</td>
                                <td>{{ numToRupiah($item->total) }}</td>
                                <td>{{ ($item->pickup) ? 'Yes' : 'No' }}</td>
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
@endsection
