<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supe;

class SupeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('admin.supe.tes');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view ('admin.supe.create');
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
            'fsupe' => 'required|mimes:pdf,xlx,csv|max:2048',
            'nama' => 'required',
            'jabatan' => 'required',
            'tempat' => 'required',
            'maksud' => 'required',
            'lama' => 'required',
            'pergi' => 'required',
            'pulang' => 'required',

        ]);
        $nm = $request->fsupe;
        $namafile = $nm->getClientOriginalName();
            $dtupload = new Supe;
        
            
            $dtupload->nama  = $request->nama;
            $dtupload->jabatan  = $request->jabatan;
            $dtupload->tempat  = $request->tempat;
            $dtupload->maksud  = $request->maksud;
            $dtupload->lama  = $request->lama;
            $dtupload->pergi  = $request->pergi;
            $dtupload->pulang  = $request->pulang;          
            $dtupload->fsupe = $namafile;

            $nm->move(public_path().'/surat/supe', $namafile);
            $dtupload->save();
            
        
        return redirect()->route('admin.tes4');
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

    public function surat(Supe $supe){
        return view ('admin.supe.embed', [
            'supe'=> $supe,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Supe $supe)
    {
        return view('admin.supe.edit', [
            'supe'=>$supe,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supe $supe)
    {
        $nm = $request->fsupe;
        $namafile = $nm->getClientOriginalName();
            $dtupload = new Supe;
        
            
            $dtupload->nama  = $request->nama;
            $dtupload->jabatan  = $request->jabatan;
            $dtupload->tempat  = $request->tempat;
            $dtupload->maksud  = $request->maksud;
            $dtupload->lama  = $request->lama;
            $dtupload->pergi  = $request->pergi;
            $dtupload->pulang  = $request->pulang;          
            $dtupload->fsupe = $namafile;

            $nm->move(public_path().'/surat/supe', $namafile);
            $dtupload->update();
            
        
        return redirect()->route('admin.tes4');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supe $supe)
    {
        $supe->delete();

        return redirect()->route('admin.tes4')
                    ->with('danger', 'Data surat berhasil dihapus');
    }

    public function showdata(){
        
        return datatables()->of(Supe::query())
        
          ->addColumn('aksi', 'admin.supe.action')
          ->addIndexColumn()
          ->addColumn('surat', 'admin.supe.surat')
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
                $search = DB::select("SELECT * FROM supes WHERE created_at BETWEEN '$from' AND '$to'");
                return view('admin.cetak.supe',['ViewsPage' => $search]);
            } 
            elseif ($req->has('exportPDF'))
            {
                // select PDF
                $PDFReport = DB::select("SELECT * FROM supes WHERE created_at BETWEEN '$from' AND '$to'");
                // $pdf = PDF::loadView('PDF_report', ['PDFReport' => $PDFReport])->setPaper('a4', 'potrait');
                // return $pdf->download('Laporan masuk.pdf');
                return view('admin.cetak.reportsupe', ['PDFReport' => $PDFReport]);
            }  
        }
            else
        {
            //select all
            $ViewsPage = DB::select('SELECT * FROM supes');
            return view('admin.cetak.supe',['ViewsPage' => $ViewsPage]);
        }
    }
    
}
