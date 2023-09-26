@extends('layouts.theme')
@section('content')
    <div class="bg-primary pt-10 pb-21"></div>
    <div class="container-fluid mt-n22 px-6">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <!-- Page header -->
                <div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="mb-2 mb-lg-0">
                            <h3 class="mb-0  text-white">Projects</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
                <!-- card -->
                <div class="card ">
                    <!-- card body -->
                    <div class="card-body">
                        <!-- heading -->
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <h4 class="mb-0">Total Item <br/> Sedang Dipinjam</h4>
                            </div>
                            <div class="icon-shape icon-md bg-light-primary text-primary rounded-2">
                                <i class="bi bi-briefcase fs-4"></i>
                            </div>
                        </div>
                        <!-- project number -->
                        <div>
                            <h1 class="fw-bold">{{ $items_sedang_dipinjam }}</h1>
                            <p class="mb-0"><span class="text-dark me-2"></span>Completed</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
                <!-- card -->
                <div class="card ">
                    <!-- card body -->
                    <div class="card-body">
                        <!-- heading -->
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <h4 class="mb-0">Total Barang Tersedia</h4>
                            </div>
                            <div class="icon-shape icon-md bg-light-primary text-primary rounded-2">
                                <i class="bi bi-list-task fs-4"></i>
                            </div>
                        </div>
                        <!-- project number -->
                        <div>
                            <h1 class="fw-bold">{{ $total_items }}</h1>
                            <p class="mb-0"><span class="text-dark me-2"></span>Completed</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
                <!-- card -->
                <div class="card ">
                    <!-- card body -->
                    <div class="card-body">
                        <!-- heading -->
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <h4 class="mb-0">Admin (LAB)</h4>
                            </div>
                            <div class="icon-shape icon-md bg-light-primary text-primary rounded-2">
                                <i class="bi bi-people fs-4"></i>
                            </div>
                        </div>
                        <!-- project number -->
                        <div>
                            <h1 class="fw-bold">{{ $total_admin }}</h1>
                            <p class="mb-0"><span class="text-dark me-2"></span>Completed</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
                <!-- card -->
                <div class="card ">
                    <!-- card body -->
                    <div class="card-body">
                        <!-- heading -->
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <h4 class="mb-0">Productivity</h4>
                            </div>
                            <div class="icon-shape icon-md bg-light-primary text-primary rounded-2">
                                <i class="bi bi-bullseye fs-4"></i>
                            </div>
                        </div>
                        <!-- project number -->
                        <div>
                            <h1 class="fw-bold">76%</h1>
                            <p class="mb-0"><span class="text-success me-2"></span>Completed</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- row  -->
        <div class="row mt-6">
            <div class="col-md-12 col-12">
                <!-- card  -->
                <div class="card">
                    <!-- card header  -->
                    <div class="card-header bg-white  py-4">
                        <h4 class="mb-0">Pemohonan Peminjaman</h4>
                    </div>
                    <!-- table  -->
                    <div class="table-responsive">
                        <table class="table text-nowrap mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Waktu</th>
                                    <th>Jenis</th>
                                    <th>Mahasiswa</th>
                                    <th>Progres</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td class="align-middle">
                                            <h3>
                                                {{ $item->item->name }}
                                            </h3>
                                        </td>
                                        <td class="align-middle">{{ $item->created_at }}</td>
                                        <td class="align-middle">
                                            @if ($item->item->type == 'Non Habis Pakai')
                                                <button
                                                    class="btn btn-outline-danger btn-sm">{{ $item->item->type }}</button>
                                            @else
                                                <button
                                                    class="btn btn-outline-primary btn-sm">{{ $item->item->type }}</button>
                                            @endif
                                        </td>
                                        <td class="align-middle">{{ $item->user->name }}</td>
                                        <td class="align-middle">
                                            @if ($item->status == 'accept')
                                                <button class="btn btn-info btn-sm text-white">
                                                    sedang dipinjam
                                                </button>
                                            @elseif ($item->status == 'deny')
                                                <button class="btn btn-danger btn-sm">
                                                    ditolak
                                                </button>
                                            @else
                                                <button class="btn btn-warning btn-sm text-white">
                                                    sedang di proses
                                                </button>
                                            @endif
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
    </div>
@endsection
