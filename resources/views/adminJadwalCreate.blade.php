@extends('layouts.admin_app')
 
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('CRUD Jadwal') }}</div>

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
                                        <form action="{{ route('jadwal.store') }}" method="POST" enctype="multipart/form-data">
                                        
                                            @csrf


                                            <div class="row">

                                                <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label class="font-weight-bold">JAM BERANGKAT</label>
                                                            <input type="time" class="form-control @error('jam_berangkat') is-invalid @enderror" name="jam_berangkat" value="{{ old('jam_berangkat') }}" placeholder="Masukkan jam berangkat">
                                                            <!-- error message untuk jam_berangkat  -->
                                                            @error('jam_berangkat ')
                                                                <div class="alert alert-danger mt-2">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                            <div class="form-group mb-3">
                                                            <label class="font-weight-bold">JAM TIBA</label>
                                                            <input type="time" class="form-control @error('jam_tiba') is-invalid @enderror" name="jam_tiba" value="{{ old('jam_tiba') }}" placeholder="Masukkan jam tiba">
                                                            <!-- error message untuk jam_tiba  -->
                                                            @error('jam_tiba ')
                                                                <div class="alert alert-danger mt-2">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                            </div> 

                                            <div class="form-group mb-3">
                                                <label class="font-weight-bold">DESKRIPSI</label>
                                                <textarea class="form-control @error('desc_jadwal') is-invalid @enderror" name="desc_jadwal" rows="5" placeholder="Masukkan deskripsi jadwal">{{ old('desc_jadwal') }}</textarea>
                                            
                                                <!-- error message untuk desc_jadwal -->
                                                @error('desc_jadwal')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

   
                                                    <div class="modal-footer">
                                                        <a href="/admin/jadwal" class="btn btn-md btn-basic me-4">CANCEL</a>

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
