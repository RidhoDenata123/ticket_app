@extends('layouts.admin_app')
 
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('CRUD Kendaraan') }}</div>

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
                                        <form action="#" method="POST" enctype="multipart/form-data">
                                        
                                            @csrf

                                            <div class="row">

                                            <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label class="font-weight-bold">KODE KENDARAAN</label>
                                                        <input type="text" class="form-control @error('kode_kendaraan') is-invalid @enderror" name="kode_kendaraan" value="{{ old('kode_kendaraan', $kendaraans->kode_kendaraan) }}" placeholder="Masukkan kode kendaraan" readonly>
                                                    
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
                                                        <label class="font-weight-bold">NAMA KENDARAAN</label>
                                                        <input type="text" class="form-control @error('nama_kendaraan') is-invalid @enderror" name="nama_kendaraan" value="{{ old('nama_kendaraan', $kendaraans->nama_kendaraan) }}" placeholder="Masukkan Nama Kendaraan" readonly>
                                                    
                                                        <!-- error message untuk nama_kendaraan -->
                                                        @error('nama_kendaraan')
                                                            <div class="alert alert-danger mt-2">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>  


                                            <div class="form-group mb-3">
                                                <label class="font-weight-bold">DESKRIPSI</label>
                                                <textarea class="form-control @error('desc_kendaraan') is-invalid @enderror" name="desc_kendaraan" rows="5" placeholder="Masukkan deskripsi kendaraan"readonly>{{ old('desc_kendaraan', $kendaraans->desc_kendaraan) }}</textarea>
                                            
                                                <!-- error message untuk desc_kendaraan -->
                                                @error('desc_kendaraan')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                        <label class="font-weight-bold">COST</label>
                                                        <input type="number" class="form-control @error('cost_kendaraan') is-invalid @enderror" name="cost_kendaraan" value="{{ old('cost_kendaraan', $kendaraans->cost_kendaraan) }}" placeholder="Masukkan cost kendaraan" readonly>
                                                    
                                                        <!-- error message untuk cost_kendaraan -->
                                                        @error('cost_kendraan')
                                                            <div class="alert alert-danger mt-2">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>


                                                    <div class="modal-footer">
                                                        <a href="/admin/kendaraan" class="btn btn-md btn-basic me-4">CANCEL</a>

                                                        <div class="btn-group">
                                                            <a href="/admin/kendaraan" class="btn btn-md btn-dark me-4">OK</a>
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
