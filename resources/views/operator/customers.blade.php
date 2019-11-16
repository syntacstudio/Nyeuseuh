@extends('layouts.operator')

@section('content')
    @include('components.alerts')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 mt-1 text-primary">Customers</h5>
        </div>
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Orders</th>
                        <th>Created at</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>#</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->orders()->count() }} orders</td>
                        <td>{{ $item->created_at }}</td>
                        <td class="text-right">
                            <a href="{{ route('operator.customer', $item->id) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="p-3">
        {{ $data->links() }}
    </div>
@endsection