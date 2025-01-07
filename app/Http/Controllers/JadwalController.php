<?php

namespace App\Http\Controllers;

//import model 
use App\Models\Jadwal; 

//import return type View
use Illuminate\View\View;

//import return type redirectResponse
use Illuminate\Http\RedirectResponse;

//import Http Request
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * INI HALAMAN JADWAL BOS KU!
     *
     * @return void
     */
    public function index() : View
    {
        //get all jadwals
        $jadwals = Jadwal::all();
        
        //render view with jadwals
        return view('adminjadwal', compact('jadwals'));
    }

/////////////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * INI HALAMAN  CREATE jadwal BOS KU!
     *
     * @return View
     */
    public function create(): View
    {
        return view('adminJadwalCreate');
    }

    /**
     * SIMPAN DATA jadwal
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            'jam_berangkat'      => 'required|date_format:H:i',
            'jam_tiba'           => 'required|date_format:H:i',
            'desc_jadwal'        => 'required|min:5'
            
        ]);

        //create jadwal
        Jadwal::create([
            'jam_berangkat'      => $request->jam_berangkat,
            'jam_tiba'           => $request->jam_tiba,
            'desc_jadwal'        => $request->desc_jadwal,
           
        ]);

        //redirect to index
        return redirect()->to('/admin/jadwal')->with(['success' => 'Data Berhasil Disimpan!']);
    
    }
    
/////////////////////////////////////////////////////////////////////////////////////////////////////

        /**
             * show
             *
             * @param  mixed $kode_jadwal
             * @return View
             */
            public function show(string $kode_jadwal): View
            {
                //get tujuan by kode_jadwal
                $jadwals = Jadwal::where('kode_jadwal', $kode_jadwal)->firstOrFail();
            
                //render view with jadwals
                return view('adminJadwalShow', compact('jadwals'));
            }

/////////////////////////////////////////////////////////////////////////////////////////////////////

        /**
             * edit
             *
             * @param  mixed $kode_jadwal
             * @return View
             */
            public function edit(string $kode_jadwal): View
            {
                //get jadwal by kode_jadwal
                $jadwals = Jadwal::where('kode_jadwal', $kode_jadwal)->firstOrFail();
            
                //render view with jadwal
                return view('adminJadwalEdit', compact('jadwals'));
            }
                
            /**
             * update
             *
             * @param  mixed $request
             * @param  mixed $kode_jadwal
             * @return RedirectResponse
             */
            public function update(Request $request, $kode_jadwal): RedirectResponse
            {
                //validate form
                $request->validate([
                    'jam_berangkat'      => 'required|date_format:H:i',
                    'jam_tiba'           => 'required|date_format:H:i',
                    'desc_jadwal'        => 'required|min:5'
                ]);

                //get jadwal by kode_jadwal
                $jadwals = Jadwal::where('kode_jadwal', $kode_jadwal)->firstOrFail();

                //update jadwal 
                $jadwals->update([
                    'jam_berangkat'      => $request->jam_berangkat,
                    'jam_tiba'           => $request->jam_tiba,
                    'desc_jadwal'        => $request->desc_jadwal,
                ]);

                //redirect to index
                return redirect()->to('/admin/jadwal')->with(['success' => 'Data Berhasil Diubah!']);
            }

            
/////////////////////////////////////////////////////////////////////////////////////////////////////

            /**
             * destroy
             *
             * @param  mixed $kode_jadwal
             * @return RedirectResponse
             */
            public function destroy($kode_jadwal): RedirectResponse
            {
                //get tujuan by kode_jadwal
                $jadwals = Jadwal::where('kode_jadwal', $kode_jadwal)->firstOrFail();

                //delete tujuan
                $jadwals->delete();

                //redirect to index
                return redirect()->to('/admin/jadwal')->with(['success' => 'Data Berhasil Dihapus!']);
            }
}