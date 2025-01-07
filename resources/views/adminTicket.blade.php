@extends('layouts.admin_app')
 
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('CRUD Ticket') }}</div>

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
                                        <a href="/admin/ticket/create" class="btn btn-md btn-primary mb-3"><i class='fas fa-plus'></i> Add</a> 
                                        <a href="/admin/ticket" class="btn btn-md btn-outline-dark mb-3"><i class='fa fa-refresh'></i></a>
                                        <table id="ticketTable" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">No.</th>
                                                <th scope="col">Kode.Ticket</th>
                                                <th scope="col">Customer</th>
                                                <th scope="col">Tujuan</th>
                                                <th scope="col">Kendaraan</th>
                                                <th scope="col">Status Ticket</th>
                                                <th scope="col" style="width: 20%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($tickets as $row)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td> <!-- Nomor otomatis -->
                                                    <td>{{ $row->kode_ticket }}</td>
                                                    <td>{{ $row->user->name }}</td>
                                                    <td>{{ $row->tujuan->nama_tujuan }}</td>
                                                    <td>{{ $row->kendaraan->nama_kendaraan }}</td>
                                                    <td>{{ $row->status_ticket }}</td>
                                                    <td class="text-center">
                                                        
                                                        @if ($row->status_ticket == 'Menunggu Pembayaran')
                                                            <a href="{{ route('ticket.show', $row->kode_ticket) }}" class="btn btn-sm btn-secondary"> <i class='far fa-eye'></i> </a>
                                                            <a href="{{ route('ticket.confirm', $row->kode_ticket) }}" class="btn btn-sm btn-success"> <i class='far fa-check-circle'> </i></a>
                                                            <a href="{{ route('ticket.cancel', $row->kode_ticket) }}" class="btn btn-sm btn-danger"> <i class='far fa-times-circle'> </i></a>
                                                           
                                                            
                                                        @else
                                                        <a href="{{ route('ticket.show', $row->kode_ticket) }}" class="btn btn-sm btn-secondary"> <i class='far fa-eye'></i> </a>

                                                        @endif
                                                    </td>
                                                </tr>
                                            @empty
                                                <div class="alert alert-danger">
                                                    Data ticket belum Tersedia.
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
                        $('#ticketTable').DataTable();
                    });

                </script>

                </div>
            </div>
        </div>
    </div>
</div>



@endsection
