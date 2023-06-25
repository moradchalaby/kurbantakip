<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Kucukbas extends Model
{
    //
    public $timestamps = false;
    protected $fillable = ['id', 'sira_no', 'kesilme_no', 'gun', 'hisse_no', 'saat', 'adi_soyadi', 'tel_no', 'referans', 'vekalet_durum', 'kayit_log', 'kesilme_durum', 'arama_islem', 'video_islem', 'islem_log'];

    public static function videoislem($deger)
    {

        switch ($deger) {
            case 'GÖNDERİLMEDİ':
                $result = '0';
                break;
            case 'KENDİSİNE GÖNDERİLDİ':
                $result = '10';
                break;
            case 'REFERANSA GÖNDERİLDİ':
                $result = '11';
                break;
            case 'WHATSAPP YOK':
                $result = '2';
                break;

            default:
                $result = $deger;
                break;
        }
        return $result;
    }
    public static function aramaislem($deger)
    {

        switch ($deger) {
            case 'ARANMADI':
                $result = '0';
                break;
            case 'ARANDI':
                $result = '10';
                break;
            case 'ULAŞILAMADI':
                $result = '11';
                break;
            case 'NUMARA YANLIŞ':
                $result = '12';
                break;
            case 'REFERANS ARANDI':
                $result = '13';
                break;
            default:
                $result = $deger;
                break;
        }
        return $result;
    }
    public static function vekaletdurum($deger)
    {

        switch ($deger) {
            case 'GELECEK':
                $result = '0';
                break;
            case 'VEKALET':
                $result = '1';
                break;

            default:
                $result = $deger;
                break;
        }
        return $result;
    }
}
