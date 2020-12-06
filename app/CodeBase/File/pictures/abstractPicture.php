<?php


namespace App\CodeBase\File\pictures;


abstract class abstractPicture
{
    protected $file ;

    public function __construct( $file )
    {
        $this->file = $file ;
    }

    public function getExtension()
    {
        return $this->file->extension() ;
    }

    public function getFile()
    {
        return $this->file ;
    }

    public function getCompleteName()
    {
        return $this->getName() . '.' . $this->getExtension() ;
    }

    public function getStoredAddress()
    {
        return $this->getPath() . '/' . $this->getCompleteName()  ;
    }

    abstract public function getName() ;
    abstract public function getPath() ;

}
