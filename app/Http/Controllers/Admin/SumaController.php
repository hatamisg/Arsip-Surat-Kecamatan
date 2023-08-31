<?php

namespace App\Http\Controllers\Admin;
use DB;
use PDF;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Suma;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class SumaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('admin.suma.tes');
    }
    public function indexuser()
    {
        return view ('admin.orang');
    }
    public function direk()
    {
        return view ('admin.direk');
    }
    public function adduser()
    {
        return view ('admin.tambah');
    }
    public function destroyuser(User $user)
    {
        $user->delete();

        return redirect()->route('admin.indexorang')
                    ->with('danger', 'Data surat berhasil dihapus');
    }
    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
            $dtupload = new User;
        
            
            $dtupload->name = $request->name; 
            $dtupload->email = $request->email;
            $dtupload->password = Hash::make($request->password);
            

            $dtupload->assignRole('user');
            $dtupload->save();
            
        
        return redirect()->route('admin.indexorang');
        
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view ('admin.suma.create');
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
            'fsuma' => 'required|mimes:pdf,xlx,csv|max:2048',
            'pengirim' => 'required',
            'no' => 'required',
            'ringkasan' => 'required',
            'tujuan' => 'required',
            'ket' => 'required',

        ]);
        $nm = $request->fsuma;
        $namafile = $nm->getClientOriginalName();
            $dtupload = new Suma;
        
            
            $dtupload->pengirim = $request->pengirim; 
            $dtupload->no = $request->no;
            $dtupload->ringkasan = $request->ringkasan;
            $dtupload->tujuan = $request->tujuan; 
            $dtupload->ket= $request->ket;
            $dtupload->fsuma = $namafile;

            $nm->move(public_path().'/surat', $namafile);
            $dtupload->save();
            
        
        return redirect()->route('admin.tes');
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

    public function surat(Suma $suma){
        return view ('admin.suma.embed', [
            'suma'=> $suma,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Suma $suma)
    {
        return view('admin.suma.edit', [
            'suma'=>$suma,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suma $suma)
    {
        $nm = $request->fsuma;
        $namafile = $nm->getClientOriginalName();
            $dtupload = new Suma;
        
            
            $dtupload->pengirim = $request->pengirim; 
            $dtupload->no = $request->no;
            $dtupload->ringkasan = $request->ringkasan;
            $dtupload->tujuan = $request->tujuan; 
            $dtupload->ket= $request->ket;
            $dtupload->fsuma = $namafile;
          
            $nm->move(public_path().'/surat', $namafile);
            $dtupload->update();
            
        
        return redirect()->route('admin.tes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suma $suma)
    {
        $suma->delete();

        return redirect()->route('admin.tes')
                    ->with('danger', 'Data surat berhasil dihapus');
    }

    public function showdata(){
        
        return datatables()->of(Suma::query())
        ->editColumn('created_at', function ($request) {
            return $request->created_at->format('d-m-y'); // human readable format
          })
          ->addColumn('aksi', 'admin.suma.action')
          ->addIndexColumn()
          ->addColumn('surat', 'admin.suma.surat')
          ->addIndexColumn()
          ->rawColumns(['aksi','surat'])
          ->toJson();
        

        
    }
    public function showdata1(){
        
        return datatables()->of(User::query())
        
          ->addColumn('aksi', 'admin.action')
          ->addIndexColumn()
          
          ->rawColumns(['aksi'])
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
                $search = DB::select("SELECT * FROM sumas WHERE created_at BETWEEN '$from' AND '$to'");
                return view('admin.cetak.suma',['ViewsPage' => $search]);
            } 
            elseif ($req->has('exportPDF'))
            {
                // select PDF
                $PDFReport = DB::select("SELECT * FROM sumas WHERE created_at BETWEEN '$from' AND '$to'");
                // $pdf = PDF::loadView('PDF_report', ['PDFReport' => $PDFReport])->setPaper('a4', 'potrait');
                // return $pdf->download('Laporan masuk.pdf');
                return view('admin.cetak.reportsuma', ['PDFReport' => $PDFReport]);
            }  
        }
            else
        {
            //select all
            $ViewsPage = DB::select('SELECT * FROM sumas');
            return view('admin.cetak.suma',['ViewsPage' => $ViewsPage]);
        }
    }

    // public function cetaksuma( ){
    //    return view('PDF_report');
    // }
    
}
