<div class="form-group {{ $classes??'' }}">
    <label>{!! $label !!}</label>
    <select name="{{ $name }}"
            class="form-control"
            {{ $required??'' }}>
        @foreach ($options as $key=>$value)
        @if (isset($selected) && $selected == $key)
        <option value="{{ $key }}"
                selected>{{ $value }}</option>
        @else
        <option value="{{ $key }}">{{ $value }}</option>
        @endif
        @endforeach
    </select>
    @include('components.error-message',['field_name'=>$name])
</div>