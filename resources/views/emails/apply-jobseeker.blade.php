<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<img src="{{ $portalLogo }}" alt="">
	<h1>E<span>nhorabuena</span></h1>
    <p style="font-size: 16px;">Ha aplicado satisfactoriamente a la oferta <a href="{{ route('companies.jobs.show', [$job->company, $job]) }}" title="">$job->name</a> de la empresa <a href="{{ route('companies.show', $job->company) }}">{{ $job->company->name }}</a></p>
    <p style="font-size: 16px;">Mil Gracias</p>
</body>
</html>