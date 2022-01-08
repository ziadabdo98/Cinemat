<div class="form-group {{ $classes??'' }}">
    <label>{{ $label }}</label>
    <input type="{{ $type }}"
           name="{{ $name }}"
           class="form-control"
           value="{{ $value??'' }}"
           {{ $required??'' }}
           {{ $extra_attr??'' }}>
    @include('components.error-message',['field_name'=>$name])
</div>