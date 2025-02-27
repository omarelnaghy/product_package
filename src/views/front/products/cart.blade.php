@extends('product_crud::layouts.app')

@section('content')
    <div class="breadcrumb">
        <div class="breadcrumb-item">
            <a href="{{route('product.index')}}">Products</a>
            <a href="{{route('cart.view')}}">Cart</a>
            <a href="{{route('cart.clear')}}">Cart Clear</a>
        </div>
    </div>
    <div class="row justify-content-around ">
        @if(!Auth::user()->carts->empty())
            <a href="{{route('order.create')}}">Place Order</a>
        @endif
        @forelse($carts as $cartItem)

            <div class="col-3 card ml-1" style="">
                <img src="{{ $cartItem->image? asset('public/products/').$product->image
                                      :asset('public/default.jpeg')}}"
                     class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">{{$cartItem->stock?->product?->name}}</h5>
                    <p class="card-text">{{$cartItem->stock?->product?->description}}</p>
                    <p>Quantity : {{$cartItem->quantity}}</p>
                    <p class="card-text">Size : {{$cartItem->stock->size}}</p>
                    <p>Total Price : {{$cartItem->quantity * (int) $cartItem->stock->price}}</p>
                </div>
            </div>

        @empty
            <div></div>
        @endforelse
    </div>

@endsection
