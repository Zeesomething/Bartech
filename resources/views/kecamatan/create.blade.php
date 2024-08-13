    @extends('layouts.admin')
    @section('content')
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Kecamatan /</span> Add</h4>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col">
                                <div class="card">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    {{ $error }}
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="card-body">
                                        <form action="{{ route('kecamatan.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="form-label">Nama Kecamatan</label>
                                                <input type="text" class="form-control" name="nama_kecamatan">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Kabupaten</label>
                                                <select name="id_kabupaten" class="form-control">
                                                    <option value=""></option>
                                                    @foreach ($kabupaten as $data)
                                                        <option value="{{ $data->id }}">
                                                            {{ $data->nama_kabupaten }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                <a href="{{ url('kecamatan') }}" class="btn btn-danger">Kembali</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
        