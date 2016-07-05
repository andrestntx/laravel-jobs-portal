@extends('layouts.admin')

@section('breadcrumbs')
	{!! Breadcrumbs::render('registers') !!}
@endsection

@section('title')
	<span>Registros</span>
@endsection

@section('article')
	<div class="mj_postdiv mj_postpage mj_shadow_blue mj_toppadder20">
		<table class="table table-striped">
			<thead>
			<tr>
				<th colspan="" rowspan="" headers="" scope="" class="text-center">Activar</th>
				<th colspan="1" rowspan="" headers="" scope="">Tipo</th>
				<th colspan="1" rowspan="" headers="" scope="">Nombre</th>
				<th colspan="3" rowspan="" headers="" scope="">Email</th>
			</tr>
			</thead>
			@foreach($registers as $register)
				<tr id="admin_{{ $register->id }}">
					<td>
						<div class="mj_checkbox" style="float: none; margin: auto;">
                            <input type="checkbox" value="1" data-register="{{ $register->id }}" onchange="changeActivated({{ $register->id }})"
                            id="register-{{ $register->id }}" @if($register->activated_at) checked @endif>
                            <label for="register-{{ $register->id }}" style="border: 1px solid gray;"></label>
                        </div>
					</td>
					<td>
						{{ $register->role_name }}
					</td>
					<td>
						{{ $register->name }}
					</td>
					<td>
						{{ $register->email }}
					</td>
				</tr>
			@endforeach
		</table>
		{{ $registers->links() }}
	</div>
@endsection

@section('extra-js')
	<script src="/js/services/deleteService.js"></script>
	<script type="text/javascript">
		function changeActivated(register_id) {

            if (confirm('¿Está seguro?')) {
                $.ajax({
                    url: '/admin/registers/' + register_id + '/active',
                    dataType: 'json',
                    method: 'POST',
                    success: function (data) {
                        if (data['success']) {
                        }
                        else {
                        }
                    },
                    error: function () {
                        alert('fallo la conexión');
                    }
                });
            }
        }
	</script>
@endsection