<?php

namespace App\Http\Controllers\Kurban;

use App\Http\Controllers\Controller;
use App\Imports\BuyukbasImport;
use App\Imports\KucukbasImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DefaultController extends Controller
{
    //
    public function index()
    {
        return view('default.index');
    }
    public function datatable()
    {
        return view('default.datatable');
    }
    public function fileImportExport()
    {
        return view('default.file-import');
    }

    public function fileImport(Request $request)
    {
        Excel::import(new BuyukbasImport, $request->file('file')->store('temp'));

        return back();
    }
}
