@extends('admin.templates.default')
@section('content')

    <div class="row">
        <div class="col-6">
            <div class="card mb-4">
                <div class="card-header px-7 pb-0">
                    <h5>Edit Surat Masuk</h5>

                </div>
                <form action="{{ route('admin.update', $suma) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="card-body px-7 pt-3 pb-2">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Pengirim</label>
                            <input type="text" class="form-control" name="pengirim" placeholder="pengirim"
                                value="{{ $suma->pengirim }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput2">No surat</label>
                            <input type="text" class="form-control" name="no" placeholder="no" value="{{ $suma->no }}">
                        </div>
                        <div class=" form-group">
                            <label for="exampleFormControlInput3">Ringkasan</label>
                            <input type="text" class="form-control" name="ringkasan" placeholder="ringkasan"
                                value="{{ $suma->ringkasan }}">
                        </div>
                        <div class=" form-group">
                            <label for="exampleFormControlSelect1">Tujuan</label>
                            <select class="form-control" name="tujuan">
                                <option>{{ $suma->tujuan }}</option>
                                <option>Pak camat</option>
                                <option>Pak sekcam</option>
                                <option>Kasi Pem</option>
                                <option>Kasi PMD</option>
                                <option>Umum</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput4">Keterangan</label>
                            <input type="text" class="form-control" name="ket" placeholder="keterangan"
                                value="{{ $suma->ket }}">
                        </div>
                        <div class=" form-group">
                            <label for="exampleFormControlInput5">File</label>
                            <input type="file" class="form-control" name="fsuma" value="{{ old('fsuma') }}">
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
