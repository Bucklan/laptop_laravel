@extends('layouts.app')

@section('title', 'EDIT PAGE')

@section('content')
    <script src="/js.js"></script>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <img alt="laptop" style="width:700px" src="{{asset($laptop->image)}}">
            <h3><span style="font-weight: bold">{{ __('messages.название') }} </span>{{$laptop->name}}</h3>
            <h3><span style="font-weight: bold">{{ __('messages.цена') }} </span>{{$laptop->price}} {{__('buttons.KZT')}}</h3>
            <h3><span style="font-weight: bold">{{ __('messages.озу') }}</span>{{$laptop->ram}} GB</h3>
            <h3><span style="font-weight: bold">{{ __('messages.память') }}</span>{{$laptop->memory}} GB</h3>
            <h3><span style="font-weight: bold">{{ __('messages.процессор') }} </span>{{$laptop->cpu}}</h3>
            @can('update', $laptop)
            <a class="btn btn-success mb-2" href="{{route('laptops.edit', $laptop->id)}}">{{ __('messages.редактировать') }}</a>
            @endcan
            @if($avg != 0)
                <div class="flex items-center">
                    @for($i=0;$i<$avg;$i++)
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                             fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path
                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>
                    @endfor
                    @for($i = 5;$i>$avg;$i--)
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                             fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                            <path
                                d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                        </svg>
                    @endfor
                </div>
                <div class="text-xs text-slate-500 ml-1">{{__('buttons.AVG Rating')}}:{{$avg}}+</div>

            @endif

            @auth
                <form action="{{route('laptops.rate',$laptop->id)}}" method="post">
                    @csrf
                    <select name="rating">
                        @for($i=0;$i<=5;$i++)
                            <option
                                {{ $myRating==$i ? 'selected' : ''}} value="{{$i}}">{{ $i==0 ? __('buttons.Not rated'):$i}}</option>
                        @endfor
                    </select>
                    <button class="btn btn-success">{{__('buttons.ADD')}}</button>
                </form>
                <form action="{{route('laptops.unrate',$laptop->id)}}" method="post">
                    @csrf
                    <button class="btn btn-secondary">{{__('buttons.Clear')}}</button>
                </form>
            @endauth

        @auth
                <form action="{{route('cart.puttocart', $laptop->id)}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="quantityInput">{{ __('messages.количество') }}</label>
                    @isset($laptopCart->pivot->quantity)
                            <input min="1" type="number" class="form-control" id="quantitytInput" name="quantity" value="{{$laptopCart->pivot->quantity}}">
                        @else
                            <input min="1" type="number" class="form-control" id="quantitytInput" name="quantity" value="0">
                        @endisset
                    </div>
                    <div class="form-group">
                        <label for="ramInput">{{ __('messages.озу') }}</label>
                        <select class="form-select" name="ram">
                        @for($i=4;$i<=16;$i*=2)
                            @isset($laptopCart->pivot->ram)
                                    <option value="{{$i}}" {{$laptopCart->pivot->ram == $i ? 'selected' : ''}}>
                                        {{$i}}
                                    </option>
                                @else
                                    <option value="{{$i}}">
                                        {{$i}}
                                    </option>
                                @endisset
                            @endfor
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="memoryInput">{{ __('messages.память') }}</label>
                        <select class="form-select" name="memory">
                        @for($i=128;$i<=1024;$i*=2)
                            @isset($laptopCart->pivot->quantity)
                                    <option value="{{$i}}" {{$laptopCart->pivot->memory == $i ? 'selected' : ''}}>
                                        {{$i}}
                                    </option>
                                @else
                                    <option value="{{$i}}">
                                        {{$i}}
                                    </option>
                                @endisset
                            @endfor
                        </select>
                    </div>
                    <button style="float:left; margin-right:10px;" class="btn btn-success mt-2" type="submit">{{ __('messages.add to cart') }}</button>
                </form>


            @endauth
            <div style="margin-top:60px;">
                <form action="{{route('comments.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="commentInput"><h3>{{ __('messages.оставить комментарий') }}</h3></label>
                        <textarea class="form-control" id="commentInput" name="content" rows="3"></textarea>
                        <input name="laptop_id" value="{{$laptop->id}}" type="hidden">
                    </div>
                    <div class="form-group mt-3">
                        <button class="btn btn-primary" type="submit">{{ __('messages.отправить') }}</button>
                    </div>
                </form><br><br>
                <hr>
        </div>
            <h3 class='text-center'>{{ __('messages.комментарий') }}</h3>
            @foreach($laptop->comments as $comment)
                <div class="card mb-3">
                    <div class="card-header">
                        {{$comment->user->name}} <small>{{$comment->created_at}}</small>
                    </div>
                    <div class="card-body">
                        <h4 class="card-text">{{$comment->content}}</h4>
                        @can('update',$comment)
                        <div class="form-group">
                            <button class="btn btn-primary mt-3"  onclick="myFunction()">{{ __('messages.редактировать комментарии') }}</button>
                        </div>
                        @endcan
                        <div id="myDIV" style="display:none;">
                            <form action="{{route('comments.update', $comment->id)}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <textarea  class="form-control mt-3" id="commentInput" name="content" rows="3">{{$comment->content}}</textarea>
                                    <input name="laptop_id" value="{{$laptop->id}}" type="hidden">
                                    @method('PUT')
                                    <button style="float:right;" class="btn btn-success mt-2" type="submit" >{{ __('messages.сохранить') }}</button>
                                </div>
                            </form>
                            <form method="post" action="{{route('comments.destroy', $comment->id)}}">
                                @csrf
                                @method('DELETE')
                                <button style="float:right;margin-right:10px;" class="btn btn-danger mt-2">{{ __('messages.удалить') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
