@extends('layouts.theme')
@section('content')
    <div class="bg-primary pt-10 pb-21"></div>
    <div class="container-fluid mt-n22 px-6">
        <div class="col-lg-12 col-md-12 col-12 my-2">
            <!-- Page header -->
            <div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="mb-2 mb-lg-0">
                        <h3 class="mb-0  text-white">Data Admin</h3>
                    </div>
                    <a href="{{ route('create_admin') }}">
                        <button class="btn btn-success btn-sm">Create New Admin</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-12">
            <!-- card  -->
            <div class="card">
                <!-- table  -->
                <div class="table-responsive">
                    <table class="table text-nowrap mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Jabatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Admin as $item)
                            <tr>
                                <td class="align-middle">
                                {{ $item->name }}
                                </td>
                                <td class="align-middle">{{ $item->email }}</td>
                                <td class="align-middle"><span class="badge bg-primary">{{ $item->admin->jabatan ?? '' }}</span></td>
                                <td class="align-middle d-flex">
                                    <a href="{{ route('edit_admin', ['id' => $item->id])}}">
                                        <button class="btn btn-warning text-white btn-sm mx-1">update</button>
                                    </a>
                                    <form method="POST" action="{{ route('delete_admin', ['id' => $item->id])}}">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger btn-sm">delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- card footer  -->
                <div class="card-footer bg-white text-center">
                    <a href="#" class="link-primary">View All Projects</a>
                </div>
            </div>
        </div>
    </div>
@endsection
