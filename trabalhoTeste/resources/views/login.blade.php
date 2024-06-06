@extends('master')

@section('content')

<a style="visibility:hidden;" href="{{route('home')}}">Home</a>
<h2 style="visibility:hidden;">Login</h2>

<div class="container">
    <div class="row">
		<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading" style="text-align:center;">
			    	<h3 class="panel-title">Login</h3>
			 	</div>
			  	<div class="panel-body">
			    	<form action="{{route('login.store')}}" method="POST" >
                    @csrf
                    <fieldset>
			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="Login" name="login" type="text" value="luis22ant">
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" placeholder="Password" name="senha" type="password" value="123">
			    		</div>
			    		<button class="btn btn-lg btn-success btn-block" type="submit" >Login</button>
			    	</fieldset>
			      	</form>
					<div>
					@error('error')
<span>{{ $message }}</span>
@enderror
					</div>
			    </div>
			</div>
		</div>
	</div>
</div>
@endsection