@extends('master')

@section('content')


<form action="/" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<input type="file" name="attach">
		<br>
		<button class="btn btn-primary" type="submit">Dodaj</button>
	</div>
</form>


@stop