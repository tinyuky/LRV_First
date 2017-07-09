@extends('layouts.adminapp')
@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>User Information</h1>	
            {!!Form::model($post) !!}					
    			{{Form::label ('username','UserName:') }}
    			{{Form::text('username',null,array('class'=>'form-control'))}}
    			{{Form::label ('firstname','FirstName:') }}
    			{{Form::text('firstname',null,array('class'=>'form-control'))}}
    			{{Form::label ('lasstname','LastName:') }}
    			{{Form::text('lastname',null,array('class'=>'form-control'))}}
    			{{Form::label ('email','Email:') }}
    			{{Form::text('email',null,array('class'=>'form-control'))}}
    			{{Form::label ('password','Password:') }}
    			{{Form::text('password',null,array('class'=>'form-control'))}}              			
			{!! Form::close() !!}

            

			
		</div>
		
	</div>
@endsection