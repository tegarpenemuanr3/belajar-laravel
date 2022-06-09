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
                        <li class="active">Add</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="content mt-3">

        <div class="animated fadeIn">

            <div class="card">
                <div class="card-header">
                    <div class="pull-left">
                        <strong>Tambah Anggota</strong>
                    </div>
                    <div class="pull-right">
                        <a href="{{ url('anggota') }}" class="btn btn-secondary btn-sm">
                            <i class="fa fa-undo"></i> Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <form action="{{ url('anggota') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Anggota</label>
                                    <select name="anggota_id"
                                        class="form-control @error('anggota_id') is-invalid @enderror">
                                        <option value="">- Pilih -</option>
                                        @foreach ($anggota as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('anggota_id') == $item->id ? 'selected' : null }}>
                                                {{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('anggota_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Hadiah</label>
                                    <select name="hadiah_id" class="form-control @error('hadiah_id') is-invalid @enderror">
                                        <option value="">- Pilih -</option>
                                        @foreach ($hadiah as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('hadiah_id') == $item->id ? 'selected' : null }}>
                                                {{ $item->nama_hadiah }}</option>
                                        @endforeach
                                    </select>
                                    @error('hadiah_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-success">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
