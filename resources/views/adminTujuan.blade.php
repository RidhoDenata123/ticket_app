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
 
                    <div class="container mt-5">
                        <div class="row">
                            <div class="col-md-12">
                                
                                <div class="card border-0">
                                    <div class="card-body">
                                        <a href="/admin/tujuan/create" class="btn btn-md btn-primary mb-3"><i class='fas fa-plus'></i> Add</a> 
                                        <a href="/admin/tujuan" class="btn btn-md btn-outline-dark mb-3"><i class='fa fa-refresh'></i></a>
                                        <table id="tujuanTable" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">No.</th>
                                                <th scope="col">Tujuan</th>
                                                <th scope="col">Deskripsi</th>
                                                <th scope="col">Harga Tiket</th>
                                                <th scope="col" style="width: 20%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($tujuans as $row)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td> <!-- Nomor otomatis -->
                                                    <td>{{ $row->nama_tujuan }}</td>
                                                    <td>{{ $row->desc_tujuan }}</td>
                                                    <td>{{ "Rp " . number_format($row->ticket_price,2,',','.') }}</td>
                                                    <td class="text-center">
                                                        <form id="delete-form-{{ $row->kode_tujuan }}" action="{{ route('tujuan.destroy', $row->kode_tujuan) }}" method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                        <a href="{{ route('tujuan.show', $row->kode_tujuan) }}" class="btn btn-sm btn-secondary"> <i class='far fa-eye'></i> </a>
                                                        <a href="{{ route('tujuan.edit', $row->kode_tujuan) }}" class="btn btn-sm btn-warning"> <i class='fas fa-edit'> </i></a>
                                                        <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $row->kode_tujuan }})"> <i class='fas fa-trash-alt'></i> </button>
                                                    </td>
                                                </tr>
                                            @empty
                                                <div class="alert alert-danger">
                                                    Data tujuan belum Tersedia.
                                                </div>
                                            @endforelse
                                        </tbody>
                                    </table>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <script>
                    $(document).ready(function() {
                        $('#tujuanTable').DataTable();
                    });

                </script>

                </div>
            </div>
        </div>
    </div>
</div>



@endsection
