<div class="mj_search_option">
	{!! Form::open(['url' => 'search/jobs', 'method' => 'GET']) !!}
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-addon"><i class="fa fa-search"></i>
				</div>
				<input type="text" class="form-control" placeholder="Escriba su busqueda aquí y oprima ENTER">
			</div>
		</div>
	{!! Form::close() !!}
</div>