<?php


namespace App\CodeBase\File;

use App\CodeBase\File\pictures\abstractPicture;
use App\CodeBase\File\pictures\partners\CertificateIdPicture;
use App\CodeBase\File\pictures\partners\MenServiceCardPicture;
use App\CodeBase\File\pictures\partners\NationalCardPicture;
use App\CodeBase\File\pictures\partners\ProbatePicture;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Storage;

class PictureFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PictureFacade';
    }

    public static function storePicture(abstractPicture $picture)
    {
        $file = $picture->getFile();
        $file->storeAs( $picture->getPath() ,$picture->getCompleteName() );
        return $picture ;
    }

    public static function storeResetPictures($data ,$reset)
    {
        return [ 'cart_melli_picture' => PictureFacade::storePicture(new \App\CodeBase\File\pictures\reset\nationalCardPicture($data['cart_melli_picture'] ,$reset['id']))->getStoredAddress() ];
    }

    public static function storePartnerPictures($data)
    {

        if ( @$data['national_card_picture'] ) //cart melli
            $addressNationalCard = PictureFacade::storePicture(new NationalCardPicture($data['national_card_picture'] ,$data['partner_id']))->getStoredAddress() ;
        else
            $addressNationalCard = null ;

        if ( @$data['certificate_id_picture'] ) //shenasname
            $addressCertificateId = PictureFacade::storePicture(new CertificateIdPicture($data['certificate_id_picture'] ,$data['partner_id']))->getStoredAddress() ;
        else
            $addressCertificateId = null ;

        if ( @$data['men_card_service_picture'] )//payan khedmat
            $addressMenServiceCard = PictureFacade::storePicture(new MenServiceCardPicture($data['men_card_service_picture'] ,$data['partner_id']))->getStoredAddress() ;
        else
            $addressMenServiceCard = null ;

        if ( @$data['probate_picture'] )// enhesar verasat
            $addressProbate = PictureFacade::storePicture(new ProbatePicture($data['probate_picture'] ,$data['partner_id']))->getStoredAddress() ;
        else
            $addressProbate = null ;

        Arr::forget($data ,['national_card_picture' ,'certificate_id_picture' ,'men_card_service_picture' ,'probate_picture']);

        if ( $addressNationalCard )
            $data = Arr::add($data ,'national_card_picture',$addressNationalCard) ;

        if ( $addressCertificateId )
            $data = Arr::add($data ,'certificate_id_picture',$addressCertificateId) ;

        if ( $addressMenServiceCard )
            $data = Arr::add($data ,'men_card_service_picture',$addressMenServiceCard) ;

        if ( $addressProbate )
            $data = Arr::add($data ,'probate_picture',$addressProbate) ;

        return $data ;
    }

    public static function deleteFileDirectory($filePath)
    {
        $res = false ;

        if( $filePath )
        {
            //get file directory path
            $array = array_filter(explode('/', $filePath));
            Arr::pull($array,count($array));
            $dirPath = "" ;
            foreach ($array as $item)
                $dirPath .= "/$item" ;

            if ( Storage::disk('local')->exists($dirPath) )
                $res =  Storage::disk('local')->deleteDirectory($dirPath) ;
        }

        return $res ;
    }

}
