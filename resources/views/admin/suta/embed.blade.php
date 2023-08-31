@extends('admin.templates.default')
@section('content')
    <div class="row">
        <div class="col-12 ">
            <div class="card mb-4">
                <div class="card-header px-7 pb-0">

                    <h5>Pihak pertama: {{ $suta->pertama }}</h4>
                        <h5>Pihak kedua: {{ $suta->kedua }}</h4>
                            <h5>Tanggal: {{ $suta->created_at }}</h4>
                                <iframe src="{{ asset('surat/suta/' . $suta->fsuta) }}" type="application/pdf"
                                    width="100%" height="700px">
                                </iframe>
                </div>
            </div>
        </div>
    </div>
@endsection
