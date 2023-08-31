@extends('admin.templates.default')
@section('content')

    <div class="row">
        <div class="col-6">
            <div class="card mb-4">
                <div class="card-header px-7 pb-0">
                    <h5>Buku Register SK</h5>

                </div>
                <form action="{{ route('admin.store5') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body px-7 pt-3 pb-2">
                        <div class="form-group @error('noreg') has-error @enderror">
                            <label for=" exampleFormControlInput2">Nomor Register SK</label>
                            <input type="text" class="form-control" name="noreg" placeholder="Nomor Register SK">
                            @error('noreg')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group @error('uraian') has-error @enderror">
                            <label for=" exampleFormControlInput3">Uraian</label>
                            <input type="text" class="form-control" name="uraian" placeholder="uraian">
                            @error('uraian')
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
                        <div class="form-group @error('fsuka') has-error @enderror">
                            <label for="exampleFormControlInput6">File</label>
                            <input type="file" class="form-control" name="fsuka" id="fsuka">
                            @error('fsuka')
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
