<div class="container-fluid p-0 text-center">
    <h1 class="h3 mb-3">Selamat Datang <strong>{{ $user->username }}</strong></h1>
</div>
<div class="container-fluid p-0">
    <h1 class="h3 mb-3"><strong>Dashboard Admin</strong></h1>
    <div class="row">
        <div class="col-6">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">Jumlah Data Pesanan</h5>
                </div>
                <div class="card-body py-3">
                    <h2>{{ $jumlahPesanan }}</h2>
                </div>
            </div>
        </div>
        @if($user->role == 1)
        <div class="col-6">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">Jumlah Data Layanan</h5>
                </div>
                <div class="card-body py-3">
                    <h2>{{ $jumlahLayanan }}</h2>
                </div>
            </div>
        </div>
    </div>
    @endif
    @if($user->role == 1)
    <div class="row">
        <div class="col-6">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">Jumlah Data User</h5>
                </div>
                <div class="card-body py-3">
                    <h2>{{ $jumlahUser }}</h2>
                </div>
            </div>
        </div>
        @endif
        <div class="col-6">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">Jumlah Data Riwayat</h5>
                </div>
                <div class="card-body py-3">
                    <h2>{{ $jumlahRiwayat }}</h2>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-title text-center mt-3">
                    <h5 class="mb-0">Pesanan Terkini</h5>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered nowrap table-hover" id="example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Layanan</th>
                                <th>Pelanggan</th>
                                <th>Admin</th>
                                <th>Teknisi</th>
                                <th>Tanggal Pesanan Masuk</th>
                                <th>Tanggal Pesanan Selesai</th>
                                <th>Status</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pesanan as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item['DataLayanan']['layanan'] }}</td>
                                <td>{{ $item['UserPelanggan']['username'] }}</td>
                                <td>
                                    @if(empty($item['id_admin']))
                                    <span class="text-danger">Data Kosong</span>
                                    @else
                                    {{ $item['UserAdmin']['username'] }}
                                    @endif
                                </td>
                                <td>
                                    @if(empty($item['id_teknisi']))
                                    <span class="text-danger">Data Kosong</span>
                                    @else
                                    {{ $item['UserTeknisi']['username'] }}
                                    @endif
                                </td>
                                <td>{{ $item['tgl_pesan_awal'] }}</td>
                                <td>
                                    @if(empty($item['tgl_pesan_selesai']))
                                    <span class="text-danger">Data Kosong</span>
                                    @else
                                    {{ $item['tgl_pesan_selesai'] }}
                                    @endif
                                </td>
                                <td>
                                    @if($item['status'] == 0)
                                    <span class="text-info">Menunggu Konfirmasi</span>
                                    @elseif($item['status'] == 1)
                                    <span class="text-warning">Proses Pesanan</span>
                                    @elseif($item['status'] == 2)
                                    <span class="text-warning">Proses Pengerjaan</span>
                                    @elseif($item['status'] == 3)
                                    <span class="text-success">Pesanan Selesai</span>
                                    @elseif($item['status'] == 4)
                                    <span class="text-danger">Pesanan dibatalkan</span>
                                    @else
                                    <span class="text-muted">Status Tidak Diketahui</span>
                                    @endif
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#exampleModal1{{ $item['id'] }}">
                                        <i class="bi bi-eye-fill"></i>
                                    </button>
                                    <div class="modal fade" id="exampleModal1{{ $item['id'] }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Detail Riwayat</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label class="form-label">Masalah</label>
                                                        <input class="form-control form-control-lg"
                                                            value="{{ $item['masalah'] }}" readonly />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Alamat</label>
                                                        <input class="form-control form-control-lg"
                                                            value="{{ $item['alamat'] }}" readonly />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">No. Telp</label>
                                                        <input class="form-control form-control-lg"
                                                            value="{{ $item['UserPelanggan']['no_telp']}}" readonly />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Deskripsi</label>
                                                        @if(empty($item['deskripsi']))
                                                        <input class="form-control form-control-lg text-danger"
                                                            value="Data belum ada" readonly />
                                                        @else
                                                        <input class="form-control form-control-lg"
                                                            value="{{ $item['deskripsi'] }}" readonly />
                                                        @endif
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Harga Jasa</label>
                                                        @if(empty($item['harga_jasa']))
                                                        <input class="form-control form-control-lg" value="RP. 0"
                                                            readonly />
                                                        @else
                                                        <input class="form-control form-control-lg"
                                                            value="{{ $item['harga_jasa'] }}" readonly />
                                                        @endif
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Harga Alat</label>
                                                        @if(empty($item['harga_alat']))
                                                        <input class="form-control form-control-lg" value="RP. 0"
                                                            readonly />
                                                        @else
                                                        <input class="form-control form-control-lg"
                                                            value="{{ $item['harga_alat'] }}" readonly />
                                                        @endif
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Total Harga</label>
                                                        @php
                                                        $total_harga = $item['harga_jasa'] + $item['harga_alat'];
                                                        @endphp
                                                        <input class="form-control form-control-lg"
                                                            value="RP. {{ number_format($total_harga, 0, ',', '.') }}"
                                                            readonly />
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
