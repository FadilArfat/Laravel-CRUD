@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6 text-center">
            <h1>Data Orang</h1>
        </div>   
    </div>

    <div class="row">
        <div class="col">
            <a href="{{ route('komik.create') }}" class="btn btn-primary my-2">Tambah Data</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Success!</strong> <p>{{ $message }}</p>
          </div>
    @endif

    <div id="komikTable">
        <table class="table table-active">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Detail</th>
                    <th width="280px">Aksi</th>
                </tr>
            </thead>
            
            @foreach ($komiks as $komik)
            <tbody>
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $komik->name }}</td>
                    <td>{{ $komik->detail }}</td>
                    <td class="text-center">
                        <form action="{{ route('komik.destroy', $komik->id) }}" method="POST">
                            <a href="{{ route('komik.show', $komik->id) }}" class="btn btn-success">Lihat</a>
                            <a href="{{ route('komik.edit', $komik->id) }}" class="btn btn-info">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Hapus</button>           
                        </form>
                    </td>
                </tr>
            </tbody>
            
            @endforeach
        </table>
    </div>
    
    {!! $komiks->links() !!}

@endsection