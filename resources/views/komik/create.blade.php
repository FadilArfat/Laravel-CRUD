@extends('layout')

@section('content')
<div class="row m-3">
    <div class="col-md-2">
        <h3>Data Komik</h3>
    </div>
    <div class="col">
        <a href="{{ route('komik.index') }}" class="btn btn-primary">Kembali</a>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('komik.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <strong>Nama:</strong>
        <input type="text" name="name" class="form-control">
    </div>
    <div class="form-group">
        <strong>Deatil:</strong>
        <textarea name="detail" id="detail" style="height: 150px" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-primary my-2">Tambah Data</button>
</form>

@endsection