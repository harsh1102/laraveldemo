@extends('layouts.app')

@section('title', 'Laravel')

@section('sidebar')
    @parent
		<nav class="navbar navbar-inverse">
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>                        
		      </button>
		      <a class="navbar-brand" href="#">First Laravelsite</a>
		    </div>
		    <div class="collapse navbar-collapse" id="myNavbar">
		    	<ul class="nav navbar-nav">
		        	<li class="active"><a href="#">Home</a></li>
		        	<li><a href="{{ url('') }}">Page 2</a></li>
		        	<li><a href="#">Page 3</a></li>
		      	</ul>
		      	<ul class="nav navbar-nav navbar-right">
        			<li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      			</ul>
		    </div>
		  </div>
		</nav>
@endsection

@section('content')
<div class="row">
<div class="col-md-7">
  		<form action="{{url('/register')}}" method="POST">
  			<h2 align="center">Registeration Form</h2>
  			{{ csrf_field() }}
	    	<div class="form-group">
	      		<label for="name">Name:</label>
	      		<input type="text" class="form-control" id="username" placeholder="Enter Name" name="username" required>
	    	</div>
	    	<div class="form-group">
	    		<div class="row">
	    			<div class="col-md-6">
			    		<label>Gender:</label>
				    	<label class="radio-inline">
			      			<input type="radio" name="gender" id="male" value="male" checked>Male
			    		</label>
			    		<label class="radio-inline">
			      			<input type="radio" name="gender" id="female" value="female">Female
			    		</label>
		    		</div>
		    		<div class="col-md-6">
		    			<label>Hobbies:</label>
		    			<div class="checkbox-inline">
		      				<input type="checkbox" name="cb[]" id="cbr" value="reading" checked>Reading
		    			</div>
		    			<div class="checkbox-inline">
		      				<input type="checkbox" name="cb[]" id="cbs" value="sporst">Sporst
		    			</div>
		    			<div class="checkbox-inline">
		      				<input type="checkbox" name="cb[]" id="cbt" value="travelling">Travelling
		    			</div>
	    			</div>
    			</div>
			</div>
    		<div class="form-group">
    			<label>Color:</label>
		    	<select class="form-control" name="color" id="color">
	        		<option value="red">Red</option>
			        <option value="blue">Blue</option>
			        <option value="green">Green</option>
			        <option value="white">White</option>
			        <option value="black">Black</option>
	      		</select>
      		</div>
	    	<div class="form-group">
      			<label for="email">Email:</label>
      			<input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
    		</div>
	    	<div class="form-group">
	      		<label for="pwd">Password:</label>
	      		<input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" required>
	    	</div>
	    	<div class="form-group">
	      		<label for="pwd">Confirm Password:</label>
	      		<input type="password" class="form-control" id="cpwd" placeholder="Enter Confirm password" name="cpwd" required>
	    	</div>
	    	<input type="submit" value="Register" name="regsubmitform" id="regsubmitform" class="btn btn-default">
  		</form>
</div>
<div class="col-md-1"></div>
<div class="col-md-4 panel panel-default">
	@if (isset($details))
		<h2 class="panel-heading" align="center">User Details</h2>
		<div>
			<form action="{{url('/update')}}" method="POST">
				{{ csrf_field() }}
				<input type="hidden" name="uid" value="{{ $details['data']->id}}" id="uid">
				<div class="form-group">
      				<label for="email">Name:</label>
      				<input type="text" class="form-control" name="updatename" value="{{ $details['data']->User_name }}">
			    </div>
			    <div class="form-group">
      				<label for="email">Email:</label><br>
      				<h5>{{ $details['data']->User_email }}</h5>
			    </div>
				<div class="form-group">
				      	<label for="pwd">Password:</label>
				      	<input type="text" class="form-control" name="updatepassword" value="{{ $details['data']->User_password}}">
				</div>
    			<center><input type="submit" value="Update" name="updatedetails" id="updatedetails" class="btn btn-default"></center>
    		</form>
    	</div>
    	<center><input type="submit" value="Logout" name="logoutsubmitform" id="logoutsubmitform" class="btn btn-default"></center>
	@else
	<h2 class="panel-heading" align="center">Login Form</h2>
	<form action="{{url('/login')}}" method="POST">
  			{{ csrf_field() }}
	<div class="form-group">
      			<label for="email">Email:</label>
      			<input type="email" class="form-control" id="email" placeholder="Enter email" name="loginemail">
    </div>
	<div class="form-group">
	      	<label for="pwd">Password:</label>
	      	<input type="password" class="form-control" id="pwd" placeholder="Enter password" name="loginpwd">
	</div>
	<input type="submit" value="Login" name="loginsubmitform" id="loginsubmitform" class="btn btn-default">
	</form>
	@endif
</div>
</div>
@endsection

<!-- @component('alert', ['message' => 'Close this','type' => 'danger'])
    @slot('title')
        Forbidden
    @endslot
    	
    You are not allowed to access this resource!
@endcomponent -->