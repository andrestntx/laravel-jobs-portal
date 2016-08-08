@extends('layouts.admin')

@section('breadcrumbs')
    {!! Breadcrumbs::render('stats') !!}
@endsection

@section('title')
	<span>Estadísticas</span>
@endsection

@section('article')
    <div class="mj_postdiv mj_postpage mj_shadow_blue mj_toppadder20">

        <div class="col-md-12">
            {!! Form::open(['url' => '/admin/stats', 'method' => 'GET']) !!}
                <div class="col-md-5">
                    {!! Field::text('start', $start, ['ph' => 'Fecha de inicio', 'class' => 'datepicker', 'tpl' => 'themes.bootstrap.fields.text-date-inline']) !!}
                </div>
                <div class="col-md-5">
                    {!! Field::text('end', $end, ['ph' => 'Fecha Fin', 'class' => 'datepicker', 'tpl' => 'themes.bootstrap.fields.text-date-inline']) !!}
                </div>
                <div class="col-md-2">
                    <button type="submit" id="save" class="btn btn-primary btn-lg">
                        Buscar <i class="fa fa-angle-right"></i>
                    </button>
                </div>
            {!! Form::close() !!}
        </div>

        <div id="dvData">
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
                    <td>{{ $stats['applications']['preselected']['total'] }}</td></tr>
                <tr>
                    <td>REMISIONES A EMPLEADORES HOMBRES</td> 
                    <td>{{ $stats['applications']['preselected']['total_men'] }}</td></tr>
                <tr>
                    <td>REMISIONES A EMPLEADORES MUJERES</td> 
                    <td>{{ $stats['applications']['preselected']['total_women'] }}</td></tr>
                <tr>
                    <td>COLOCADOS TOTAL</td> 
                    <td>{{ $stats['applications']['accepted']['total'] }}</td></tr>
                <tr>
                    <td>COLOCADOS HOMBRES</td> 
                    <td>{{ $stats['applications']['accepted']['total_men'] }}</td></tr>
                <tr>
                    <td>COLOCADOS MUJERES</td> 
                    <td>{{ $stats['applications']['accepted']['total_women'] }}</td></tr>
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
                    <td>{{ $stats['jobs']['ops'] }}</td>
                </tr>

                @foreach($stats['assists'] as $assistance)
                    <tr style="text-transform: uppercase;">
                        <td>{{ $assistance['name'] }}</td> 
                        <td>{{ $assistance['count'] }}</td>
                    </tr>
                @endforeach
            </table>     
        </div>
             
    </div>

    <div class="text-center col-md-12 mj_toppadder20">
        <a href="#" class="btn btn-lg btn-info export">Descargar estadísticas</a>    
        <a href="{{ route('stats.jobseekers') }}" target="_blank" class="btn btn-lg btn-warning">Descargar trabajadores</a>    
        <a href="{{ route('stats.companies') }}" target="_blank" class="btn btn-lg btn-success">Descargar empresas</a>    
    </div>

@endsection

@section('extra-js')
    <script type="text/javascript">
        $(document).ready(function () {
            function exportTableToCSV($table, filename) {

                var $rows = $table.find('tr:has(td)'),

                    // Temporary delimiter characters unlikely to be typed by keyboard
                    // This is to avoid accidentally splitting the actual contents
                    tmpColDelim = String.fromCharCode(11), // vertical tab character
                    tmpRowDelim = String.fromCharCode(0), // null character

                    // actual delimiter characters for CSV format
                    colDelim = '","',
                    rowDelim = '"\r\n"',

                    // Grab text from table into CSV formatted string
                    csv = '"' + $rows.map(function (i, row) {
                        var $row = $(row),
                            $cols = $row.find('td');

                        return $cols.map(function (j, col) {
                            var $col = $(col),
                                text = $col.text();

                            return text.replace(/"/g, '""'); // escape double quotes

                        }).get().join(tmpColDelim);

                    }).get().join(tmpRowDelim)
                        .split(tmpRowDelim).join(rowDelim)
                        .split(tmpColDelim).join(colDelim) + '"',

                    // Data URI
                    csvData = 'data:application/csv;charset=utf-8,' + encodeURIComponent(csv);

                console.log(csvData);

                $(this)
                    .attr({
                    'download': filename,
                        'href': csvData,
                        'target': '_blank'
                });

                console.log($(this));
            }

            // This must be a hyperlink
            $(".export").on('click', function (event) {
                console.log('hola');
                // CSV
                exportTableToCSV.apply(this, [$('#dvData>table'), 'estadisticas.csv']);
                
                // IF CSV, don't do event.preventDefault() or return false
                // We actually need this to be a typical hyperlink
            });
        });
    </script>
@endsection