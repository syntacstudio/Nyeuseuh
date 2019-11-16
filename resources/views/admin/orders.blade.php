@extends('layouts.admin')

@section('content')
    <div class="recent-orders">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-4">
                        <h5 class="m-0 mt-1 text-primary">Orders List</h5>
                    </div>
                    <div class="col-md-8">
                        <form action="" class="w-100 d-flex justify-content-end" method="get">
                            <div class="form-group mb-0">
                                <input type="text" name="s" value="{{ request()->input('s') }}" class="form-control form-control-sm" placeholder="Search">
                            </div>
                            <div class="form-group ml-2 mb-0">
                                <select name="status" id="status" class="form-control form-control-sm">
                                    <option value="">Select a status</option>
                                    <option value="unpaid" {{ (request()->input('status') == 'unpaid') ? 'selected' : null }}>Unpaid</option>
                                    <option value="paid" {{ (request()->input('status') == 'paid') ? 'selected' : null }}>Paid</option>
                                    <option value="completed" {{ (request()->input('status') == 'completed') ? 'selected' : null }}>Completed</option>
                                </select>
                            </div>
                            <div class="form-group ml-2 mb-0">
                                <button type="submit" class="btn btn-sm btn-primary shadow">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
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
                                    <a href="{{ route('admin.order', $item->number) }}" class="btn btn-sm btn-primary shadow">
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
        <div class="mt-3">
            {{ $orders->links() }}
        </div>
    </div>
@endsection