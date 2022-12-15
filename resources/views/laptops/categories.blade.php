@extends('layouts.app')

@section('title','categories page')

@section('content')
    <div class="container">
        <div class="row">
            @for($i=0;$i<count($categories); $i++)
                    <div class="col-4 mt-3">
                        <a href="{{route('laptops.category', $categories[$i]->id)}}">
                            <div class="card text-center" style="color: black">
                                <img src="{{asset($categories[$i]->image)}}"
                                     class="card-img-top"
                                     width="250" height="300"/>
                                <div class="card-body">
                                    <h5 class="card-title">{{$categories[$i]->{'name_'.app()->getLocale()} }}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
            @endfor
        </div>
    </div>
@endsection
