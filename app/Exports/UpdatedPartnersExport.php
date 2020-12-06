<?php

namespace App\Exports;

use Illuminate\Support\Arr;
use Maatwebsite\Excel\Concerns\FromArray;

class UpdatedPartnersExport implements FromArray
{
    protected $partners = [];

    public function __construct(array $partners)
    {
        array_push($this->partners ,['id' ,'name' ,'last_name' ,'father_name' ,'phone' ,'code_melli' ,'certificate_id' ,'gender' ,'birth_place' ,'birth_date' ,'date_place' ,'date_date' ,'dead_description' ,'address' ,'post_code' ,'shaba' ,'national_card_picture' ,'men_card_service_picture' ,'probate_picture' ,'certificate_id_picture' ,'action' ,'action_at' ,'smsText' ,'created_at' ,'updated_at']) ;

        foreach ( $partners as $partner)
            array_push($this->partners ,$partner);
    }

    public function array(): array
    {
        return $this->partners;
    }
}
