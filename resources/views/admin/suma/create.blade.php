@extends('admin.templates.default')
@section('content')

    <div class="row">
        <div class="col-6">
            <div class="card mb-4">
                <div class="card-header px-7 pb-0">
                    <h5>Surat Masuk</h5>

                </div>
                <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body px-7 pt-3 pb-2">
                        <div class="form-group @error('pengirim') has-error @enderror">
                            <label for=" exampleFormControlInput1">Pengirim</label>
                            <input type="text" class="form-control" name="pengirim" placeholder="pengirim">
                            @error('pengirim')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group @error('no') has-error @enderror">
                            <label for=" exampleFormControlInput2">No surat</label>
                            <input type="text" class="form-control" name="no" placeholder="no">
                            @error('no')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group @error('ringkasan') has-error @enderror">
                            <label for=" exampleFormControlInput3">Ringkasan</label>
                            <input type="text" class="form-control" name="ringkasan" placeholder="ringkasan">
                            @error('ringkasan')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group @error('tujuan') has-error @enderror">
                            <label for=" exampleFormControlSelect4">Tujuan</label>
                            <select class="form-control" name="tujuan">
                                <option>Pilih</option>
                                <option>Pak camat</option>
                                <option>Pak sekcam</option>
                                <option>Kasi Pem</option>
                                <option>Kasi PMD</option>
                                <option>Umum</option>
                            </select>
                            @error('tujuan')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group @error('ket') has-error @enderror">
                            <label for=" exampleFormControlInput5">Keterangan</label>
                            <input type="text" class="form-control" name="ket" placeholder="keterangan">
                            @error('ket')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group @error('created_at') has-error @enderror">
                            <label for=" exampleFormControlInput5">Tanggal</label>
                            <input type="date" class="form-control" name="created_at" placeholder="Tanggal">
                            @error('created_at')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group @error('fsuma') has-error @enderror">
                            <label for="exampleFormControlInput6">File</label>
                            <input type="file" class="form-control" name="fsuma" id="fsuma">
                            @error('fsuma')
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
