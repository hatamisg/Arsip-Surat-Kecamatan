@extends('admin.templates.default')

@section('content')
    <div class="row">
        <div class="col-12 ">
            <div class="card mb-4">
                <div class="card-header px-7 pb-0">
                    <h5>Buku Register SK</h5>

                    <div class="col-md-12 text-right">
                        <button onclick="window.location.href='{{ route('admin.create5') }}'"
                            class="btn btn bg-gradient-primary btn-sm mb-0">Tambah Buku Register SK</button>
                    </div>
                </div>
                <div class="card-header px-7 pb-0">
                    <h5>Export to: </h5>
                    <div class="col-md-12 text-right">
                        <button onclick="window.location.href='{{ route('admin.hsuka') }}'"
                            class="btn btn bg-gradient-primary btn-sm mb-0">Cetak Laporan</button>
                    </div>
                </div>


                <div class="card-body px-7 pt-3 pb-2">
                    <div class="table-responsive p-0">
                        <table id="dataTable">
                            <thead>

                                <tr>
                                    <th class="text-uppercase text-dark text-l font-weight-bolder  ">
                                        id
                                    </th>
                                    <th class="text-uppercase text-primary text-l font-weight-bolder opacity-8">
                                        Nomor Register SK</th>
                                    <th class="text-uppercase text-primary text-l font-weight-bolder opacity-8">
                                        Uraian</th>
                                    <th class="text-uppercase text-primary text-l font-weight-bolder opacity-8">
                                        Keterangan</th>
                                    <th class="text-righttext-uppercase text-primary font-weight-bolder opacity-8">
                                        Tanggal</th>
                                    <th class="noExport text-uppercase text-primary text-left font-weight-bolder opacity-8">
                                        Surat</th>
                                    <th class="noExport text-uppercase text-primary text-left font-weight-bolder opacity-8">
                                        Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
    <script>
        $(function() {
            $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('admin.joni5') }}',
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'noreg'
                    },
                    {
                        data: 'uraian'
                    },
                    {
                        data: 'ket'
                    },
                    {
                        data: 'created_at'
                    },
                    {
                        data: 'surat'
                    },
                    {
                        data: 'aksi'
                    },

                ],
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'excel',
                    title: 'Laporan surat keluar',
                    exportOptions: {
                        columns: "thead th:not(.noExport)"
                    }
                }],
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ]
            });
        });

    </script>
@endpush
