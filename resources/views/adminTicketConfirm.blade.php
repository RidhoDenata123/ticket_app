@extends('layouts.admin_app')
 
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('CRUD Tujuan') }}</div>

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
                        
                                        
                                    <form action="{{ route('ticket.update', $tickets->kode_ticket) }}" method="POST" enctype="multipart/form-data">
                                        
                                        @csrf
                                        @method('PUT') <!-- Pastikan menggunakan metode PUT -->

                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label class="font-weight-bold">KODE TICKET</label>
                                                    
                                                    <input type="text" class="form-control" value="{{ $tickets->kode_ticket }}" readonly>
                                            
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label class="font-weight-bold">PEMESAN</label>
                                                    <input type="text" class="form-control" value="{{ $tickets->user->name }}" readonly>

                                                </div>
                                            </div>

                                        </div>

                                           
                                            <hr>

                                            <div class="form-group mb-3">
                                                            <label class="font-weight-bold">TANGGAL KEBERANGKATAN</label> 
                                                            <input type="text" class="form-control" value="{{ $tickets->tgl_order }}" readonly>

                                                    </div>

                                                    <div class="form-group mb-3">
                                                            <label class="font-weight-bold">JAM KEBERANGKATAN</label>
                                                            <input type="time" class="form-control" value="{{ $tickets->jadwal->jam_berangkat }}" readonly>
                                                        </div>

                                        
                                                       
                                            <hr> 

                                            <div class="row">

                                                <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                                    <label class="font-weight-bold">TUJUAN</label>
                                                                    <input type="text" class="form-control" value="{{ $tickets->tujuan->nama_tujuan }}" readonly>
                                                                    
                                                        </div>
                                                    </div>

                                                    
                                                <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                                    <label class="font-weight-bold">TICKET PRICE</label>
                                                                    <input type="text" class="form-control" value="{{ $tickets->kode_ticket }}" readonly>
                                                        </div>
                                                    </div>

                                            </div>
                                                        

                                            <div class="row">

                                            <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                    <label class="font-weight-bold">KENDARAAN</label>
                                                    <select class="form-select @error('kode_kendaraan') is-invalid @enderror" name="kode_kendaraan" id="kode_kendaraan" require>
                                                            <option value="">Pilih kendaraan</option>
                                                                @foreach($kendaraans as $kendaraan)
                                                                <option value="{{ $kendaraan->kode_kendaraan }}" {{ old('kode_kendaraan', $tickets->kode_kendaraan) == $kendaraan->kode_kendaraan ? 'selected' : '' }}>{{ $kendaraan->nama_kendaraan }}</option>
                                                                @endforeach
                                                            </select>

                                                            <!-- error message untuk kode_kendaraan -->
                                                            @error('kode_kendaraan')
                                                                <div class="alert alert-danger mt-2">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror                                                            
                                                    </div>
                                                </div>

                                                
                                            <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                        <label class="font-weight-bold">COST KENDARAAN</label>
                                                        <input type="text" class="form-control" value="{{ $tickets->cost_kendaraan }}" readonly>
                                                    </div>
                                                </div>


                                            </div>
                                                  
                                            <div class="form-group mb-3">
                                                        <label class="font-weight-bold">TOTAL TAGIHAN</label>
                                                        <input type="text" class="form-control" value="{{ $tickets->total_tagihan }}" readonly>
                                                    </div>
                                            
                                            <hr>

                                        <!-- hidden stuff -->

                                            <input type="hidden" class="form-control" name="tgl_bayar" id="tgl_bayar" readonly>
                                            <input type="hidden" class="form-control" name="status_ticket"  value="Pembayaran Sukses">
                                            <input type="hidden" class="form-control" name="kode_verifikasi" id="kode_verifikasi" readonly>





                                                    <div class="modal-footer">
                                                        <a href="/admin/ticket" class="btn btn-md btn-basic me-4">CANCEL</a>

                                                        <button type="submit" class="btn btn-md btn-success"> <i class="far fa-check-circle"></i> Confirm Payment</button>

                                                    </div>   

                                        </form> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
                <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>



                </div>
            </div>
        </div>
    </div>
</div>


<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    function calculateTotal() {
        var ticketPrice = parseFloat($('#ticket_price').val()) || 0;
        var costKendaraan = parseFloat($('#cost_kendaraan').val()) || 0;
        var totalTagihan = ticketPrice + costKendaraan;
        $('#total_tagihan').val(totalTagihan);
    }

    $('#kode_tujuan').change(function() {
        var kode_tujuan = $(this).val();
        if (kode_tujuan) {
            $.ajax({
                url: '/get-ticket-price/' + kode_tujuan,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#ticket_price').val(data.ticket_price);
                    calculateTotal();
                }
            });
        } else {
            $('#ticket_price').val('');
            calculateTotal();
        }
    });

    $('#kode_kendaraan').change(function() {
        var kode_kendaraan = $(this).val();
        if (kode_kendaraan) {
            $.ajax({
                url: '/get-cost-kendaraan/' + kode_kendaraan,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#cost_kendaraan').val(data.cost_kendaraan);
                    calculateTotal();
                }
            });
        } else {
            $('#cost_kendaraan').val('');
            calculateTotal();
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
    var today = new Date();
    var date = today.getFullYear() + '-' + String(today.getMonth() + 1).padStart(2, '0') + '-' + String(today.getDate()).padStart(2, '0');
    var time = String(today.getHours()).padStart(2, '0') + ':' + String(today.getMinutes()).padStart(2, '0');
    var dateTime = date + 'T' + time;
    document.getElementById('tgl_bayar').value = dateTime;


  // Menghasilkan kode verifikasi acak
  function generateVerificationCode(length) {
        var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        var charactersLength = characters.length;
        var result = '';
        for (var i = 0; i < length; i++) {
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
        }
        return result;
    }

    // Mengisi otomatis kode_verifikasi dengan kode acak
    var verificationCode = generateVerificationCode(8); // Panjang kode verifikasi 8 karakter
    document.getElementById('kode_verifikasi').value = verificationCode;
});

</script>

@endsection
