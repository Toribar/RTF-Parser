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
			<th>Datum izdavanj naloga</th>
			<th>Sifra naloga</th>
			<th>Tip naloga</th>
			<th>Nalog izvrsen?</th>
			<th>Datum izvrsavanja</th>
		</tr>
	</thead>

	<tbody>
		<td>1</td>
		<td>{{ $parser->get('idmm') }}</td>
		<td>{{ $parser->get('costumer') }}</td>
		<td>{{ $parser->get('adress') }}</td>
		<td>{{ $parser->get('number') }}</td>
		<td>Bela Crkva</td>
		<td>{{ $parser->get('read_date') }}</td>
		<td>{{ $parser->get('idmm') }}</td>
		<td>{{ $parser->get('issue') }}</td>
		<td>Da/Ne?</td>
		<td>/</td>
	</tbody>
</table>	

@stop