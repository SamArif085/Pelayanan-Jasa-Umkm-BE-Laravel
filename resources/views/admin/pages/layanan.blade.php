@if($user->role == 1)
<div class="container-fluid p-0">
    <h1 class="h3 mb-3 text-center">Layanan <strong>{{ $user->username }}</strong></h1>
    <div class="mb-3">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Tambah
        </button>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Tambah Layanan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('submit-layanan-web-tambah') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Layanan</label>
                                <input class="form-control form-control-lg" name="layanan" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Deskripsi</label>
                                <input class="form-control form-control-lg" name="deskripsi" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Gambar</label>
                                <input class="form-control form-control-lg" type="file" name="gambar" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama Teknisi</label>
                                <select name="id_teknisi" id="basic-usage" data-placeholder="Pilih Teknisi"
                                    class="form-select" data-allow-clear="true" required>
                                    <option value="">Pilih Teknisi</option>
                                    @foreach ($getTeknisi as $teknisi)
                                    <option value="{{ $teknisi['id'] }}">
                                        {{ $teknisi['username'] }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-bordered nowrap table-hover" id="example">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th>Layanan</th>
                        <th>Deskripsi</th>
                        <th>Gambar</th>
                        <th>Teknisi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($getLayanan as $key => $item)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $item['layanan'] }}</td>
                        <td>{{ $item['deskripsi'] }}</td>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModal1{{ $item['id'] }}">
                                <i class="bi bi-eye-fill"></i>
                            </button>
                            <div class="modal fade" id="exampleModal1{{ $item['id'] }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Detail Gambar</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <img class="img-fluid" src="{{ asset($item['gambar']) }}" alt=""
                                                width="100%">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>{{ $item['UserTeknisi']['username'] }}</td>
                        <td>
                            <button type="button" class="btn btn-warning" data-toggle="modal"
                                data-target="#exampleModal3{{ $item['id'] }}">
                                Edit
                            </button>
                            <div class="modal fade" id="exampleModal3{{ $item['id'] }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Form Edit Layanan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="formUpdateLayanan" method="POST"
                                                action="{{ route('submit-layanan-web-update') }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" id="id" name="id" value="{{ $item['id'] }}">
                                                <div class="mb-3">
                                                    <label class="form-label">Layanan</label>
                                                    <input class="form-control form-control-lg" id="layananUpdate"
                                                        value="{{ $item['layanan'] }}" name="layanan" />
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Deskripsi</label>
                                                    <input class="form-control form-control-lg" id="deskripsiUpdate"
                                                        value="{{ $item['deskripsi'] }}" name="deskripsi" />
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Gambar</label>
                                                    <div class="current-image mb-2">
                                                        <img src="{{ asset($item['gambar']) }}" alt="Current Image"
                                                            style="max-width: 200px;" />
                                                    </div>
                                                    <input class="form-control form-control-lg" type="file"
                                                        id="gambarUpdate" name="gambar" />
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Nama Teknisi</label>
                                                    <select id="id_teknisiUpdate" name="id_teknisi" class="form-select">
                                                        <option value="">Pilih Teknisi</option>
                                                        @foreach ($getTeknisi as $teknisi)
                                                        <option value="{{ $teknisi['id'] }}" {{
                                                            $teknisi['id']==$item['teknisi'] ? 'selected' : '' }}>
                                                            {{ $teknisi['username'] }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </form>
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
@endif

@if($user->role == 3)
<div class="container-fluid p-0">
    <h1 class="h3 mb-3"><strong>Layanan Jasa</strong></h1>
    <div class="row mb-3" id="layanan">
        @forelse ($getLayanan as $key => $item)
        @if ($key % 4 == 0)
    </div>
    <div class="row mb-3" id="layanan">
        @endif
        <div class="col-md-3">
            <div class="card" style="width: 18rem">
                <div class="img-container">
                    <img alt="Gambar" src="{{ asset($item['gambar']) }}" class="card-img-top fixed-size">
                </div>
                <div class="card-body">
                    <h5 class="card-title">Servis {{ $item['layanan'] }}</h5>
                    <p class="card-text">
                        {{ $item['deskripsi'] }}
                    </p>
                </div>
            </div>
        </div>
        @empty
        <div class="col-md-3">
            <div class="card" style="width: 18rem">
                <div class="card-body">
                    <h5 class="card-title">Data Kosong</h5>
                    <p class="card-text">Tidak ada data yang tersedia.</p>
                </div>
            </div>
        </div>
        @endforelse
    </div>
</div>
@endif
