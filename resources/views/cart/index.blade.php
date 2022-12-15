@extends('layouts.app')

@section('title','CART PAGE')

@section('content')
    @isset($laptopsInCart)
        <div class="container">
            <div class="row">
                <div class="col-9">
                    <table class="table align-middle mb-0 bg-white">
                        <thead class="bg-light">
                        <tr>
                            <th>{{__('cart.image')}}</th>
                            <th>{{__('cart.name')}}</th>
                            <th>{{__('cart.plusorminus')}}</th>
                            <th>{{__('cart.ram')}}</th>
                            <th>{{__('cart.memory')}}</th>
                            <th>{{__('cart.quantity')}}</th>
                            <th>{{__('cart.price')}}</th>
                            <th>{{__('cart.totalprice')}}</th>
                            <th>{{__('cart.actions')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($laptopsInCart as $laptop)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img
                                            src="{{asset($laptop->image)}}"
                                            alt=""
                                            style="width: 45px; height: 45px"
                                            class="rounded-circle"
                                        />
                                    </div>
                                </td>
                                <td>
                                    <p class="fw-normal mb-1">{{$laptop->name}}</p>
                                </td>
                                <td>
                                    <form action="{{route('cart.addcart',$laptop->id)}}"
                                          method="post">
                                        @csrf
                                        <button class="btn btn-success">+</button>
                                    </form>
                                    <form action="{{route('cart.removecart',$laptop->id)}}"
                                          method="post">
                                        @csrf
                                        <button class="btn btn-danger">-</button>
                                    </form>
                                </td>
                                <td>
                                    <p class="fw-normal mb-1">{{$laptop->pivot->ram}}</p>
                                </td>
                                <td>
                                    <p class="fw-normal mb-1">{{$laptop->pivot->memory}}</p>
                                </td>
                                <td>
                                    <p class="fw-normal mb-1">x{{$laptop->pivot->quantity}}</p>
                                </td>
                                <td>
                                    <p class="fw-normal mb-1">{{$laptop->price}} {{__('buttons.KZT')}}</p>
                                </td>
                                </td>
                                <td>
                                    <p class="fw-normal mb-1">{{$laptop->price*$laptop->pivot->quantity}} {{__('buttons.KZT')}}</p>
                                </td>
                                <td>
                                    <form action="{{route('cart.deletefromcart',$laptop->id)}}" method="post">
                                        @csrf
                                        <button class="btn btn-danger">{{__('buttons.delete')}}</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
                <div class="col">

                   <h3> {{__('cart.Your balance')}} : {{\Illuminate\Support\Facades\Auth::user()->my_balance}} {{__('buttons.KZT')}}</h3>
                    <form action="{{route('cart.deleteallcart')}}" method="post">
                        @csrf
                        <button class="btn btn-secondary">{{__('buttons.Clear All')}}</button>
                    </form>
                    <form action="{{route('cart.buy')}}" method="post">
                        @csrf
                        <button class="btn btn-success"><span>{{__('buttons.Buy All')}}</span></button>
                    </form>
                </div>
            </div>
        </div>
    @else
        <div class="container text-center">
            <div class="row text-center">
                <div class="col-12 text-center">
                    <h1 class="text-center">{{__('cart.Your cart is empty')}}</h1>
                </div>
            </div>
        </div>
    @endisset

@endsection

