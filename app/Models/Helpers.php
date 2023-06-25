<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Helpers extends Model
{

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
    public static function kesilmedurum($deger)
    {
        switch ($deger) {
            case 'KESİLMEDİ':
                $result = '0';
                break;
            case 'KESİLDİ':
                $result = '1';
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
    public static function videoislemr($deger)
    {
        switch ($deger) {
            case '0':
                $result = 'GÖNDERİLMEDİ';
                break;
            case '10':
                $result = 'KENDİSİNE GÖNDERİLDİ';
                break;
            case '11':
                $result = 'REFERANSA GÖNDERİLDİ';
                break;
            case '2':
                $result = 'WHATSAPP YOK';
                break;

            default:
                $result = $deger;
                break;
        }
        return $result;
    }
    public static function kesilmedurumr($deger)
    {
        switch ($deger) {
            case '0':
                $result = 'KESİLMEDİ';
                break;
            case '1':
                $result = 'KESİLDİ';
                break;

            default:
                $result = $deger;
                break;
        }
        return $result;
    }
    public static function aramaislemr($deger)
    {
        switch ($deger) {
            case '0':
                $result = 'ARANMADI';
                break;
            case '10':
                $result = 'ARANDI';
                break;
            case '11':
                $result = 'ULAŞILAMADI';
                break;
            case '12':
                $result = 'NUMARA YANLIŞ';
                break;
            case '13':
                $result = 'REFERANS ARANDI';
                break;
            default:
                $result = $deger;
                break;
        }
        return $result;
    }
    public static function vekaletdurumr($deger)
    {
        switch ($deger) {
            case '0':
                $result = 'GELECEK';
                break;
            case '1':
                $result = 'VEKALET';
                break;

            default:
                $result = $deger;
                break;
        }
        return $result;
    }
}
