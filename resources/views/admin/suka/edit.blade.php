@extends('admin.templates.default')
@section('content')

    <div class="row">
        <div class="col-6">
            <div class="card mb-4">
                <div class="card-header px-7 pb-0">
                    <h5>Edit Surat SK</h5>

                </div>
                <form action="{{ route('admin.update5', $suka) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="card-body px-7 pt-3 pb-2">
                        <div class="form-group">
                            <label for=" exampleFormControlInput2">Nomor Register SK</label>
                            <input type="text" class="form-control" name="noreg" placeholder="Nomor Register SK"
                                value="{{ $suka->noreg }}">
                        </div>
                        <div class="form-group">
                            <label for=" exampleFormControlInput3">Uraian</label>
                            <input type="text" class="form-control" name="uraian" placeholder="uraian"
                                value="{{ $suka->uraian }}">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput4">Keterangan</label>
                            <input type="text" class="form-control" name="ket" placeholder="keterangan"
                                value="{{ $suka->ket }}">
                        </div>
                        <div class=" form-group">
                            <label for="exampleFormControlInput5">File</label>
                            <input type="file" class="form-control" name="fsuka" value="{{ old('fsuka') }}">
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
