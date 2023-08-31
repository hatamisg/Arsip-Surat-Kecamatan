@extends('admin.templates.default')
@section('content')
    <div class="row">
        <div class="col-6">
            <div class="card mb-4">
                <div class="card-header px-7 pb-0">
                    <h5>Cetak laporan</h5>

                </div>
                <form action="{{ route('admin.csuma') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body px-7 pt-3 pb-2">
                        <div class="form-group ">
                            <label for="from">Tanggal awal</label>
                            <input type="date" value="{{ date('Y-m-d') }}" class="form-control" id="from" name="from"
                                placeholder="Tanggal awal">
                        </div>
                        <div class="form-group ">
                            <label for="to">Tanggal Akhir</label>
                            <input type="date" value="{{ date('Y-m-d') }}" class="form-control" id="to" name="to"
                                placeholder="Tanggal akhir">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="exportPDF" target="_blank" value="Cetak" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
