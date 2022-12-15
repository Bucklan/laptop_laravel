@extends('layouts.adm')

@section('title','USERS PAGE')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{__('register.name')}}</th>
                        <th scope="col">{{__('cart.Name Laptop')}}</th>
                        <th scope="col">{{__('cart.Number laptop')}}</th>
                        <th scope="col">{{__('cart.ram laptop')}}</th>
                        <th scope="col">{{__('cart.memory laptop')}}</th>
                        <th scope="col">{{__('buttons.Confirm')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @for($i = 1;$i<=count($laptopsInCart);$i++)
                        <tr>
                            <th scope="row">{{$i}}</th>
                            <td>{{$laptopsInCart[$i-1]->user->name}}</td>
                            <td>{{$laptopsInCart[$i-1]->laptop->name}}</td>
                            <td>{{$laptopsInCart[$i-1]->quantity}}</td>
                            <td>{{$laptopsInCart[$i-1]->ram}}</td>
                            <td>{{$laptopsInCart[$i-1]->memory}}</td>
                            <td>
                                <form action="{{route('adm.cart.confirm',$laptopsInCart[$i-1]->id)}}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-success">{{__('buttons.Confirm')}}</button>
                                </form>
                            </td>
                        </tr>
                    @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

