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

    <div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				Nalog izdat 21.12.2012
			</div>
			<div class="panel-body">
				Tip naloga: Bazdarenje<br>
				Nalog izvrsen: Da<br>
				Datum izvrsavanja: 21.21.2012<br>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				Nalog izdat 21.12.2013
			</div>
			<div class="panel-body">
				Tip naloga: Puklo staklo<br>
				Nalog izvrsen: Da<br>
				Datum izvrsavanja: 21.21.2013<br>
			</div>
		</div>
	</div>

</div>

@stop