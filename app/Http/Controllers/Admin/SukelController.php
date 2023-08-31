<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sukel;

class SukelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('admin.sukel.tes');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.sukel.create');
    }
    public function surat(Sukel $sukel){
        return view ('admin.sukel.embed', [
            'sukel'=> $sukel,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fsukel' => 'required|mimes:pdf,xlx,csv|max:2048',
            'pengirim' => 'required',
            'no' => 'required',
            'ringkasan' => 'required',
            'tujuan' => 'required',
            'ket' => 'required',

        ]);
        $nm = $request->fsukel;
        $namafile = $nm->getClientOriginalName();
            $dtupload = new Sukel;
        
            
            $dtupload->pengirim = $request->pengirim; 
            $dtupload->no = $request->no;
            $dtupload->ringkasan = $request->ringkasan;
            $dtupload->tujuan = $request->tujuan; 
            $dtupload->ket= $request->ket;
            $dtupload->fsukel = $namafile;

            $nm->move(public_path().'/surat/sukel', $namafile);
            $dtupload->save();
            
        
        return redirect()->route('admin.tes2');
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
    public function edit(Sukel $sukel)
    {
        return view('admin.sukel.edit', [
            'sukel'=>$sukel,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sukel $sukel)
    {
        $nm = $request->fsukel;
        $namafile = $nm->getClientOriginalName();
            $dtupload = new Sukel;
        
            
            $dtupload->pengirim = $request->pengirim; 
            $dtupload->no = $request->no;
            $dtupload->ringkasan = $request->ringkasan;
            $dtupload->tujuan = $request->tujuan; 
            $dtupload->ket= $request->ket;
            $dtupload->fsukel = $namafile;
          
            $nm->move(public_path().'/surat/sukel', $namafile);
            $dtupload->update();
            
        
        return redirect()->route('admin.tes2');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sukel $sukel)
    {
        $sukel->delete();

        return redirect()->route('admin.tes2')
                    ->with('danger', 'Data surat berhasil dihapus');
    }

    public function showdata(){
        
        return datatables()->of(Sukel::query())
        ->editColumn('created_at', function ($request) {
            return $request->created_at->format('d-m-y'); // human readable format
          })
          ->addColumn('aksi', 'admin.sukel.action')
          ->addIndexColumn()
          ->addColumn('surat', 'admin.sukel.surat')
          ->addIndexColumn()
          ->rawColumns(['aksi','surat'])
          ->toJson();
        

        
    }

    public function halsuma(Request $req){
        $method = $req->method();

        if ($req->isMethod('post'))
        {
            $from = $req->input('from');
            $to   = $req->input('to');
            if ($req->has('search'))
            {
                // select search
                $search = DB::select("SELECT * FROM sukels WHERE created_at BETWEEN '$from' AND '$to'");
                return view('admin.cetak.sukel',['ViewsPage' => $search]);
            } 
            elseif ($req->has('exportPDF'))
            {
                // select PDF
                $PDFReport = DB::select("SELECT * FROM sukels WHERE created_at BETWEEN '$from' AND '$to'");
                // $pdf = PDF::loadView('PDF_report', ['PDFReport' => $PDFReport])->setPaper('a4', 'potrait');
                // return $pdf->download('Laporan masuk.pdf');
                return view('admin.cetak.reportsukel', ['PDFReport' => $PDFReport]);
            }  
        }
            else
        {
            //select all
            $ViewsPage = DB::select('SELECT * FROM sukels');
            return view('admin.cetak.sukel',['ViewsPage' => $ViewsPage]);
        }
    }
}
