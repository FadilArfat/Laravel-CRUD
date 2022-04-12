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

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $komik->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Details:</strong>
            {{ $komik->detail }}
        </div>
    </div>
</div>
@endsection