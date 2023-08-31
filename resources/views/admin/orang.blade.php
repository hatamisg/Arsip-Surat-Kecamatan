@extends('admin.templates.default')

@section('content')
    <div class="row">
        <div class="col-12 ">
            <div class="card mb-4">
                <div class="card-header px-7 pb-0">
                    <h5>User</h5>


                    <div class="col-md-12 text-right">
                        <button onclick="window.location.href='{{ route('admin.adduser') }}'"
                            class="btn btn bg-gradient-primary btn-sm mb-0">Tambah User</button>
                    </div>
                </div>




                <div class="card-body px-7 pt-3 pb-2">
                    <div class="table-responsive p-0">
                        <table id="dataTable">
                            <thead>

                                <tr>
                                    <th class="text-uppercase text-dark text-l font-weight-bolder  ">
                                        No
                                    </th>
                                    <th class="text-uppercase text-primary text-l font-weight-bolder opacity-8">
                                        Nama</th>
                                    <th class="text-uppercase text-primary text-l font-weight-bolder opacity-8">
                                        Email</th>
                                    <th class="text-uppercase text-primary text-left font-weight-bolder opacity-8">
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

    <script>
        $(function() {
            $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('admin.lihatorang') }}',
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'email'
                    },
                    {
                        data: 'aksi'
                    },

                ]

            });
        });

    </script>
@endpush
