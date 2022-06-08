@extends('main')

@section('title', 'Student')

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Student</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Student</a></li>
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
                        <strong>Data Student</strong>
                    </div>
                    <div class="pull-right">
                        <a href="{{ url('add-student') }}" class="btn btn-success btn-sm">
                            <i class="fa fa-plus"></i> Add
                        </a>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Course</th>
                                <th>Image</th>
                                <th>Edit</th>
                                <th>Delete GET</th>
                                <th>Delete Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($student as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->course }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/students/' . $item->profile_image) }}" width="70px"
                                            height="70px" alt="Image">
                                    </td>
                                    <td>
                                        <a href="{{ url('edit-student/' . $item->id) }}"
                                            class="btn btn-primary btn-sm">Edit</a>
                                    </td>
                                    <td>
                                        <a href="{{ url('delete-student/' . $item->id) }}" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin hapus data?')">Delete</a>
                                    </td>
                                    <td>
                                        <form action="{{ url('delete-student/' . $item->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin hapus data?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        {{-- <tbody>
                            @if ($programs->count() > 0)
                                @foreach ($programs as $key => $item)
                                    <tr>
                                        <td>{{ $programs->firstItem() + $key }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->edulevel->name }}</td>
                                        <td class="text-center">
                                            <a href="{{ url('programs/' . $item->id) }}" class="btn btn-warning btn-sm">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{ url('programs/' . $item->id . '/edit') }}"
                                                class="btn btn-primary btn-sm">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <form action="{{ url('programs/' . $item->id) }}" method="post"
                                                class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" class="text-center">Data kosong</td>
                                </tr>
                            @endif
                        </tbody> --}}
                    </table>
                    {{-- <div>
                        Showing
                        {{ $programs->firstItem() }}
                        of
                        {{ $programs->lastItem() }}
                    </div>
                    <div class="pull-right">
                        {{ $programs->links() }}
                    </div> --}}
                </div>
            </div>
        </div>

    </div>
@endsection
