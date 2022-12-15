@extends('layouts.app')

@section('title', 'CREATE PAGE')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <form action="{{route('laptops.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nameInput">{{ __('messages.название') }}</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="nameInput" name="name" placeholder={{ __('messages.enter name') }}>
                        @error('name')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="priceInput">{{ __('messages.цена') }}</label>
                        <input type="number" class="form-control @error('price') is-invalid @enderror" id="priceInput" name="price" placeholder={{ __('messages.enter price') }}>
                        @error('price')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="ramInput">{{ __('messages.озу') }}</label>
                        <input type="number" class="form-control @error('ram') is-invalid @enderror" id="ramInput" name="ram" placeholder={{ __('messages.enter ram') }}>
                        @error('ram')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="memoryInput">{{ __('messages.память') }}</label>
                        <input type="number" class="form-control @error('memory') is-invalid @enderror" id="memoryInput" name="memory" placeholder={{ __('messages.enter memory') }}>
                        @error('memory')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="cpuInput">{{ __('messages.процессор') }}</label>
                        <input type="text" class="form-control @error('cpu') is-invalid @enderror" id="cpuInput" name="cpu" placeholder={{ __('messages.enter cpu') }}>
                        @error('cpu')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
{{--                    <div class="form-group">--}}
{{--                        <label for="imageInput">Изображение</label>--}}
{{--                        <input type="text" class="form-control @error('image') is-invalid @enderror" id="imageInput" name="image" placeholder="image URL">--}}
{{--                        @error('image')--}}
{{--                        <div class="alert alert-danger">{{$message}}</div>--}}
{{--                        @enderror--}}
{{--                    </div>--}}

                    <div class="form-group">
                        <label for="imgInput" class="form-label">{{ __('messages.изображение') }}</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="imgInput" name="image" >
                        @error('image')
                        <div style="color: red" class="alert col-md-4 col-md-offset-4">{{$message}}</div>
                        @enderror
                    </div>



                    <div class="form-group">
                        <label for="categoryInput">{{ __('messages.категория') }}</label>
                        <select class="form-control @error('category_id') is-invalid @enderror" id="categoryInput" name="category_id">
                            @foreach($categories as $cat)
                                <option value="{{$cat->id}}">{{$cat->{'name_'.app()->getLocale()} }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <button class="btn btn-outline-success" type="submit">{{ __('messages.отправить') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
