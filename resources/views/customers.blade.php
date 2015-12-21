@extends('master')

@section('content')
<div class="container">
	<form class="form-inline" action="customer" method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label for="exampleInputName2">ID mernog mesta:</label>
			<input type="number" class="form-control" id="exampleInputName2" placeholder="IDMM" name="idmm">
		</div>
		<button type="submit" class="btn btn-default">Traži</button>
	</form>
	<hr>
	<div class="page-header">
		<h2>Jon Doe<br>
		<small>Adressa: Mileticeva 28, Bela Crkva</small><br>
		<small>IDMM: 2566</small>
		</h2>
    </div>

</div>

@stop