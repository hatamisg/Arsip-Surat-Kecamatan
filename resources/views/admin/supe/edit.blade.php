@extends('admin.templates.default')
@section('content')

    <div class="row">
        <div class="col-6">
            <div class="card mb-4">
                <div class="card-header px-7 pb-0">
                    <h5>Edit Surat Perintah tugas</h5>

                </div>
                <form action="{{ route('admin.update2', $supe) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="card-body px-7 pt-3 pb-2">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nama</label>
                            <input type="text" class="form-control" name="pengirim" placeholder="pengirim"
                                value="{{ $supe->nama }}">
                        </div>
                        <div class=" form-group">
                            <label for="exampleFormControlSelect1">Jabatan</label>
                            <select class="form-control" name="tujuan">
                                <option>{{ $supe->jabatan }}</option>
                                <option>Pak camat</option>
                                <option>Pak sekcam</option>
                                <option>Kasi Pem</option>
                                <option>Kasi PMD</option>
                                <option>Umum</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput2">Tempat tujuan</label>
                            <input type="text" class="form-control" name="no" placeholder="no"
                                value="{{ $supe->tempat }}">
                        </div>
                        <div class=" form-group">
                            <label for="exampleFormControlInput3">Maksud perjalanan</label>
                            <input type="text" class="form-control" name="ringkasan" placeholder="ringkasan"
                                value="{{ $supe->maksud }}">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput4">Lama perjalanan</label>
                            <input type="text" class="form-control" name="ket" placeholder="keterangan"
                                value="{{ $supe->lama }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput4">Tanggal berangkat</label>
                            <input type="text" class="form-control" name="ket" placeholder="keterangan"
                                value="{{ $supe->pergi }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput4">tanggal kembali</label>
                            <input type="text" class="form-control" name="ket" placeholder="keterangan"
                                value="{{ $supe->pulang }}">
                        </div>
                        <div class=" form-group">
                            <label for="exampleFormControlInput5">File</label>
                            <input type="file" class="form-control" name="fsukel" value="{{ old('fsupe') }}">
                        </div>
                        <div class=" form-group">
                            <input type="submit" value="Tambah" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
