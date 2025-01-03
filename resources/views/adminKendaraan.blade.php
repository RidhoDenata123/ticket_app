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
 
                    <div class="container mt-5">
                        <div class="row">
                            <div class="col-md-12">
                                
                                <div class="card border-0">
                                    <div class="card-body">
                                        <a href="/admin/kendaraan/create" class="btn btn-md btn-primary mb-3"><i class='fas fa-plus'></i> Add</a> 
                                        <a href="/admin/kendaraan" class="btn btn-md btn-outline-dark mb-3"><i class='fa fa-refresh'></i></a>
                                        <table id="kendaraanTable" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">No.</th>
                                                <th scope="col">Nama kendaraan</th>
                                                <th scope="col">Deskripsi</th>
                                                <th scope="col">Cost</th>
                                                <th scope="col" style="width: 20%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($kendaraans as $row)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td> <!-- Nomor otomatis -->
                                                    <td>{{ $row->nama_kendaraan }}</td>
                                                    <td>{{ $row->desc_kendaraan }}</td>
                                                    <td>{{ "Rp " . number_format($row->cost_kendaraan,2,',','.') }}</td>
                                                    <td class="text-center">
                                                        <form id="delete-form-{{ $row->kode_kendaraan }}" action="{{ route('kendaraan.destroy', $row->kode_kendaraan) }}" method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                        <a href="{{ route('kendaraan.show', $row->kode_kendaraan) }}" class="btn btn-sm btn-secondary"> <i class='far fa-eye'></i> </a>
                                                        <a href="{{ route('kendaraan.edit', $row->kode_kendaraan) }}" class="btn btn-sm btn-warning"> <i class='fas fa-edit'> </i></a>
                                                        <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $row->kode_kendaraan }})"> <i class='fas fa-trash-alt'></i> </button>
                                                    </td>
                                                </tr>
                                            @empty
                                                <div class="alert alert-danger">
                                                    Data kendaraan belum Tersedia.
                                                </div>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    <br>
                                        {{ $kendaraans->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <script>
                    $(document).ready(function() {
                        $('#kendaraanTable').DataTable();
                    });

                </script>

                </div>
            </div>
        </div>
    </div>
</div>



@endsection
