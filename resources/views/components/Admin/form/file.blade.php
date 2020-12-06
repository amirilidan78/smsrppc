<div class="row justify-content-center mt-4">
    <div class="col-lg-2 col-md-3 col-4 pt-1">
        <label for="{{ $id }}">{{ $name }}</label>
    </div>
    <div class="col-lg-6 col-md-7 col-8">
        <div class="form-file">
            <input type="file" class="form-file-input" name="{{ $id }}" id="{{ $id }}" accept="image/png, image/jpeg, image/jpg"/>
            <label class="form-file-label" for="{{ $id }}">
                <span class="form-file-text" id="{{ $id }}-name">هیچ عکسی انتخاب نشده است</span>
                <span class="form-file-button">بارگذاری</span>
            </label>
        </div>
        <x-errors.inputError  :errorType="$id"/>
    </div>
</div>

<script>
    const myInput{{ $id }} = document.getElementById("{{ $id }}") ;
    const myInput{{ $id }}Name = document.getElementById("{{ $id }}-name") ;
    myInput{{ $id }}.addEventListener('change', (e) => {

        var filesize = ((myInput{{ $id }}.files[0].size/1024/1024)).toFixed(4); // MB

        if( filesize > 2 ){
            Swal.fire({
                title: 'حجم  {{ $name }} بیشتر از 2 مگابایت است',
                icon: 'error',
                timer: 5000,
                timerProgressBar: true,
                toast: true,
                position: "top-end",
                showConfirmButton: false,
            });

            myInput{{ $id }}.value = null ;
            myInput{{ $id }}Name.innerHTML = "هیچ عکسی انتخاب نشده است" ;
        }else{

            Swal.fire({
                title: " {{ $name }} با موفقیت بارگذاری شد",
                icon: 'success',
                timer: 5000,
                timerProgressBar: true,
                toast: true,
                position: "top-end",
                showConfirmButton: false,
            });

            myInput{{ $id }}Name.innerHTML = myInput{{ $id }}.files[0].name ;
        }
    });
</script>
