@extends('admin.templates.default')
@section('content')

    <div class="row">
        <div class="col-6">
            <div class="card mb-4">
                <div class="card-header px-7 pb-0">
                    <h5>Surat Masuk</h5>

                </div>
                <form action="{{ route('admin.add') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body px-7 pt-3 pb-2">
                        <div class="form-group @error('name') has-error @enderror">
                            <label for=" exampleFormControlInput1">name</label>
                            <input type="text" class="form-control" name="name" placeholder="name">
                            @error('name')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group @error('email') has-error @enderror">
                            <label for=" exampleFormControlInput2">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="email">
                            @error('email')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group @error('password') has-error @enderror">
                            <label for=" exampleFormControlInput3">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="password">
                            @error('password')
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
