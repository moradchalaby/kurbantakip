<?php

namespace App\Http\Controllers\Kurban;

use App\Models\Kucukbas;
use App\Models\Helpers;
use App\Models\Referans;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Datatables;


class KucukbasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {   //
        //
        $model = Kucukbas::select('*');
        if (request()->ajax()) {

            return datatables()->of($model)


                ->addColumn('vekalet_durum', function ($model) {

                    $result = Helpers::vekaletdurumr($model->vekalet_durum);
                    return $result;
                })

                ->addColumn('kesilme_durum', function ($model) {

                    $result = Helpers::kesilmedurumr($model->kesilme_durum);
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
        return view('kucukbas.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tamamlanan()
    {
        //
        $model = Kucukbas::having('kesilme_durum', '1')
            ->whereIn('video_islem', ['KENDİSİNE GÖNDERİLDİ', 'REFERANSA GÖNDERİLDİ', 'WHATSAPP YOK'])
            ->whereIn('arama_islem', ['REFERANS ARANDI', 'ARANDI']);
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


                /*
                ->editColumn('video_islem', function ($model) {

                    $result = Helpers::videoislemr($model->video_islem);

                    return $result;
                }) */
                ->addIndexColumn()





                ->make(true);
        }
        return view('kucukbas.tamamlanan');
    }
    public function video()
    {
        //
        $model = Kucukbas::having('vekalet_durum', '1')
            ->having('kesilme_durum', '1')
            ->whereNotIn('video_islem', ['KENDİSİNE GÖNDERİLDİ', 'REFERANSA GÖNDERİLDİ', 'WHATSAPP YOK']);
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
        return view('kucukbas.video');
    }
    public function arama()
    {
        //

        $model = Kucukbas::having('vekalet_durum', '1')
            ->having('kesilme_durum', '1')
            ->whereIn('video_islem', ['KENDİSİNE GÖNDERİLDİ', 'REFERANSA GÖNDERİLDİ', 'WHATSAPP YOK'])

            ->whereNotIn('arama_islem', ['REFERANS ARANDI', 'ARANDI']);

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
        return view('kucukbas.arama');
    }
    /**
     * Show the form for creating a new resource.
     *@return \Illuminate\Http\Response
     *
     */
    public function info()
    {
        $kesilen = Kucukbas::where('kesilme_durum', '1')->get();
        $hepsi = Kucukbas::select('*')->get();
        $yuzde = count($kesilen) * 100 / count($hepsi);
        $data = [$yuzde, count($kesilen)];
        return response()->json(
            $data
            // Create HasMany relation named "comments", see Eloquent Relationships
        );

        return view('kucukbas.info');
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
        return view('kucukbas.rapor', compact('data'));
    }
    public function detail($id)
    {
        $data['referans'] =
            Referans::where('id', $id)->first();
        $data['kucukbas'] = Kucukbas::all()->sortBy('sira_no')->where('referans', $id);
        return view('kucukbas.detail', compact('data'));
    }
    public function kesilmemis()
    {
        //
        $model = Kucukbas::where('kesilme_durum', '0');

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
        return view('kucukbas.kesilmemis');
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


        $company   =   Kucukbas::updateOrCreate(
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


        $company   =   Kucukbas::updateOrCreate(
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

        $company   =   Kucukbas::updateOrCreate(
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
            $company   =   Kucukbas::updateOrCreate(
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
            $company   =   Kucukbas::updateOrCreate(
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
        $company   =   Kucukbas::updateOrCreate(
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

        $company  = Kucukbas::where('id', $_POST['id'])->first();

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
        $update =  DB::table('kucukbas')
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
