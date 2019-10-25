@extends('layouts.admin')

@section('content')
    @include('components.alerts')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary pt-2">Customer List</h6>
        </div>
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
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
                        <td>{{ $item->created_at }}</td>
                        <td class="text-right">
                            <a href="{{ route('admin.operator.edit', $item->id) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                            @if($item->id != Auth::user()->id)
                            <form class="d-inline" action="{{ route('admin.operator.destroy', $item->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" onclick="return confirm('Are you sure want to remove {{ $item->name }}?')" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                            @endif
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