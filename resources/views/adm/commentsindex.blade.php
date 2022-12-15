@extends('layouts.adm')

@section('title','users page')

@section('content')

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">{{__('register.name')}}</th>
            <th scope="col">{{__('register.email')}}</th>
            <th scope="col">{{__('adm.Comments')}}</th>
            <th>{{__('buttons.delete')}}</th>
        </tr>
        </thead>
        <tbody>
        @for($i=0; $i<count($comments); $i++)
            <tr>
                <th scope="row">{{$i+1}}</th>
                <td>{{$comments[$i]->user->name}}</td>
                <td>{{$comments[$i]->user->email}}</td>
                <td>{{$comments[$i]->content}}</td>

                <td>
                    <form action="{{route('comments.destroy',$comments[$i]->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">{{__('buttons.delete')}}</button>
                    </form>
                </td>
            </tr>
        @endfor

        </tbody>
    </table>


@endsection
