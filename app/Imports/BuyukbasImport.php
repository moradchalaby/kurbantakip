<?php

namespace App\Imports;

use App\Models\Buyukbas;
use App\Models\Kucukbas;
use App\Models\Referans;
use Maatwebsite\Excel\Concerns\ToModel;

class BuyukbasImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        $referans=Referans::where('adi_soyadi',$row[10])->first();
        if($referans==null){
            $referans= Referans::create([
                'adi_soyadi'=>$row[10]
            ]);
        }
        $veka='0';
        if($row[11]=='Vekalet'){
            $veka='1';
        }elseif($row[11]=='Gelecek'){
            $veka='0';
        }
        if($row[7]=='Büyük Baş'){
            return  Buyukbas::updateOrCreate(
                [
                    'id'=>$row[1]
                ],
                [
                    //
                    'referans'=>$referans->id,
                    'sira_no'=>$row[2],
                    'hisse_no'=>$row[5],
                    'adi_soyadi'=>$row[8],
                    'tel_no'=>$row[9],
                    'vekalet_durum'=>$veka,

                ]);
        }elseif($row[7]=='Küçük Baş'){
            return  Kucukbas::updateOrCreate(
                [
                    'id'=>$row[1]
                ],
                [
                    //
                    'referans'=>$referans->id,
                    'sira_no'=>$row[2],
                    'hisse_no'=>$row[5],
                    'adi_soyadi'=>$row[8],
                    'tel_no'=>$row[9],
                    'vekalet_durum'=>$veka,


                ]);
        }

    }
}
