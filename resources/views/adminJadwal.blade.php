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
 
                    <div class="container mt-5">
                        <div class="row">
                            <div class="col-md-12">
                                
                                <div class="card border-0">
                                    <div class="card-body">
                                        <a href="/admin/jadwal/create" class="btn btn-md btn-primary mb-3"><i class='fas fa-plus'></i> Add</a> 
                                        <a href="/admin/jadwal" class="btn btn-md btn-outline-dark mb-3"><i class='fa fa-refresh'></i></a>
                                        <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">No.</th>
                                                <th scope="col">Jam Berangkat</th>
                                                <th scope="col">Jam Tiba</th>
                                                <th scope="col">Deskripsi</th>
                                                <th scope="col" style="width: 20%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($jadwals as $row)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td> <!-- Nomor otomatis -->
                                                    <td>{{ $row->jam_berangkat }}</td>
                                                    <td>{{ $row->jam_tiba }}</td>
                                                    <td>{{ $row->desc_jadwal }}</td>
                                                   
                                                    <td class="text-center">
                                                        <form id="delete-form-{{ $row->kode_jadwal }}" action="{{ route('jadwal.destroy', $row->kode_jadwal) }}" method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                        <a href="{{ route('jadwal.show', $row->kode_jadwal) }}" class="btn btn-sm btn-secondary"> <i class='far fa-eye'></i> </a>
                                                        <a href="{{ route('jadwal.edit', $row->kode_jadwal) }}" class="btn btn-sm btn-warning"> <i class='fas fa-edit'> </i></a>
                                                        <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $row->kode_jadwal }})"> <i class='fas fa-trash-alt'></i> </button>
                                                    </td>
                                                </tr>
                                            @empty
                                                <div class="alert alert-danger">
                                                    Data jadwal belum Tersedia.
                                                </div>
                                            @endforelse
                                        </tbody>
                                    </table>
                                        {{ $jadwals->links() }}
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
