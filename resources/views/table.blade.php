@extends('master')

@section('content')

<table class="table table-bordered">
	<thead>
		<tr>
			<th>Broj naloga</th>
			<th>ID mernog mesta</th>
			<th>Ime/Naziv korisnika</th>
			<th>Ulica</th>
			<th>Broj</th>
			<th>Mesto</th>
			<th>Datum izdavanja naloga</th>
			<th>Sifra naloga</th>
			<th>Tip naloga</th>
			<th>Nalog izvrsen?</th>
			<th>Datum izvrsavanja</th>
		</tr>
	</thead>

	<tbody>
		@foreach ($documents as $document)
			<tr>
				<td>1</td>
				<td>{{ $document->idmm }}</td>
				<td>{{ $document->customer_name }}</td>
				<td>{{ $document->customer_address }}</td>
				<td>@{{ $parser->get('number') }}</td>
				<td>@{{ $parser->get('place') }}</td>
				<td>@{{ $parser->get('read_date') }}</td>
				<td>{{ $document->filename }}</td>
				<td>@{{ $parser->get('issue') }}</td>
				<td>Da/Ne?</td>
				<td>/</td>
			</tr>
		@endforeach
	</tbody>
</table>	

@stop