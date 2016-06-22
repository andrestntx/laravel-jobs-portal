@extends('layouts.admin')

@section('breadcrumbs')
    {!! Breadcrumbs::render('stats') !!}
@endsection

@section('title')
	<span>Estadísticas</span>
@endsection

@section('article')
    <div class="mj_postdiv mj_postpage mj_shadow_blue mj_toppadder20">
        <table class="table table-striped">
            <tr>
                <td>PERSONAS INSCRITAS TOTAL</td> 
                <td>{{ $stats['jobseekers']['total'] }}</td></tr>
            <tr>
                <td>PERSONAS INSCRITAS HOMBRES</td> 
                <td>{{ $stats['jobseekers']['total_men'] }}</td></tr>
            <tr>
                <td>PERSONAS INSCRITAS MUJERES</td> 
                <td>{{ $stats['jobseekers']['total_women'] }}</td></tr>
            <tr>
                <td>REMISIONES A EMPLEADORES TOTAL</td> 
                <td>{{ $stats['applications']['total'] }}</td></tr>
            <tr>
                <td>REMISIONES A EMPLEADORES HOMBRES</td> 
                <td>{{ $stats['applications']['total_men'] }}</td></tr>
            <tr>
                <td>REMISIONES A EMPLEADORES MUJERES</td> 
                <td>{{ $stats['applications']['total_women'] }}</td></tr>
            <tr>
                <td>COLOCADOS TOTAL</td> 
                <td>{{ $stats['applications']['hired_total'] }}</td></tr>
            <tr>
                <td>COLOCADOS HOMBRES</td> 
                <td>{{ $stats['applications']['hired_men'] }}</td></tr>
            <tr>
                <td>COLOCADOS MUJERES</td> 
                <td>{{ $stats['applications']['hired_women'] }}</td></tr>
            <tr>
                <td>EMPLEADORES INSCRITOS TOTAL</td> 
                <td>{{ $stats['employers']['total'] }}</td></tr>
            <tr>
                <td>VACANTES REGISTRADAS TOTAL</td> 
                <td>{{ $stats['jobs']['total'] }}</td></tr>
            <tr>
                <td>VACANTES REGISTRADAS CONTRATO LABORAL</td> 
                <td>{{ $stats['jobs']['contract'] }}</td></tr>
            <tr>
                <td>VACANTES REGISTRADAS PRESTACION</td> 
                <td>{{ $stats['jobs']['ops'] }}</td></tr>
        </table>
    </div>
@endsection