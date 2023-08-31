<div class="col-md-12 text-left">
    <button onclick="window.location.href='{{ route('admin.surat2', $model) }}'"
        class="btn btn-outline-info btn-sm mb-1">&nbsp;&nbsp;lihat&nbsp;</button>
    <button onclick="window.location.href='{{ asset('surat/sukel/' . $model->fsukel) }}'"
        class="btn btn bg-gradient-success btn-sm mb-0">unduh</button>
</div>
