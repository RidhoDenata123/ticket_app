@extends('layouts.user_app')
 
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('CRUD ticket') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
 
                    <div class="container mt-5 mb-5">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card border-0">
                                    <div class="card-body">
                                    <form action="{{ route('ticket.store') }}" method="POST" enctype="multipart/form-data">
                                        
                                            @csrf

                                            <div class="row">

                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label class="font-weight-bold">KODE TICKET</label>
                                                            
                                                            <input type="text" class="form-control" value="{{ $ticket->kode_ticket }}" readonly>
                                                     
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label class="font-weight-bold">PEMESAN</label>
                                                            <input type="text" class="form-control" value="{{ $ticket->user->name }}" readonly>

                                                        </div>
                                                    </div>

                                            </div>

                                            

                                           
                                            <hr>

                                            <div class="form-group mb-3">
                                                            <label class="font-weight-bold">TANGGAL KEBERANGKATAN</label> 
                                                            <input type="text" class="form-control" value="{{ $ticket->tgl_order }}" readonly>

                                                    </div>

                                            <div class="form-group mb-3">
                                                            <label class="font-weight-bold">JAM KEBERANGKATAN</label>
                                                            <input type="time" class="form-control" value="{{ $ticket->jadwal->jam_berangkat }}" readonly>
                                                        </div>
                                            <hr> 

                                            <div class="row">

                                                <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label class="font-weight-bold">TUJUAN</label>
                                                            <input type="text" class="form-control" value="{{ $ticket->tujuan->nama_tujuan }}" readonly>
                                                            
                                                        </div>
                                                    </div>

                                                    
                                                <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label class="font-weight-bold">TICKET PRICE</label>
                                                            <input type="text" class="form-control" value="{{ $ticket->kode_ticket }}" readonly>
                                                        </div>
                                                    </div>

                                            </div>
                                                        

                                            <div class="row">

                                            <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                    <label class="font-weight-bold">KENDARAAN</label>
                                                    <input type="text" class="form-control" value="{{  $ticket->kendaraan->nama_kendaraan }}" readonly>                                                 
                                                    </div>
                                                </div>

                                                
                                            <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label class="font-weight-bold">COST KENDARAAN</label>
                                                        <input type="text" class="form-control" value="{{ $ticket->cost_kendaraan }}" readonly>
                                                    </div>
                                                </div>


                                            </div>
                                                  
                                            <div class="form-group mb-3">
                                                        <label class="font-weight-bold">TOTAL TAGIHAN</label>
                                                        <input type="text" class="form-control" value="{{ $ticket->total_tagihan }}" readonly>
                                                    </div>
                                            
                                            <hr>

                                        <!-- hidden stuff -->
                                <div class="form-group mb-3">
                                                <label class="font-weight-bold">TANGGAL PEMBUATAN TICKET</label>
                                                <input type="text" class="form-control" value="{{ $ticket->created_at }}" readonly>
                                            </div>

                                <div class="form-group mb-3">
                                                <label class="font-weight-bold">STATUS TICKET</label>
                                                <input type="text" class="form-control" value="{{ $ticket->status_ticket }}" readonly>
                                            </div>
<br>
                                <div class="row">

                                    <div class="col-md-6">

                                        <div class="form-group mb-3">
                                                        <label class="font-weight-bold">TANGGAL BAYAR</label>
                                                        <input type="text" class="form-control" value="{{ $ticket->tgl_bayar == '01/01/0001' ? 'N/A' : $ticket->tgl_bayar }}" readonly>
                                                    </div>
                                    </div>
                               
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                                        <label class="font-weight-bold">KODE VERIFIKASI</label>
                                                        <input type="text" class="form-control" value="{{ $ticket->kode_verifikasi }}" readonly>
                                                    </div>
                                    </div>
                                </div>
                                            <hr>



                                            <div class="modal-footer">
                                                        <a href="/user/ticket" class="btn btn-md btn-basic me-4">CANCEL</a>

                                                        <div class="btn-group">
                                                            <a href="/user/ticket" class="btn btn-md btn-dark me-4">OK</a>
                                                        </div>	

                                                    </div>   

                                        </form> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

    

                </div>
            </div>
        </div>
    </div>
</div>




@endsection
