<div id="field_{{ $id }}"{!! Html::classes(['form-group', 'has-error' => $hasErrors]) !!}>

@if ($required)
<span class="label label-info">{{ Lang::get('required') }}</span>
@endif

<div class="mj_datepicker">
    {!! $input !!}
    @foreach ($errors as $error)
    <p class="help-block">{{ $error }}</p>
    @endforeach
</div>
</div>
