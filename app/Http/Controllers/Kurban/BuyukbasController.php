<?php

namespace App\Http\Controllers\Kurban;



use App\Models\Helpers;
use App\Http\Controllers\Controller;
use App\Models\Buyukbas;
use App\Models\Referans;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Datatables;


class BuyukbasController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {   //
        //
        $data['referans'] = Referans::all();
        $data['buyukbas'] = Buyukbas::all()->sortBy('sira_no');
        return view('buyukbas.index', compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tamamlanan()
    {
        //
        $data['referans'] = Referans::all();
        $data['buyukbas'] =
            Buyukbas::having('kesilme_durum', '1')
            ->whereIn('video_islem', ['KENDİSİNE GÖNDERİLDİ', 'REFERANSA GÖNDERİLDİ', 'WHATSAPP YOK'])
            ->whereIn('arama_islem', ['REFERANS ARANDI', 'ARANDI'])->get();
        return view('buyukbas.tamamlanan', compact('data'));
    }
    public function video()
    {
        //
        $model = Buyukbas::having('vekalet_durum', '1')
            ->having('kesilme_durum', '1')
            ->whereNotIn('video_islem', ['KENDİSİNE GÖNDERİLDİ', 'REFERANSA GÖNDERİLDİ', 'WHATSAPP YOK'])->orderBy('kesilme_no', 'desc')->orderBy('video_islem', 'asc');
        if (request()->ajax()) {



            return datatables()->of($model)

                /*  ->editColumn('arama_islem', function ($model) {

                    $result = Helpers::aramaislemr($model->arama_islem);

                    return $result;
                })*/
                ->addColumn('vekalet_durum', function ($model) {

                    $result = Helpers::vekaletdurumr($model->vekalet_durum);
                    return $result;
                })
                ->addColumn('referans', function ($model) {

                    //$model->refferans;
                    $result = DB::table('referans')->where('id', $model->referans)->first();
                    $msg = 'Referansı olduğunuz *' . $model->id . '* makbuz numaralı kurbanınız *' . $model->adi_soyadi . '* niyetiyle *' . $model->kesilme_no . '.* sırada kesilmiştir. _Cenâb-ı Hak hayrınızı kabul eylesin. Kurban bayramınız mübarek olsun._  *BİRGÖNÜL DERNEĞİ*';
                    $btn = $model->tel_no;
                    $url = urlencode($msg);
                    $btn =
                        '<button onclick="new_popup(' . $result->tel_no . ',\'' . $url . '\')" class="edit btn btn-success btn-sm"><i class="fab fa-whatsapp"></i></button>' . '  ' . $result->adi_soyadi . '  ' . '<a href="tel:+' . $result->tel_no . '" class="edit btn btn-primary btn-sm"><i class="fas fa-phone"></i></a>';

                    return $btn;
                })

                /*
                ->editColumn('video_islem', function ($model) {

                    $result = Helpers::videoislemr($model->video_islem);

                    return $result;
                }) */
                ->addColumn('tel_no', function ($row) {
                    $msg = 'Vekaletini vermiş olduğunuz *' . $row->id . '* makbuz numaralı kurbanınız *' . $row->adi_soyadi . '* niyetiyle *' . $row->kesilme_no . '.* sırada kesilmiştir. _Cenâb-ı Hak hayrınızı kabul eylesin. Kurban bayramınız mübarek olsun._  *BİRGÖNÜL DERNEĞİ*';

                    $btn = $row->tel_no;
                    $btn =
                        '<button onclick="new_popup(' . $row->tel_no . ',\'' . urlencode($msg) . '\')" class="edit btn btn-success btn-sm"><i class="fab fa-whatsapp"></i></button>' . '  ' . $btn . '  ' . '<a href="tel:+' . $btn . '" class="edit btn btn-primary btn-sm"><i class="fas fa-phone"></i></a>';


                    return $btn;
                })
                ->rawColumns(['tel_no', 'referans'])

                ->addIndexColumn()





                ->make(true);
        }
        return view('buyukbas.video');
    }
    public function arama()
    {
        //

        $model = Buyukbas::having('vekalet_durum', '1')
            ->having('kesilme_durum', '1')
            ->whereIn('video_islem', ['KENDİSİNE GÖNDERİLDİ', 'REFERANSA GÖNDERİLDİ', 'WHATSAPP YOK'])

            ->whereNotIn('arama_islem', ['REFERANS ARANDI', 'ARANDI'])->orderBy('kesilme_no', 'desc')->orderBy('arama_islem', 'asc');

        if (request()->ajax()) {



            return datatables()->of($model)

                /*  ->editColumn('arama_islem', function ($model) {

                    $result = Helpers::aramaislemr($model->arama_islem);

                    return $result;
                })*/
                ->addColumn('vekalet_durum', function ($model) {

                    $result = Helpers::vekaletdurumr($model->vekalet_durum);
                    return $result;
                })

                ->addColumn('referans', function ($model) {

                    //$model->refferans;
                    $result = DB::table('referans')->where('id', $model->referans)->first();
                    $msg = 'Referansı olduğunuz *' . $model->id . '* makbuz numaralı kurbanınız *' . $model->adi_soyadi . '* niyetiyle *' . $model->kesilme_no . '.* sırada kesilmiştir. _Cenâb-ı Hak hayrınızı kabul eylesin. Kurban bayramınız mübarek olsun._  *BİRGÖNÜL DERNEĞİ*';
                    $btn = $model->tel_no;
                    $url = urlencode($msg);
                    $btn =
                        '<button onclick="new_popup(' . $result->tel_no . ',\'' . $url . '\')" class="edit btn btn-success btn-sm"><i class="fab fa-whatsapp"></i></button>' . '  ' . $result->adi_soyadi . '  ' . '<a href="tel:+' . $result->tel_no . '" class="edit btn btn-primary btn-sm"><i class="fas fa-phone"></i></a>';

                    return $btn;
                })

                /*
                ->editColumn('video_islem', function ($model) {

                    $result = Helpers::videoislemr($model->video_islem);

                    return $result;
                }) */
                ->addColumn('tel_no', function ($row) {
                    $msg = 'Vekaletini vermiş olduğunuz *' . $row->id . '* makbuz numaralı kurbanınız *' . $row->adi_soyadi . '* niyetiyle *' . $row->kesilme_no . '.* sırada kesilmiştir. _Cenâb-ı Hak hayrınızı kabul eylesin. Kurban bayramınız mübarek olsun._  *BİRGÖNÜL DERNEĞİ*';

                    $btn = $row->tel_no;
                    $btn =
                        '<button onclick="new_popup(' . $row->tel_no . ',\'' . urlencode($msg) . '\')" class="edit btn btn-success btn-sm"><i class="fab fa-whatsapp"></i></button>' . '  ' . $btn . '  ' . '<a href="tel:+' . $btn . '" class="edit btn btn-primary btn-sm"><i class="fas fa-phone"></i></a>';


                    return $btn;
                })
                ->rawColumns(['tel_no', 'referans'])


                /*
                ->editColumn('video_islem', function ($model) {

                    $result = Helpers::videoislemr($model->video_islem);

                    return $result;
                }) */
                ->addIndexColumn()





                ->make(true);
        }
        return view('buyukbas.arama');
    }
    /**
     * Show the form for creating a new resource.
     *@return \Illuminate\Http\Response
     *
     */
    public function info()
    {
        $kesilen = Buyukbas::where('kesilme_durum', '1')->get();
        $cekaranan
            = Buyukbas::having('kesilme_durum', '1')->having('vekalet_durum', '1')->whereIn('arama_islem', ['REFERANS ARANDI', 'ARANDI'])->get();
        $cekkalan
            = Buyukbas::having('kesilme_durum', '0')->get();
        $cekgonderilen
            = Buyukbas::having('kesilme_durum', '1')->having('vekalet_durum', '1')->whereIn('video_islem', ['KENDİSİNE GÖNDERİLDİ', 'REFERANSA GÖNDERİLDİ'])->get();
        $hepsi = Buyukbas::select('*')->get();
        $yuzde = count($kesilen) * 100 / count($hepsi);
        $aranan = count($cekaranan);
        $gonderilen = count($cekgonderilen);
        $kalan = count($cekkalan);
        $data = [$yuzde, count($kesilen)];
        return response()->json(
            [
                'kesilen' => $yuzde,
                'aranan' => $aranan,
                'gonderilen' => $gonderilen,
                'kalan' => $kalan
            ]

            // Create HasMany relation named "comments", see Eloquent Relationships
        );

        return view('buyukbas.info');
    }
    /**
     * Show the form for creating a new resource.
     *@return \Illuminate\Http\Response
     *
     */
    public function rapor()
    {
        $data['referans'] =
            Referans::all()->sortBy('adi_soyadi');
        return view('buyukbas.rapor', compact('data'));
    }
    public function detail($id)
    {
        $data['referans'] =
            Referans::where('id', $id)->first();
        $data['buyukbas'] = Buyukbas::having('kesilme_durum', '1')->having('vekalet_durum', '1')->having('referans', $id)->get();
        return view('buyukbas.detail', compact('data'));
    }
    public function kesilmemis()
    {
        //
        $model = Buyukbas::where('kesilme_durum', '0');

        if (request()->ajax()) {



            return datatables()->of($model)

                /*  ->editColumn('arama_islem', function ($model) {

                    $result = Helpers::aramaislemr($model->arama_islem);

                    return $result;
                })*/
                ->addColumn('vekalet_durum', function ($model) {

                    $result = Helpers::vekaletdurumr($model->vekalet_durum);
                    return $result;
                })
                ->addColumn('referans', function ($model) {

                    //$model->refferans;
                    $result = DB::table('referans')->where('id', $model->referans)->first();
                    $msg = 'Referansı olduğunuz *' . $model->id . '* makbuz numaralı kurbanınız *' . $model->adi_soyadi . '* niyetiyle *' . $model->kesilme_no . '.* sırada kesilmiştir. _Cenâb-ı Hak hayrınızı kabul eylesin. Kurban bayramınız mübarek olsun._  *BİRGÖNÜL DERNEĞİ*';
                    $btn = $model->tel_no;
                    $url = urlencode($msg);
                    $btn =
                        '<button onclick="new_popup(' . $result->tel_no . ',\'' . $url . '\')" class="edit btn btn-success btn-sm"><i class="fab fa-whatsapp"></i></button>' . '  ' . $result->adi_soyadi . '  ' . '<a href="tel:+' . $result->tel_no . '" class="edit btn btn-primary btn-sm"><i class="fas fa-phone"></i></a>';

                    return $btn;
                })

                /*
                ->editColumn('video_islem', function ($model) {

                    $result = Helpers::videoislemr($model->video_islem);

                    return $result;
                }) */
                ->addColumn('tel_no', function ($row) {
                    $msg = 'Vekaletini vermiş olduğunuz *' . $row->id . '* makbuz numaralı kurbanınız *' . $row->adi_soyadi . '* niyetiyle *' . $row->kesilme_no . '.* sırada kesilmiştir. _Cenâb-ı Hak hayrınızı kabul eylesin. Kurban bayramınız mübarek olsun._  *BİRGÖNÜL DERNEĞİ*';

                    $btn = $row->tel_no;
                    $btn =
                        '<button onclick="new_popup(' . $row->tel_no . ',\'' . urlencode($msg) . '\')" class="edit btn btn-success btn-sm"><i class="fab fa-whatsapp"></i></button>' . '  ' . $btn . '  ' . '<a href="tel:+' . $btn . '" class="edit btn btn-primary btn-sm"><i class="fas fa-phone"></i></a>';


                    return $btn;
                })
                ->rawColumns(['tel_no', 'referans'])

                /*
                ->editColumn('video_islem', function ($model) {

                    $result = Helpers::videoislemr($model->video_islem);

                    return $result;
                }) */
                ->addIndexColumn()





                ->make(true);
        }
        return view('buyukbas.kesilmemis');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    //? UPDATE ISLEMLERI
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function kesilmedrm(Request $request)
    {
        //


        $company   =   Buyukbas::updateOrCreate(
            [
                'id' => $_POST['id']
            ],
            [

                'kesilme_no' => $_POST['kesilme_no'],

                'kesilme_durum' => 1,

                //'islem_log' => $_POST['islem_log'],

            ]
        );

        return Response()->json($company);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function videodrm(Request $request)
    {
        //


        $company   =   Buyukbas::updateOrCreate(
            [
                'id' => $_POST['id']
            ],
            [


                'video_islem' => $_POST['video_islem'],

                //'islem_log' => $_POST['islem_log'],

            ]
        );

        return Response()->json($company);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function aramadrm(Request $request)
    {
        //

        $company   =   Buyukbas::updateOrCreate(
            [
                'id' => $_POST['id']
            ],
            [


                'arama_islem' => $_POST['arama_islem'],
                'video_islem' => $_POST['video_islem'],
                //'islem_log' => $_POST['islem_log'],

            ]
        );

        return Response()->json($company);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function vekaletdrm(Request $request)
    {
        //
        $drm = 0;
        if ($_POST['kesilme_no'] == 0) {
            $drm = '0';
        } else {
            $drm = '1';
        }
        $vekalet_durum = Helpers::vekaletdurum($_POST['vekalet_durum']);
        if ($vekalet_durum == 0 && $drm == 1) {
            $company   =   Buyukbas::updateOrCreate(
                [
                    'id' => $_POST['id']
                ],
                [
                    'kesilme_no' => $_POST['kesilme_no'],

                    'kesilme_durum' => $drm,

                    'vekalet_durum' => $vekalet_durum,
                    'arama_islem' => 'ARANDI',
                    'video_islem' => 'KENDİSİNE GÖNDERİLDİ',

                    //'islem_log' => $_POST['islem_log'],

                ]
            );
        } else {
            $company   =   Buyukbas::updateOrCreate(
                [
                    'id' => $_POST['id']
                ],
                [
                    'kesilme_no' => $_POST['kesilme_no'],

                    'kesilme_durum' => $drm,

                    'vekalet_durum' => $vekalet_durum,

                    //'islem_log' => $_POST['islem_log'],

                ]
            );
        }


        return Response()->json($company);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $video_islem = Helpers::videoislem($_POST['video_islem']);
        $arama_islem = Helpers::aramaislem($_POST['arama_islem']);
        $vekalet_durum = Helpers::vekaletdurum($_POST['vekalet_durum']);
        $company   =   Buyukbas::updateOrCreate(
            [
                'id' => $_POST['id']
            ],
            [

                'kesilme_no' => $_POST['kesilme_no'],
                'kesilme_durum' => $_POST['kesilme_durum'],
                'vekalet_durum' => $vekalet_durum,
                'arama_islem' => $_POST['arama_islem'],
                'video_islem' => $_POST['video_islem'],
                //'islem_log' => $_POST['islem_log'],

            ]
        );

        return Response()->json($company);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //

        $company  = Buyukbas::where('id', $_POST['id'])->first();

        return Response()->json($company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        //
        $update =  DB::table('buyukbas')
            ->where('id', $_POST['id'])
            ->update([
                'kesilme_no' => $_POST['kesimno'],
                'tel_no' => $_POST['tel'],
                'video_islem' => $_POST['video'],
                'arama_islem' => $_POST['arama']

            ]);
        if ($update) {
            echo true;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
