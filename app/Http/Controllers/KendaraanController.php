<?php

namespace App\Http\Controllers;

//import model 
use App\Models\Kendaraan; 

//import return type View
use Illuminate\View\View;

//import return type redirectResponse
use Illuminate\Http\RedirectResponse;

//import Http Request
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    
    /**
     * INI HALAMAN KENDARAAN BOS KU!
     *
     * @return void
     */
    public function index() : View
    {
        //get all kendaraans
        $kendaraans = Kendaraan::all();

        //render view with kendaraans
        return view('adminKendaraan', compact('kendaraans'));
    }

/////////////////////////////////////////////////////////////////////////////////////////////////////

    /**
         * INI HALAMAN  CREATE KENDARAAN BOS KU!
         *
         * @return View
         */
        public function create(): View
        {
            return view('adminKendaraanCreate');
        }

        /**
         * SIMPAN DATA kendaraans
         *
         * @param  mixed $request
         * @return RedirectResponse
         */
        public function store(Request $request): RedirectResponse
        {
            //validate form
            $request->validate([
                'nama_kendaraan'         => 'required|min:5',
                'desc_kendaraan'         => 'required|min:5',
                'cost_kendaraan'         => 'required|numeric'
                
            ]);

            //create product
            Kendaraan::create([
                'nama_kendaraan'         => $request->nama_kendaraan,
                'desc_kendaraan'         => $request->desc_kendaraan,
                'cost_kendaraan'         => $request->cost_kendaraan,
            
            ]);

            //redirect to index
            return redirect()->to('/admin/kendaraan')->with(['success' => 'Data Berhasil Disimpan!']);
        
        }

        /**
         * show
         *
         * @param  mixed $kode_kendaraan
         * @return View
         */
        public function show(string $kode_kendaraan): View
        {
            //get kendaraan by kode_kendaraan
            $kendaraans = Kendaraan::where('kode_kendaraan', $kode_kendaraan)->firstOrFail();
        
            //render view with kendaraan
            return view('adminKendaraanShow', compact('kendaraans'));
        }

/////////////////////////////////////////////////////////////////////////////////////////////////////

        /**
         * edit
         *
         * @param  mixed $kode_kendaraan
         * @return View
         */
        public function edit(string $kode_kendaraan): View
        {
            //get kendaraan by kode_kendaraan
            $kendaraans = Kendaraan::where('kode_kendaraan', $kode_kendaraan)->firstOrFail();
        
            //render view with kendaraan
            return view('adminKendaraanEdit', compact('kendaraans'));
        }
            

            /**
         * update
         *
         * @param  mixed $request
         * @param  mixed $kode_kendaraan
         * @return RedirectResponse
         */
        public function update(Request $request, $kode_kendaraan): RedirectResponse
        {
            //validate form
            $request->validate([
                'nama_kendaraan'         => 'required|min:5',
                'desc_kendaraan'         => 'required|min:5',
                'cost_kendaraan'         => 'required|numeric'
            ]);

            //get kendaraan by kode_kendaraan
            $kendaraans = Kendaraan::where('kode_kendaraan', $kode_kendaraan)->firstOrFail();

            //update kendaraan 
            $kendaraans->update([
                'nama_kendaraan'         => $request->nama_kendaraan,
                'desc_kendaraan'         => $request->desc_kendaraan,
                'cost_kendaraan'         => $request->cost_kendaraan,
            ]);

            //redirect to index
            return redirect()->to('/admin/kendaraan')->with(['success' => 'Data Berhasil Diubah!']);
        }
/////////////////////////////////////////////////////////////////////////////////////////////////////

            /**
             * destroy
             *
             * @param  mixed $kode_kendaraan
             * @return RedirectResponse
             */
            public function destroy($kode_kendaraan): RedirectResponse
            {
                //get kendaraan by kode_kendaraan
                $kendaraans = Kendaraan::where('kode_kendaraan', $kode_kendaraan)->firstOrFail();

                //delete kendaraan
                $kendaraans->delete();

                //redirect to index
                return redirect()->to('/admin/kendaraan')->with(['success' => 'Data Berhasil Dihapus!']);
            }
}
