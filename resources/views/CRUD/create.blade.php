@extends('layouts.adminapp')
@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Create New User</h1>			
				{!! Form::open(['route' => 'home.store']) !!}
    			{{Form::label ('username','UserName:') }}
    			{{Form::text('username',null,array('class'=>'form-control'))}}
    			{{Form::label ('firstname','FirstName:') }}
    			{{Form::text('firstname',null,array('class'=>'form-control'))}}
    			{{Form::label ('lasstname','LastName:') }}
    			{{Form::text('lastname',null,array('class'=>'form-control'))}}
    			{{Form::label ('email','Email:') }}
    			{{Form::text('email',null,array('class'=>'form-control'))}}
    			{{Form::label ('password','Password:') }}
    			{{Form::password('password',array('class'=>'form-control'))}}
    			{{Form::label ('password_confirmation','Confirm Password:') }}
    			{{Form::password('password_confirmation',array('class'=>'form-control'))}}               
    			<div class="col-md-10"></div>
    			<div class="col-md-2">
    				{{Form::submit('Create User',array('class'=>'btn btn-success','style'=>'margin-top:20px'))}}
    			</div>
    			
			{!! Form::close() !!}

			
		</div>
		
	</div>
@endsection