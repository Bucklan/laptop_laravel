@extends('layouts.adm')

@section('title','Create category page')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <form action="{{route('adm.categories.store')}}" method="post"  enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nameInput">{{ __('messages.name') }}</label>
                <input type="text" class="form-control @error('name_kz') is-invalid @enderror" id="nameInput" name="name_kz" placeholder="Санаттарды еңгізіңіз">
                @error('name_kz')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
                </div>
            <div class="form-group">
                <label for="nameInput">{{ __('messages.name') }}</label>
                <input type="text" class="form-control @error('name_en') is-invalid @enderror" id="nameInput" name="name_en" placeholder="Enter name">
                @error('name_en')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="nameInput">{{ __('messages.name') }}</label>
                <input type="text" class="form-control @error('name_ru') is-invalid @enderror" id="nameInput" name="name_ru"
                       placeholder="Введите названия категория">
                @error('name_ru')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="imgInput" class="form-label">{{ __('messages.изображение') }}</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="imgInput" name="image">
                @error('image')
                <div style="color: red" class="alert col-md-4 col-md-offset-4">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group mt-3">
                <button type="submit" style="float:right;" class="btn btn-success">{{ __('messages.create category') }}</button>
            </div>
        </form>
@endsection
