@extends('layouts.default')
@section('title', 'Nyeuseuh - Laundry online Tel-Aviv')

@section('content')
<section class="order py-4 @if(!Auth::check()) guest @endif">
<form id="order">
    @csrf
    <div class="container pb-md-5">
        <div class="mb-3">
            <h2>Order {{ config('app.name') }} services</h2>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="alerts-order"></div>
                <div class="price-list table-responsive bg-white border rounded">
                    <table class="table mb-0 item-list">
                        <thead>
                            <tr>
                                <th class="border-top-0">#</th>
                                <th class="border-top-0">Name</th>
                                <th class="border-top-0">Price</th>
                                <th class="border-top-0 w-25">Quantity</th>
                                <th class="border-top-0 w-25">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td class="align-middle"><img src="{{ asset('icons/'.$item->icon) }}" class="img-thumbnail" width="51px"></td>
                                <td class="align-middle">{{ $item->name }}</td>
                                <td class="align-middle">{{ numToRupiah($item->price) }}</td>
                                <td class="align-middle">
                                    <input type="number" min="0" class="form-control qty-control" data-id="{{ $item->id }}" data-price="{{ $item->price }}" placeholder="Quantity" name="item[{{ $item->id }}]">
                                </td>
                                <td class="align-middle">
                                    <span class="qty-total" id="qty-{{ $item->id }}">Rp. 0</span>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-4 mt-md-0 mt-2">
                <div class="card card-body p-0 shadow mb-3">
                    <h5 class="mb-0 px-3 py-3 bg-primary text-white rounded-top">Summary Order</h5>
                    <table class="table mb-0">
                        <tbody>
                            <tr>
                                <th class="w-50">Sub Total</th>
                                <td><span class="font-weigh-bold subtotal">Rp.0</span></td>
                            </tr>
                            <tr class="shipping-text d-none">
                                <th class="w-50">Shipping</th>
                                <td><span class="font-weigh-bold">Rp. 10.000</span></td>
                            </tr>
                            <tr>
                                <th class="w-50">Total</th>
                                <td><span class="font-weigh-bold total">Rp.0</span></td>
                                <input type="hidden" name="total" id="total-value" value="0">
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="custom-control my-2 custom-checkbox">
                    <input type="checkbox" name="pickup" value="true" class="custom-control-input" id="pickup">
                    <label class="custom-control-label" for="pickup">Pickup my dirty outfits.</label>
                </div>
                <div class="form-group address-field my-2 d-none">
                    <textarea name="address" id="address" cols="10" rows="3" class="form-control" placeholder="Write your address here."></textarea>
                </div>
                <button type="submit" class="btn btn-checkout btn-block btn-lg btn-primary">Continue to checkout</button>
            </div>
        </div>
    </div>
</form>
</section>
@endsection
