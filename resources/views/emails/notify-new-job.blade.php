<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h2>Enhorabuena</h2>
	<p style="font-size: 16px;">Ha creado con éxito la oferta <a href="{{ route('companies.jobs.show', [$job->company, $job]) }}" style="font-weight: bold;">{{ $job->name }}</a></p>
</body>
</html>