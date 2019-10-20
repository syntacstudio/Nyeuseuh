@extends('layouts.admin')

@section('content')
    @include('components.alerts')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-content-center">
            <h6 class="m-0 font-weight-bold text-primary pt-2">Administrator List</h6>
            <a href="{{ route('admin.administrator.create') }}" class="btn btn-sm btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Create Administrator</span>
            </a>
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
                            <a href="{{ route('admin.administrator.edit', $item->id) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                            @if($item->id != Auth::user()->id)
                            <form class="d-inline" action="{{ route('admin.administrator.destroy', $item->id) }}" method="POST">
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