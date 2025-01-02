<?php

namespace App\Http\Controllers;

//import model 
use App\Models\Ticket; 

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
        //get all tickets
        $tickets = Ticket::latest()->paginate(10);

        //render view with tickets
        return view('adminTicket', compact('tickets'));
    }

/////////////////////////////////////////////////////////////////////////////////////////////////////
}
