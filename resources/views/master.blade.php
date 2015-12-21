<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> 
		<style type="text/css">
			body { padding-top: 70px; }
		</style>
		<title>Praćenje naloga</title>
	</head>

	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-2 col-xs-2">
					@include('partials.sidebar')
				</div>
				<div class="col-md-10 col-xs-10">
					@yield('content')
				</div>
			</div>	
		</div>
	</body>

</html>