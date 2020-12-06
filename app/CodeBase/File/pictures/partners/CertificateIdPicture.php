<?php


namespace App\CodeBase\File\pictures\partners;


use App\CodeBase\File\pictures\abstractPicture;

class CertificateIdPicture extends abstractPicture
{
    protected $id ;

    public function __construct( $file ,$id )
    {
        $this->file = $file ;
        $this->id = $id ;
    }

    public function getName()
    {
        return 'national_card' ;
    }

    public function getPath()
    {
        return "/partners/{$this->id}" ;
    }
}
