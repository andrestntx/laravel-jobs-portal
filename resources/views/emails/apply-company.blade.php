<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h2>Ha recibido una Hoja de Vida</h2>
	<p style="font-size: 16px;">El usuario {{ $resume->jobseeker->full_name }} envío su <a href="{{ route('resumes.show', $resume) }}">hoja de vida</a> aplicando al empleo <a href="{{ route('companies.jobs.show', [$job->company, $job]) }}">{{ $job->name }}</a> </p>
	<h3>Mensaje:</h3>
	<p style="font-size: 16px;">{{ $application->intro }}</p>
</body>
</html>