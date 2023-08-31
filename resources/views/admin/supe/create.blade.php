@extends('admin.templates.default')
@section('content')

    <div class="row">
        <div class="col-6">
            <div class="card mb-4">
                <div class="card-header px-7 pb-0">
                    <h5>Surat perintah tugas</h5>

                </div>
                <form action="{{ route('admin.store4') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body px-7 pt-3 pb-2">
                        <div class="form-group @error('nama') has-error @enderror">
                            <label for=" exampleFormControlInput2">Nama</label>
                            <input type="text" class="form-control" name="nama" placeholder="nama">
                            @error('nama')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group @error('jabatan') has-error @enderror">
                            <label for=" exampleFormControlSelect4">Jabatan</label>
                            <select class="form-control" name="jabatan">
                                <option>Pilih</option>
                                <option>Pak camat</option>
                                <option>Pak sekcam</option>
                                <option>Kasi Pem</option>
                                <option>Kasi PMD</option>

                            </select>
                            @error('jabatan')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group @error('tempat') has-error @enderror">
                            <label for=" exampleFormControlInput2">Tempat tujuan</label>
                            <input type="text" class="form-control" name="tempat" placeholder="tempat">
                            @error('tempat')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group @error('maksud') has-error @enderror">
                            <label for=" exampleFormControlInput3">Maksud perjalanan</label>
                            <input type="text" class="form-control" name="maksud" placeholder="maksud">
                            @error('maksud')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group @error('lama') has-error @enderror">
                            <label for=" exampleFormControlInput3">lama</label>
                            <input type="text" class="form-control" name="lama" placeholder="lama">
                            @error('lama')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group @error('pergi') has-error @enderror">
                            <label for=" exampleFormControlInput5">Tanggal berangkat</label>
                            <input type="text" class="form-control" name="pergi" placeholder="Tanggal berangkat">
                            @error('pergi')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group @error('pulang') has-error @enderror">
                            <label for=" exampleFormControlInput5">Tanggal kembali</label>
                            <input type="text" class="form-control" name="pulang" placeholder="Tanggal Kembali">
                            @error('pulang')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group @error('fsupe') has-error @enderror">
                            <label for="exampleFormControlInput6">File</label>
                            <input type="file" class="form-control" name="fsupe" id="fsupe">
                            @error('fsupe')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Tambah" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
