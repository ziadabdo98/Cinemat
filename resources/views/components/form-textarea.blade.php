<div class="form-group {{ $classes??'' }}">
    <label>{{ $label }}</label>
    <textarea rows="5"
              name="{{ $name }}"
              class="form-control"
              {{ $required??'' }}
              {{ $extra_attr??'' }}>{{ $value??'' }}</textarea>
    @include('components.error-message',['field_name'=>$name])
</div>