@if(isset($user) && ($user->role == 1 || $user->role == 2))
<div class="container-fluid p-0">
    <h1 class="h3 mb-3 text-center"><strong>Pesanan Admin</strong></h1>
    <div class="row">
        <div class="col-12">
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
                                @if($user->role == 1)
                                <td>
                                    <button type="button" class="btn btn-warning" data-toggle="modal"
                                        data-target="#exampleModal{{ $item['id'] }}">
                                        Proses
                                    </button>
                                    <div class="modal fade" id="exampleModal{{ $item['id'] }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Form Proses</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="processForm{{ $item['id'] }}" method="POST"
                                                        action="{{ route('submit-pesanan-web-admin', ['id' => $item['id']]) }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="id_admin" value="{{ $user->id }}">
                                                        <div class="mb-3">
                                                            <label class="form-label">Nama Teknisi</label>
                                                            <select name="id_teknisi" id="basic-usage"
                                                                data-placeholder="Pilih Elektronik" class="form-select"
                                                                data-allow-clear="true">
                                                                <option value="">Pilih Teknisi</option>
                                                                @foreach ($getTeknisi as $item)
                                                                <option value="{{ $item['id'] }}">
                                                                    {{ $item['username'] }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Status</label>
                                                            <select class="form-select form-control-lg" name="status">
                                                                <option value="1" {{ $item['status']==1 ? 'selected'
                                                                    : '' }}>Proses Pesanan</option>
                                                                <option value="4" {{ $item['status']==4 ? 'selected'
                                                                    : '' }}>Pesanan dibatalkan</option>
                                                            </select>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save
                                                                changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                @endif
                                @if($user->role == 2)
                                <td>
                                    <button type="button" class="btn btn-warning" data-toggle="modal"
                                        data-target="#exampleModal{{ $item['id'] }}">
                                        Proses
                                    </button>
                                    <div class="modal fade" id="exampleModal{{ $item['id'] }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Form Proses</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="processForm{{ $item['id'] }}" method="POST"
                                                        action="{{ route('submit-pesanan-web-teknisi', ['id' => $item['id']]) }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="mb-3">
                                                            <label class="form-label">Status</label>
                                                            <select class="form-select form-control-lg" name="status">
                                                                <option value="2" {{ $item['status']==2 ? 'selected'
                                                                    : '' }}>Proses Pengerjaan</option>
                                                                <option value="3" {{ $item['status']==3 ? 'selected'
                                                                    : '' }}>Pengerjaan Selesai</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Deskripsi</label>
                                                            <input class="form-control form-control-lg" name="deskripsi"
                                                                value="{{ $item['deskripsi'] }}" />
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Tanggal Peanan Selesai</label>
                                                            <input class="form-control form-control-lg" type="date" name="tgl_pesan_selesai"
                                                                value="{{ $item['tgl_pesan_selesai'] }}" />
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Harga Jasa</label>
                                                            <input class="form-control form-control-lg"
                                                                name="harga_jasa" value="{{ $item['harga_jasa'] }}" />
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Harga Alat</label>
                                                            <input class="form-control form-control-lg"
                                                                name="harga_alat" value="{{ $item['harga_alat'] }}" />
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save
                                                                changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@if($user->role == 3)
<div class="container-fluid p-0">
    <h1 class="h3 mb-3"><strong>Pesan Servis Pelanggan</strong></h1>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form id="formPesanServis" method="POST" action="{{ route('submit-pesanan-web-user') }}">
                        @csrf
                        <input type="hidden" name="id_pelanggan" value="{{ Auth::user()->id }}">
                        <div class="mb-3">
                            <label class="form-label">Nama Elektronik</label>
                            <select name="layanan" id="basic-usage" data-placeholder="Pilih Elektronik"
                                class="form-select" data-allow-clear="true">
                                <option value="">Pilih Elektronik</option>
                                @foreach ($getElektronik as $item)
                                <option value="{{ $item['id'] }}">
                                    {{ $item['layanan'] }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Detail Masalah</label>
                            <textarea class="form-control" name="masalah" id="masalah" cols="30" rows="4"></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tanggal Servis</label>
                            <input class="form-control form-control-lg" type="date" name="tgl_pesan" id="tgl_pesan"
                                placeholder="Tanggal Servis" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Alamat pelanggan</label>
                            <input class="form-control form-control-lg" name="alamat" placeholder="Alamat pelanggan" />
                        </div>

                        <div class="mb-3 float-end">
                            <button type="button" id="btnPesan" class="btn btn-success">Pesan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endif


@section('script')
<script>
    $(document).ready(function () {
        $('#btnPesan').on('click', function () {
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda yakin ingin memesan layanan ini?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'OK',
                cancelButtonText: 'Batal'
            }).then(function (result) {
                if (result.isConfirmed) {
                    $('#formPesanServis').submit();
                }
            });
        });
    });

    let inputTanggal = document.getElementById('tgl_pesan');
    function getFormattedDate(date) {
        let year = date.getFullYear();
        let month = (date.getMonth() + 1).toString().padStart(2, '0');
        let day = date.getDate().toString().padStart(2, '0');
        return `${year}-${month}-${day}`;
    }
    inputTanggal.value = getFormattedDate(new Date());
</script>
@endsection
