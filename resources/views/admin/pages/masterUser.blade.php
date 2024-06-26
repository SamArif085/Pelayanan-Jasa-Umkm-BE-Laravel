<div class="container-fluid p-0">
    <div class="mb-3">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Tambah
        </button>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Tambah User Teknisi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="formUpdateLayanan" method="POST" action="{{ route('master-user-add-web') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input class="form-control form-control-lg" id="username" value="" name="username" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">No.Telp</label>
                                <input class="form-control form-control-lg" id="no_telp" value="" name="no_telp" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input class="form-control form-control-lg" id="password" type="password"
                                    name="password" />
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <table class="table table-striped table-bordered nowrap table-hover" id="example">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>No.Telp</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($getTeknisi as $key => $item)
            <tr>
                <th>{{ $loop->iteration }}</th>
                <td>{{ $item['name'] }}</td>
                <td>{{ $item['username'] }}</td>
                <td>{{ $item['no_telp'] }}</td>
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
                                        action="{{ route('master-user-update-web') }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" id="id" name="id" value="{{ $item['id'] }}">
                                        <div class="mb-3">
                                            <label class="form-label">Username</label>
                                            <input class="form-control form-control-lg" id="username"
                                                value="{{ $item['username'] }}" name="username" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">No.Telp</label>
                                            <input class="form-control form-control-lg" id="no_telp"
                                                value="{{ $item['no_telp'] }}" name="no_telp" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <input class="form-control form-control-lg" id="password" type="password"
                                                name="password" />
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
