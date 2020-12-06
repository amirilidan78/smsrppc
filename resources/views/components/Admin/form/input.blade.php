<div class="row justify-content-start text-right mt-4">
    <div class="{{ $colLgLabel ?? 'col-lg-3' }} col-md-4 col-4 pt-1">
        <label for="{{ $id }}">{{ $name }} {{ $preVal ?? null ? '(' . $preVal. ')' : '' }}</label>
    </div>
    <div class="{{ $colLgInput ?? 'col-lg-6' }} col-md-8 col-8">
        <input type="{{ $type ?? 'text' }}" id="{{ $id }}" name="{{ $id }}" class="form-control @error("$id") is-invalid @enderror " placeholder="{{ $place ?? " لطفا $name خود را وارد کنید " }}" value="{{ $value ??  old("$id") }}">
        <x-errors.inputError  :errorType="$id"/>
    </div>
</div>
