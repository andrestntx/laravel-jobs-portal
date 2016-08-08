@extends('layouts.admin')

@section('breadcrumbs')
	{!! Breadcrumbs::render('assists.show', $jobseeker) !!}
@endsection

@section('title')
	<span style="font-size: 40px;">Asistencias ({{ $activities->count() }}) - {{ $jobseeker->full_name }}</span>
@endsection

@section('article')
	<div class="mj_postdiv mj_postpage mj_shadow_blue mj_toppadder20" style="padding: 25px 20px 0 20px">
		<div class="col-md-12" style="margin-bottom: 20px;">
			<button class="btn btn-info" id="new-activity">Nueva actividad</button>	
		</div>
		<table class="table table-striped">
			<thead>
			<tr>
				<th>Actividad</th>
				<th class="text-center">Fecha</th>
				<th class="text-center">Editar</th>
				<th class="text-center">Borrar</th>
			</tr>
			</thead>

			@foreach($activities as $activity)
				<tr>
					<td>
						{{ $activity->name }} 
					</td>
					<td class="text-center">
						{{ $activity->pivot->assist_at }}
					</td>
					<td class="text-center">
						<button href="" title="Editar" class="btn btn-warning edit-activity" data-url="{{ route('admin.assists.update', [$jobseeker, $activity]) }}" data-activity="{{ $activity->id }}" data-assist="{{ $activity->pivot->assist_at }}"><i class="fa fa-pencil"></i> Editar</button>
					</td>
					<td class="text-center">
						<button title="Borrar" class="btn btn-danger delete-activity" data-url="{{ route('admin.assists.delete', [$jobseeker, $activity]) }}"> Borrar</button>
					</td>
				</tr>
			@endforeach

		</table>
	</div>

	<div class="modal fade mj_popupdesign" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h4 class="modal-title" id="myModalLabel1"> Nueva actividad</h4>
	            </div>
	            <div class="modal-body">
	                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 col-lg-offset-1 col-md-offset-1">
	                    <div class="row">
	                        <div class="mj_pricingtable mj_bluetable mj_freelancer_form_wrapper">
	                            {!! Form::open(['id' => 'form-jobseeker', 'route' => ['admin.assists.store', $jobseeker], 'method' => 'POST']) !!}
	                                <div class="mj_freelancer_form">
	                                	<div class="col-md-12">
	                                		<div class="form-group">
	                                    		{!! Form::select('activity_id', $activitiesSelect, null, ['required', 'class' => 'form-control', 'id' => 'activity_id']) !!}
	                                    	</div>
	                                    </div>
	                                    <div class="col-md-12">
	                                    	<div class="form-group">
	                                    		{!! Form::text('assist_at', null, ['required', 'class' => 'form-control datepicker', 'placeholder' => 'Fecha de la actividad', 'id' => 'assist_at']) !!}
	                                    	</div>
	                                    </div>
	                                </div>
	                                <div class="mj_pricing_footer">
	                                    <button type="submit" name="register-jobseeker">Crear actividad</button>
	                                </div>
	                            {!! Form::close() !!}
	                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img src="/images/close.png" alt="">
	                            </button>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
@endsection

@section('extra-js')
	<script type="text/javascript">
		$("#new-activity").click(function(){
			$("#form-jobseeker").attr('method', 'POST');
			$("#myModal1").modal();
		});

		$(".edit-activity").click(function() {
			$("#form-jobseeker").attr('method', 'POST');
			$("#form-jobseeker").attr('action', $(this).data('url'));
			$("#activity_id").val($(this).data('activity'));
			$("#assist_at").val($(this).data('assist'));

			console.log($(this).data('activity'));
			console.log($(this).data('assist'));

			$("#myModal1").modal();
		});

		$(".delete-activity").click(function() {
			var url = $(this).data('url');
			swal({
                title: '¿Está seguro?',
                text: 'La actividad será borrada',
                type: "warning",
                confirmButtonText: "Confirmar",
                confirmButtonColor: "#FFAC1A",
                cancelButtonText: "Cancelar",
                showCancelButton: true,
                closeOnConfirm: false,
                html: true
            },
            function() {
                $.post(url, function(data, status){
					location.reload();
				});
            });
			
		});
	</script>
	
@endsection