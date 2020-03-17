@extends('layouts.app')
@section('content')
    <p class="text-center">List space parks</p>
    <div class="text-center">
    	 <button class="bg-info"><a class="text-white" href="{{}}">create</a></button>
    </div>
    <div class="row">
    	@foreach ($list_space_parks as $space_park)
	    	<div class="col-md-2 mx-1 bg-primary">
	    		<p class="text-center">#{{ $space_park->code }}</p>
	    		<div class="option">
	    			<button class="bg-warning my-2"><a class="text-white" href="{{ Route('edit-space-park', $space_park->id) }}">edit</a></button>
	    			<button class="bg-danger my-2 "><a class="text-white" href="">delete</a></button>
	    		</div>
	    	</div>
    	@endforeach
    </div>
@endsection