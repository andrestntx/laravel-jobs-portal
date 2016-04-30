<div id="field_{{ $id }}"{!! Html::classes(['form-group', 'has-error' => $hasErrors]) !!}>
    <label for="{{ $id }}" class="control-label">
        {{ $label }}
        @if (!$required)<span>({{ Lang::get('messages.optional') }})</span> @endif
    </label>

    @if ($required)
        <span class="label label-warning"><i class="fa fa-cog"></i> {{ Lang::get('messages.required') }}</span>
    @endif

    <div class="controls">
        {!! $input !!}
        @foreach ($errors as $error)
            <p class="help-block">{{ $error }}</p>
        @endforeach
    </div>
</div>
