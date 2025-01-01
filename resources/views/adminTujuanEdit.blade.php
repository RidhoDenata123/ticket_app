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
                                        <form action="{{ route('tujuan.update', $tujuans->kode_tujuan) }}" method="POST" enctype="multipart/form-data">
                                        
                                            @csrf
                                            @method('PUT') <!-- Pastikan menggunakan metode PUT -->

                                            <div class="form-group mb-3">
                                                <label class="font-weight-bold">TUJUAN</label>
                                                <input type="text" class="form-control @error('nama_tujuan') is-invalid @enderror" name="nama_tujuan" value="{{ old('nama_tujuan', $tujuans->nama_tujuan) }}" placeholder="Masukkan Tujuan Perjalanan">
                                            
                                                <!-- error message untuk nama_tujuan -->
                                                @error('nama_tujuan')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <label class="font-weight-bold">DESKRIPSI</label>
                                                <textarea class="form-control @error('desc_tujuan') is-invalid @enderror" name="desc_tujuan" rows="5" placeholder="Masukkan deskripsi tujuan">{{ old('desc_tujuan', $tujuans->desc_tujuan) }}</textarea>
                                            
                                                <!-- error message untuk desc_tujuan -->
                                                @error('desc_tujuan')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                        <label class="font-weight-bold">TICKET PRICE</label>
                                                        <input type="number" class="form-control @error('ticket_price') is-invalid @enderror" name="ticket_price" value="{{ old('ticket_price', $tujuans->ticket_price) }}" placeholder="Masukkan Harga Ticket">
                                                    
                                                        <!-- error message untuk ticket_price -->
                                                        @error('ticket_price')
                                                            <div class="alert alert-danger mt-2">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>


                                                    <div class="modal-footer">
                                                        <a href="/admin/tujuan" class="btn btn-md btn-basic me-4">CANCEL</a>

                                                        <div class="btn-group">
                                                            <button type="reset" class="btn btn-md btn-outline-dark"> <i class="fa fa-refresh"></i> RESET</button>
                                                            <button type="submit" class="btn btn-md btn-primary"> <i class="fa fa-save"></i> SAVE</button>
                                                        </div>	

                                                    </div>   

                                        </form> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( '#' );
    </script>


                </div>
            </div>
        </div>
    </div>
</div>



@endsection
