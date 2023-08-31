@extends('admin.templates.default')
@section('content')

    <div class="row">
        <div class="col-6">
            <div class="card mb-4">
                <div class="card-header px-7 pb-0">
                    <h5>Surat Masuk</h5>

                </div>
                <form action="{{ route('admin.store3') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body px-7 pt-3 pb-2">
                        <div class="form-group @error('pertama') has-error @enderror">
                            <label for=" exampleFormControlInput2">Pihak pertama</label>
                            <input type="text" class="form-control" name="pertama" placeholder="Pihak pertama"
                                value="{{ old('pertama') }}">
                            @error('pertama')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group @error('kedua') has-error @enderror">
                            <label for=" exampleFormControlInput3">Pihak kedua</label>
                            <input type="text" class="form-control" name="kedua" placeholder="Pihak kedua">
                            @error('kedua')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group @error('status') has-error @enderror">
                            <label for=" exampleFormControlInput3">Status</label>
                            <input type="text" class="form-control" name="status" placeholder="Status">
                            @error('status')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group @error('harga') has-error @enderror">
                            <label for=" exampleFormControlInput3">harga</label>
                            <input type="text" class="form-control" name="harga" placeholder="harga">
                            @error('harga')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group @error('luas') has-error @enderror">
                            <label for=" exampleFormControlInput3">luas</label>
                            <input type="text" class="form-control" name="luas" placeholder="luas">
                            @error('luas')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group @error('batas') has-error @enderror">
                            <label for=" exampleFormControlInput3">batas</label>
                            <input type="text" class="form-control" name="batas" placeholder="batas">
                            @error('batas')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>



                        <div class="form-group @error('kel') has-error @enderror">
                            <label for=" exampleFormControlSelect4">kel</label>
                            <select class="form-control" name="kel">
                                <option>Pilih</option>
                                <option>Batupanjang</option>
                                <option>Terkul</option>
                                <option>Tanjung kapal</option>
                                <option>Kebumen</option>
                                <option>Pangkalan nyirih</option>
                            </select>
                            @error('kel')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group @error('fsuta') has-error @enderror">
                            <label for="exampleFormControlInput6">File</label>
                            <input type="file" class="form-control" name="fsuta" id="fsuta">
                            @error('fsuta')
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
