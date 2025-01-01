<?php

namespace App\Http\Controllers;

//import model product
use App\Models\Tujuan; 

//import return type View
use Illuminate\View\View;

//import return type redirectResponse
use Illuminate\Http\RedirectResponse;

//import Http Request
use Illuminate\Http\Request;

class TujuanController extends Controller
{
    /**
     * INI HALAMAN TUJUAN BOS KU!
     *
     * @return void
     */
    public function index() : View
    {
        //get all tujuans
        $tujuans = Tujuan::latest()->paginate(10);

        //render view with tujuans
        return view('adminTujuan', compact('tujuans'));
    }

/////////////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * INI HALAMAN  CREATE TUJUAN BOS KU!
     *
     * @return View
     */
    public function create(): View
    {
        return view('adminTujuanCreate');
    }

    /**
     * SIMPAN DATA TUJUAN
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            'nama_tujuan'         => 'required|min:5',
            'desc_tujuan'         => 'required|min:5',
            'ticket_price'        => 'required|numeric'
            
        ]);

        //create product
        Tujuan::create([
            'nama_tujuan'         => $request->nama_tujuan,
            'desc_tujuan'         => $request->desc_tujuan,
            'ticket_price'        => $request->ticket_price,
           
        ]);

        //redirect to index
        return redirect()->to('/admin/tujuan')->with(['success' => 'Data Berhasil Disimpan!']);
    
    }
    
/////////////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * show
     *
     * @param  mixed $kode_tujuan
     * @return View
     */
    public function show(string $kode_tujuan): View
    {
        //get product by kode_tujuan
        $tujuans = Tujuan::where('kode_tujuan', $kode_tujuan)->firstOrFail();
    
        //render view with product
        return view('adminTujuanShow', compact('tujuans'));
    }

/////////////////////////////////////////////////////////////////////////////////////////////////////

 
/**
     * edit
     *
     * @param  mixed $kode_tujuan
     * @return View
     */
    public function edit(string $kode_tujuan): View
    {
        //get product by kode_tujuan
        $tujuans = Tujuan::where('kode_tujuan', $kode_tujuan)->firstOrFail();
    
        //render view with product
        return view('adminTujuanEdit', compact('tujuans'));
    }
        

        /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $kode_tujuan
     * @return RedirectResponse
     */
    public function update(Request $request, $kode_tujuan): RedirectResponse
    {
        //validate form
        $request->validate([
            'nama_tujuan'         => 'required|min:5',
            'desc_tujuan'         => 'required|min:5',
            'ticket_price'        => 'required|numeric'
        ]);

        //get product by kode_tujuan
        $tujuans = Tujuan::where('kode_tujuan', $kode_tujuan)->firstOrFail();

        //update product 
        $tujuans->update([
            'nama_tujuan'         => $request->nama_tujuan,
            'desc_tujuan'         => $request->desc_tujuan,
            'ticket_price'        => $request->ticket_price,
        ]);

        //redirect to index
        return redirect()->to('/admin/tujuan')->with(['success' => 'Data Berhasil Diubah!']);
    }

/////////////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * destroy
     *
     * @param  mixed $kode_tujuan
     * @return RedirectResponse
     */
    public function destroy($kode_tujuan): RedirectResponse
    {
        //get product by kode_tujuan
        $tujuans = Tujuan::where('kode_tujuan', $kode_tujuan)->firstOrFail();

        //delete product
        $tujuans->delete();

        //redirect to index
        return redirect()->to('/admin/tujuan')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}