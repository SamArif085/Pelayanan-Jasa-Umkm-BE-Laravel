<div class="container-fluid p-0">
    <h1 class="h3 mb-3 text-center">Riwayat <strong>{{ $user->username }}</strong></h1>
    <div class="card">
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
                        <th>Aksi</th>
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
                                                <input class="form-control form-control-lg" value="RP. 0" readonly />
                                                @else
                                                <input class="form-control form-control-lg"
                                                    value="{{ $item['harga_jasa'] }}" readonly />
                                                @endif
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Harga Alat</label>
                                                @if(empty($item['harga_alat']))
                                                <input class="form-control form-control-lg" value="RP. 0" readonly />
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
                        <td>
                            @if($item->status == 0)
                            <button type="button" class="btn btn-danger cancel-button"
                                data-id="{{ $item['id'] }}">Cancel</button>
                            @else
                            <center>
                                ✔️
                            </center>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
            const cancelButtons = document.querySelectorAll('.cancel-button');
            cancelButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    Swal.fire({
                        title: 'Apakah anda yakin membatalkan pesanan?',
                        text: "Anda tidak akan dapat mengembalikannya pesanan yang sudah dibatalkan!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'ok, untuk batalkan!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            fetch('{{ route('submit-pesanan-web-cancel') }}', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: JSON.stringify({
                                    id: id,
                                    status: 4
                                })
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    Swal.fire(
                                        'Dibatalkan!',
                                        'Pesanan Anda dibatalkan.',
                                        'success'
                                    ).then(() => {
                                        location.reload();
                                    });
                                } else {
                                    Swal.fire(
                                        'Error!',
                                        'There was an error cancelling your order.',
                                        'error'
                                    );
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                Swal.fire(
                                    'Error!',
                                    'There was an error cancelling your order.',
                                    'error'
                                );
                            });
                        }
                    });
                });
            });
        });
</script>
@endsection
