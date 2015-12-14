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
			<th>Šifra naloga</th>
			<th>Tip naloga</th>
			<th>Nalog izvršen?</th>
			<th>Datum izvršavanja</th>
		</tr>
	</thead>

	<tbody>
		@foreach ($documents as $document)
			<tr>
				<td>1</td>
				<td>{{ $document->idmm }}</td>
				<td>{{ $document->customer_name }}</td>
				<td>{{ $document->customer_address_street }}</td>
				<td>{{ $document->customer_address_number }}</td>
				<td>{{ $document->customer_address_location }}</td>
				<td>{{ $document->issued_on }}</td>
				<td>{{ $document->issue_code }}</td>
				<td>{{ $document->issue_type }}</td>
				<td>Da/Ne?</td>
				<td>/</td>
			</tr>
		@endforeach
	</tbody>
</table>	
<br>
<br>
<a href="{{ url('/') }}" class="btn btn-info">Dodaj Nalog</a>


@stop