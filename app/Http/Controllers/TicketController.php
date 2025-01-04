<?php

namespace App\Http\Controllers;

//import model 
use App\Models\Ticket;
use App\Models\User;
use App\Models\Tujuan; 
use App\Models\Kendaraan;
use App\Models\Jadwal; 
use Illuminate\Support\Facades\Auth;

//import return type View
use Illuminate\View\View;

//import return type redirectResponse
use Illuminate\Http\RedirectResponse;

//import Http Request
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * INI HALAMAN TICKEET BOS KU!
     *
     * @return void
     */
    public function index() : View
    {
        // Mengambil data tiket beserta data yang terkait
        $tickets = Ticket::with(['user', 'tujuan', 'kendaraan'])->latest()->paginate(10);

        //render view with tickets
        
        return view('adminTicket', compact('tickets'));
    }

/////////////////////////////////////////////////////////////////////////////////////////////////////

/**
     * INI HALAMAN  CREATE Ticket BOS KU!
     *
     * @return View
     */
    public function create(): View
    {
        
        // Mengambil semua pengguna
        $users = User::all();
        $tujuans = Tujuan::all();
        $kendaraans = Kendaraan::all();
        $jadwals = Jadwal::all();
       
        
        // Mengirim data pengguna yang login, semua pengguna, dan semua tujuan ke view
        return view('adminTicketCreate', [
            'users' => $users,
            'tujuans' => $tujuans,
            'kendaraans' => $kendaraans,
            'jadwals' => $jadwals,
            'currentUser' => Auth::user()
        ]);
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
            
            'id_user'               => 'required|min:1',
            'kode_tujuan'           => 'required|min:1',
            'kode_jadwal'           => 'required|min:1',
            'kode_kendaraan'        => 'required|min:1',
            'ticket_price'          => 'required|min:1',
            'cost_kendaraan'        => 'required|min:1',
            'total_tagihan'         => 'required|min:1',
            'tgl_order'             => 'required|date',
            'tgl_bayar'             => 'nullable|date',
            'status_ticket'         => 'required|min:1',
            'kode_verifikasi'       => 'required|min:1'
            
        ]);

        //create product
        Ticket::create([
            
            'id_user'           => $request->id_user,
            'kode_tujuan'       => $request->kode_tujuan,
            'kode_jadwal'       => $request->kode_jadwal,
            'kode_kendaraan'    => $request->kode_kendaraan,
            'ticket_price'      => $request->ticket_price,
            'cost_kendaraan'    => $request->cost_kendaraan,
            'total_tagihan'     => $request->total_tagihan,
            'tgl_order'         => $request->tgl_order,
            'tgl_bayar'         => $request->tgl_bayar,
            'status_ticket'     => $request->status_ticket,
            'kode_verifikasi'   => $request->kode_verifikasi
           
        ]);

        //redirect to index
        return redirect()->to('/admin/ticket')->with(['success' => 'Data Berhasil Disimpan!']);
    
    }
    
    
    

    public function getTicketPrice($kode_tujuan)
    {
        // Mengambil tujuan berdasarkan kode_tujuan
        $tujuan = Tujuan::where('kode_tujuan', $kode_tujuan)->first();

        // Mengembalikan harga tiket dalam format JSON
        return response()->json(['ticket_price' => $tujuan->ticket_price]);
    }

    public function getCostKendaraan($kode_kendaraan)
    {
        // Mengambil kendaraan berdasarkan kode_kendaraan
        $kendaraan = Kendaraan::where('kode_kendaraan', $kode_kendaraan)->first();

        // Mengembalikan biaya kendaraan dalam format JSON
        return response()->json(['cost_kendaraan' => $kendaraan->cost_kendaraan]);
    }
    
/////////////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * show
     *
     * @param  mixed $kode_ticket
     * @return View
     */
    public function show($id): View
    {
        // Mengambil data tiket berdasarkan ID
        $ticket = Ticket::with(['user', 'tujuan', 'kendaraan', 'jadwal'])->findOrFail($id);

        // Mengirim data tiket ke view
        return view('adminTicketShow', compact('ticket'));
    }

