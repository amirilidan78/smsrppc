<div class="row justify-content-center mt-4">
    <div class="col-lg-2 col-md-3 col-4 pt-1">
        <label for="{{ $id }}">{{ $name }}</label>
    </div>
    <div class="col-lg-6 col-md-7 col-8">
        <input type="{{ $type ?? 'text' }}" id="{{ $id }}" name="{{ $id }}" class="form-control @error("$id") is-invalid @enderror " placeholder="{{ $place ?? " لطفا $name خود را وارد کنید " }}" value="{{ $value ??  old("$id") }}">
        <x-errors.inputError  :errorType="$id"/>
    </div>
</div>
