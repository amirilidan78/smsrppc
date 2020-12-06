<?php


namespace App\Casts;


use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

abstract class abstractProtectedPicture
{
    private function getImageExtension($value){
        return Arr::last(explode('.' ,$value)) ;
    }

    private function convertImageToBase64($data ,$extension){
        return "data:image/" . $extension . ";base64," . base64_encode($data);
    }

    private function imageExist($path)
    {
        return Storage::disk('local')->exists( $path ) ;
    }

    private function getImage($path)
    {
        return Storage::disk('local')->get( $path ) ;
    }

    protected function getBase64($value){
        if( $this->imageExist($value) ){
            $image = $this->getImage($value) ;
            $extension = $this->getImageExtension($value) ;
            return $this->convertImageToBase64($image ,$extension) ;
        }else{
            return 'not found' ;
        }
    }
}
