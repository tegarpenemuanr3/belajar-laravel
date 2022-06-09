@extends('main')

@section('title', 'Anggota')

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Anggota</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Anggota</a></li>
                        <li class="active">Data</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="content mt-3">

        <div class="animated fadeIn">

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <div class="pull-left">
                        <strong>Data Anggota</strong>
                    </div>
                    <div class="pull-right">
                        <a href="{{ url('add-anggota') }}" class="btn btn-success btn-sm">
                            <i class="fa fa-plus"></i> Add
                        </a>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nama Pengguna</th>
                                <th>Hadiah</th>
                                <th width="1%">Jumlah</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($anggota as $a)
                                <tr>
                                    <td>{{ $a->nama }}</td>
                                    <td>
                                        <ol>
                                            @foreach ($a->hadiah as $h)
                                                <li> {{ $h->nama_hadiah }} </li>
                                            @endforeach
                                        </ol>
                                    </td>
                                    <td class="text-center">{{ $a->hadiah->count() }}</td>
                                    <td>
                                        <a href="{{ url('edit-anggota/' . $a->id) }}"
                                            class="btn btn-primary btn-sm">Edit</a>
                                        <a href="{{ url('delete-anggota/' . $a->id) }}" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin hapus data?')">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
