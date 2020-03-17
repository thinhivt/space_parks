@extends('layouts.app')
@section('content')
    <p>Update space parks</p>
    <div class="form-group">
    	<form action="{{ Route('update-space-park', $space_park)}}" method="post">
	    	<p>select status</p>
	    	<label for="on">ON</label>
	    	<input type="radio" name="status" value="0" id="on" {{}}>
	    	<label for="off">OFF</label>
	    	<input type="radio" name="status" value="1" id="off">
	    	<p>add trouble</p>
	    	<input type="text" name="trouble" class="">
	    </form>
    </div>
@endsection