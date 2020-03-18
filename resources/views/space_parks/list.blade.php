@extends('layouts.app')
@section('content')
	<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="https://cdn.socket.io/socket.io-1.3.4.js"></script>
	<div class="bg-info text-white py-2 px-2">
		<h4 class="">List space parks</h4>
	</div>
    <div class="text-center my-2">
    	 <button class="bg-info"><a class="text-white" href="{{ Route('create-space-park') }}">create</a></button>
    </div>
    <div class="row text-center">
    	@foreach ($list_space_parks as $space_park)
	    	<div class="card col-md-2 mx-1 my-2">
			  <div class="card-body">
				    <h5 class="card-title text-center">{{$space_park->number}}</h5>
				    <p class="card-text">
				    	<?php echo ($space_park->trouble) ? 'warning': 'none trouble'; ?>
				    </p>
				    <div class="option row">
				    	<div>
				    		<button class="bg-warning mx-1"><a class="text-white" href="{{ Route('edit-space-park', $space_park->id) }}">edit</a></button>
				    	</div>
		    			<div>
				    		<form action="{{Route('delete-space-park', $space_park->id)}}" method="post">
	                            @csrf
	                            @method('DELETE')
	                            <button type="submit" class="btn-secondary " title="delete category">delete</button>   
	                        </form>
				    	</div>
		    		</div>
			  </div>
			</div>
    	@endforeach
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2" >
              <div id="messages" ></div>
            </div>
        </div>
    </div>
    <script>
        var socket = io.connect('http://localhost:8809');
        socket.on('status', function (data) {
            $( "#messages" ).append( "<p>"+data+"</p>" );
          });
    </script>
@endsection