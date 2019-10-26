@extends('layouts.default')
@section('title', 'Nyeuseuh - Laundry online Tel-Aviv')

@section('content')
<section class="testimonials py-5">
    <div class="container">
        <div class="mb-3">
            <h2>Order {{ config('app.name') }} services</h2>
        </div>
        <table class="table table-bordered bg-white shadow">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($DATA as $item)
                <tr>
                    <td>{{  }}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection
