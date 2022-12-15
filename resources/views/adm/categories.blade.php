@extends('layouts.adm')

@section('title','categories page')

@section('content')
    <h1>{{ __('messages.categories page') }}</h1>
    <a class="btn btn-primary mb-2" href="{{route('adm.categories.create')}}">{{ __('messages.create category') }}</a>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">{{ __('messages.name') }}</th>
            <th>{{ __('messages.edit') }}</th>
          </tr>
        </thead>
        <tbody>
            @for($i=0;$i<count($categories); $i++)
                <tr>
                    <th scope="row">{{$i+1}}</th>
                    <td>{{$categories[$i]->{'name_'.app()->getLocale()} }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{route('adm.categories.edit', $categories[$i]->id)}}">{{ __('messages.edit') }}</a>
                    <td>
                        <form method="post" action="{{route('adm.categories.destroy', $categories[$i]->id)}}">
                            @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">{{ __('messages.delete') }}</button>
                        </form>
                    </td>
                </tr>
            @endfor
        </tbody>
      </table>
@endsection
