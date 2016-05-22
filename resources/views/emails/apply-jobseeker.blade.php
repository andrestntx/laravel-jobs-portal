<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>G<span>racias por aplicar</span></h1>
    <p style="font-size: 16px;">Ha aplicado correctamente a <a href="{{ route('companies.jobs.show', [$job->company, $job]) }}" title="">esta oferta de empleo</a>. Su hoja de vida ha sido enviada a la empresa <a href="{{ route('companies.show', $job->company) }}">{{ $job->company->name }}</a> y ellos se pondrán en contacto con usted.</p>
</body>
</html>