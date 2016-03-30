@foreach($checkboxes as $checkbox)
    <div class="form-group">
        <div class="mj_checkbox">
            {!! Form::checkbox(
                $checkbox['name'],
                $checkbox['value'],
                $checkbox['checked'],
                ['id' => $checkbox['id']]
            ) !!}
            <label for="{{ $checkbox['id'] }}"></label>
        </div>
        <span> {{ $checkbox['label'] }} </span>
    </div>
@endforeach