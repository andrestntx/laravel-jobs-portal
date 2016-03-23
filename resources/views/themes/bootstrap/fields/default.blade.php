<div id="field_{{ $id }}"{!! Html::classes(['form-group', 'has-error' => $hasErrors]) !!}>
    <label for="{{ $id }}" class="control-label">
        {{ $label }}
        @if (!$required)<span>({{ Lang::get('optionnal') }})</span> @endif
    </label>

    @if ($required)
        <span class="label label-info">{{ Lang::get('required') }}</span>
    @endif

    <div class="controls">
        {!! $input !!}
        @foreach ($errors as $error)
            <p class="help-block">{{ $error }}</p>
        @endforeach
    </div>
</div>
