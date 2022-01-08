<div class="form-group {{ $classes??'' }}">
    <label>{{ $label }}</label>
    <input name="{{ $name }}"
           type="time"
           class="form-control"
           value="{{ $value??'' }}"
           {{ $required??'' }}>
    @include('components.error-message',['field_name'=>$name])
</div>