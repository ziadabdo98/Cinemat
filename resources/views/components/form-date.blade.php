<div class="form-group {{ $classes??'' }}">
    <label>{{ $label }}</label>
    <input name="{{ $name }}"
           type="date"
           class="form-control"
           value="{{ $value??'' }}"
           {{ $required??'' }}
           min="{{ $min??'' }}">
    @include('components.error-message',['field_name'=>$name])
</div>