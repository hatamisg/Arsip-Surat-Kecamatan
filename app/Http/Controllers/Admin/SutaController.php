<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Suta;


class SutaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('admin.suta.tes');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.suta.create');
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
            'fsuta' => 'required|mimes:pdf,xlx,csv|max:2048',
            'pertama' => 'required',
            'kedua' => 'required',
            'status' => 'required',
            'harga' => 'required',
            'luas' => 'required',
            'batas' => 'required',
            'kel' => 'required',

        ]);
        $nm = $request->fsuta;
        $namafile = $nm->getClientOriginalName();
            $dtupload = new Suta;
        
            
            $dtupload->pertama = $request->pertama; 
            $dtupload->kedua = $request->kedua;
            $dtupload->status = $request->status;
            $dtupload->harga = $request->harga; 
            $dtupload->luas= $request->luas;
            $dtupload->batas= $request->batas;
            $dtupload->kel= $request->kel;
            $dtupload->fsuta = $namafile;

            $nm->move(public_path().'/surat/suta', $namafile);
            $dtupload->save();
            
        
        return redirect()->route('admin.tes3');
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
    public function edit(Suta $suta)
    {
        return view('admin.suta.edit', [
            'suta'=>$suta,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suta $suta)
    {
        $nm = $request->fsuta;
        $namafile = $nm->getClientOriginalName();
            $dtupload = new Suta;
        
            
            $dtupload->pengirim = $request->pengirim; 
            $dtupload->no = $request->no;
            $dtupload->ringkasan = $request->ringkasan;
            $dtupload->tujuan = $request->tujuan; 
            $dtupload->ket= $request->ket;
            $dtupload->fsuta = $namafile;          
            $nm->move(public_path().'/surat/suta', $namafile);
            $dtupload->update();
            
        
        return redirect()->route('admin.tes3');
    }
    public function surat(Suta $suta){
        return view ('admin.suta.embed', [
            'suta'=> $suta,
            ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suta $suta)
    {
        $suta->delete();

        return redirect()->route('admin.tes3')
                    ->with('danger', 'Data surat berhasil dihapus');
    }
    public function showdata(){
        
        return datatables()->of(Suta::query())
        ->editColumn('created_at', function ($request) {
            return $request->created_at->format('d-m-y'); // human readable format
          })
          ->addColumn('aksi', 'admin.suta.action')
          ->addIndexColumn()
          ->addColumn('surat', 'admin.suta.surat')
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
                $search = DB::select("SELECT * FROM sutas WHERE created_at BETWEEN '$from' AND '$to'");
                return view('admin.cetak.suta',['ViewsPage' => $search]);
            } 
            elseif ($req->has('exportPDF'))
            {
                // select PDF
                $PDFReport = DB::select("SELECT * FROM sutas WHERE created_at BETWEEN '$from' AND '$to'");
                // $pdf = PDF::loadView('PDF_report', ['PDFReport' => $PDFReport])->setPaper('a4', 'potrait');
                // return $pdf->download('Laporan masuk.pdf');
                return view('admin.cetak.reportsuta', ['PDFReport' => $PDFReport]);
            }  
        }
            else
        {
            //select all
            $ViewsPage = DB::select('SELECT * FROM sutas');
            return view('admin.cetak.suta',['ViewsPage' => $ViewsPage]);
        }
    }
}
