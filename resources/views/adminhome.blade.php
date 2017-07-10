@extends('layouts.adminapp')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <br>
                <div class="col-md-12">
                    {!! Form::open(['route' => 'admin.search','method' => 'get']) !!}
                    <div class="col-md-10">
                        {{Form::text('search',null,array('class'=>'form-control'))}}
                    </div>
                    <div class="col-md-2">   
                        {{Form::submit('Search',array('class'=>'btn btn-success'))}}
                        </div>
                    {!! Form::close() !!}
                </div>
                <br>
                <br>
                <br>

                <table class="table">
                    <thead>
                        <th>Id</th>
                        <th>@sortablelink('username', 'Username')</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Email</th>
                        <th>Tùy chọn</th>
                    </thead>

                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            <th>{{$post->id}}</th>
                            <td>{{$post->username}}</td>
                            <td>{{$post->firstname}}</td>
                            <td>{{$post->lastname}}</td>
                            <td>{{$post->email}}</td>
                            <td>
                                <a href="{{route('home.edit',$post->id)}}" class="btn btn-default btn-sm">Edit</a>
                                <a href="{{route('home.destroy',$post->id)}}" class="btn btn-default btn-sm">Del</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-center">                   
                    {!! $posts->appends(\Request::except('page'))->render() !!}
                </div>
            </dir>

        </div>
    </div>
</div>
</div>
@endsection
