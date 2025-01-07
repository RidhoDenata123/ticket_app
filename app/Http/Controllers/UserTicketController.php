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

class UserTicketController extends Controller
{
    /**
     * INI HALAMAN TICKEET BOS KU!
     *
     * @return void
     */
    public function index() : View
    {
       // Mengambil data tiket yang terkait dengan pengguna yang sedang login
       $userId = Auth::id();
       $tickets = Ticket::with(['user', 'tujuan', 'kendaraan'])
                        ->where('id_user', $userId)
                        ->latest()
                        ->paginate(100);

        //render view with tickets
        
        return view('userTicket', compact('tickets'));
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
        $userId = Auth::id(); // Mendapatkan ID pengguna yang sedang login
        
        // Mengirim data pengguna yang login, semua pengguna, dan semua tujuan ke view
        return view('userTicketCreate', [
            'users' => $users,
            'tujuans' => $tujuans,
            'kendaraans' => $kendaraans,
            'jadwals' => $jadwals,
            'userId' => $userId
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
        return redirect()->to('/user/ticket')->with(['success' => 'Data Berhasil Disimpan!']);
    
    }
     

    public function usergetTicketPrice($kode_tujuan)
    {
        // Mengambil tujuan berdasarkan kode_tujuan
        $tujuan = Tujuan::where('kode_tujuan', $kode_tujuan)->first();

        // Mengembalikan harga tiket dalam format JSON
        return response()->json(['ticket_price' => $tujuan->ticket_price]);
    }

    public function usergetCostKendaraan($kode_kendaraan)
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
        return view('userTicketShow', compact('ticket'));
    }

/////////////////////////////////////////////////////////////////////////////////////////////////////


}
