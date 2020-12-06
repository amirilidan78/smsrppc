<div class="row justify-content-center mt-4">
    <div class="col-lg-2 col-md-3 col-4 pt-1">
        <label for="{{ $id }}">{{ $name }}</label>
    </div>
    <div class="col-lg-6 col-md-7 col-8">
        <select class="form-control @error("$id") is-invalid @enderror" id="{{ $id }}" name="{{ $id }}">
            @foreach( $list as $item )
                <option {{ old("$id") == $item ? 'selected' : '' }} value="{{ $item }}">{{ $item }}</option>
            @endforeach
        </select>
        <x-errors.inputError  errorType="{{ $id }}"/>
    </div>
</div>