/////////////////////////////////////////////////////////////////////////////////////////////////////

/**
     * edit
     *
     * @param  mixed $kode_ticket
     * @return View
     */
    public function edit(string $kode_ticket): View
    {
        //get ticket by kode_ticket
        $tickets    = Ticket::where('kode_ticket', $kode_ticket)->firstOrFail();
        $users      = User::all();
        $tujuans    = Tujuan::all();
        $kendaraans = Kendaraan::all();
        $jadwals    = Jadwal::all();
    
        // Mengirim data tiket ke view
        return view('adminTicketEdit', compact('tickets', 'users', 'tujuans', 'kendaraans', 'jadwals'));
    }

/**
     * update
     *
     * @param  mixed $request
     * @param  mixed $kode_ticket
     * @return RedirectResponse
     */
    public function update(Request $request, $kode_ticket): RedirectResponse
    {
        // Validasi form
        $request->validate([
            'id_user'               => 'required|min:1',
            'kode_tujuan'           => 'required|min:1',
            'kode_jadwal'           => 'required|min:1',
            'kode_kendaraan'        => 'required|min:1',
            'ticket_price'          => 'required|min:1',
            'cost_kendaraan'        => 'required|min:1',
            'total_tagihan'         => 'required|min:1',
            'tgl_order'             => 'required|date',
            'tgl_bayar'             => 'required|min:1',
            'status_ticket'         => 'required|min:1',
            'kode_verifikasi'       => 'required|min:1'
        ]);

        //get ticket by kode_ticket
        $tickets = Ticket::where('kode_ticket', $kode_ticket)->firstOrFail();

        //update ticket 
        $tickets->update([
            'id_user'           => $request->id_user,
            'kode_tujuan'       => $request->kode_tujuan,
            'kode_jadwal'       => $request->kode_jadwal,
            'kode_kendaraan'    => $request->kode_kendaraan,
            'ticket_price'      => $request->ticket_price,
            'cost_kendaraan'    => $request->cost_kendaraan,
            'total_tagihan'     => $request->total_tagihan,
            'tgl_order'         => $request->tgl_order,
            'tgl_bayar'         => $request->tgl_bayar,
            'status_ticket'     => $request->status_ticket,
            'kode_verifikasi'   => $request->kode_verifikasi,
        ]);

        //redirect to index
        return redirect()->to('/admin/ticket')->with(['success' => 'Data Berhasil Diubah!']);
    }

/////////////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * destroy
     *
     * @param  mixed $kode_ticket
     * @return RedirectResponse
     */
    public function destroy($kode_ticket): RedirectResponse
    {
        //get tujuan by kode_ticket
        $tickets = Ticket::where('kode_ticket', $kode_ticket)->firstOrFail();

        //delete tujuan
        $tickets->delete();

        //redirect to index
        return redirect()->to('/admin/ticket')->with(['success' => 'Data Berhasil Dihapus!']);
    }


    /////////////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * confirm
     *
     * @param  mixed $kode_ticket
     * @return View
     */
    public function confirm(string $kode_ticket): View
    {
        //get ticket by kode_ticket
        $tickets    = Ticket::where('kode_ticket', $kode_ticket)->firstOrFail();
        $users      = User::all();
        $tujuans    = Tujuan::all();
        $kendaraans = Kendaraan::all();
        $jadwals    = Jadwal::all();
    
        // Mengirim data tiket ke view
        return view('adminTicketConfirm', compact('tickets', 'users', 'tujuans', 'kendaraans', 'jadwals'));
    }

    /**
     * cancel
     *
     * @param  mixed $kode_ticket
     * @return View
     */
    public function cancel(string $kode_ticket): View
    {
        //get ticket by kode_ticket
        $tickets    = Ticket::where('kode_ticket', $kode_ticket)->firstOrFail();
        $users      = User::all();
        $tujuans    = Tujuan::all();
        $kendaraans = Kendaraan::all();
        $jadwals    = Jadwal::all();
    
        // Mengirim data tiket ke view
        return view('adminTicketCancel', compact('tickets', 'users', 'tujuans', 'kendaraans', 'jadwals'));
    }
    

}
