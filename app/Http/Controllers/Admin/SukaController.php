<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Suka;

class SukaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('admin.suka.tes');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.suka.create');
    }
    public function surat(Suka $suka){
        return view ('admin.suka.embed', [
            'suka'=> $suka,
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
            'fsuka' => 'required|mimes:pdf,xlx,csv|max:2048',
            'noreg' => 'required',
            'uraian' => 'required',
            'ket' => 'required',
            'created_at' => 'required',

        ]);
        $nm = $request->fsuka;
        $namafile = $nm->getClientOriginalName();
            $dtupload = new Suka;
        
            
            $dtupload->noreg = $request->noreg; 
            $dtupload->uraian = $request->uraian;
            $dtupload->ket= $request->ket;
            $dtupload->created_at= $request->created_at;
            $dtupload->fsuka = $namafile;

            $nm->move(public_path().'/surat/suka', $namafile);
            $dtupload->save();
            
        
        return redirect()->route('admin.tes5');
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
    public function edit(Suka $suka)
    {
        return view('admin.suka.edit', [
            'suka'=>$suka,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suka $suka)
    {
        $nm = $request->fsuka;
        $namafile = $nm->getClientOriginalName();
            $dtupload = new Suka;
        
            
            $dtupload->noreg = $request->noreg; 
            $dtupload->uraian = $request->uraian;
            $dtupload->ket= $request->ket;
            $dtupload->fsuka = $namafile;
          
            $nm->move(public_path().'/surat/suka', $namafile);
            $dtupload->update();
            
        
        return redirect()->route('admin.tes5');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suka $suka)
    {
        $suka->delete();

        return redirect()->route('admin.tes5')
                    ->with('danger', 'Data surat berhasil dihapus');
    }

    public function showdata(){
        
        return datatables()->of(Suka::query())
        ->editColumn('created_at', function ($request) {
            return $request->created_at->format('d-m-y'); // human readable format
          })
          ->addColumn('aksi', 'admin.suka.action')
          ->addIndexColumn()
          ->addColumn('surat', 'admin.suka.surat')
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
                $search = DB::select("SELECT * FROM sukas WHERE created_at BETWEEN '$from' AND '$to'");
                return view('admin.cetak.suka',['ViewsPage' => $search]);
            } 
            elseif ($req->has('exportPDF'))
            {
                // select PDF
                $PDFReport = DB::select("SELECT * FROM sukas WHERE created_at BETWEEN '$from' AND '$to'");
                // $pdf = PDF::loadView('PDF_report', ['PDFReport' => $PDFReport])->setPaper('a4', 'potrait');
                // return $pdf->download('Laporan masuk.pdf');
                return view('admin.cetak.reportsuka', ['PDFReport' => $PDFReport]);
            }  
        }
            else
        {
            //select all
            $ViewsPage = DB::select('SELECT * FROM sukas');
            return view('admin.cetak.suka',['ViewsPage' => $ViewsPage]);
        }
    }
}