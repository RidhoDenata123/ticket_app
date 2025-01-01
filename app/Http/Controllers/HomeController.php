<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): View
    {
        return view('home');
    } 
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome(): View
    {
        return view('adminHome');
    }

     /**
     * Show the application tujuan.
     
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminTujuan(): View
    {
        return view('adminTujuan');
    }

         /**
     * Show the application tujuan create.
     
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminTujuanCreate(): View
    {
        return view('adminTujuanCreate');
    }

    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function managerHome(): View
    {
        return view('managerHome');
    }
    


}
