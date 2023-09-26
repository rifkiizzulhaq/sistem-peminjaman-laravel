@extends('layouts.theme')
@section('content')
    <div class="bg-primary pt-10 pb-21"></div>
    <div class="container-fluid mt-n22 px-6">
        <div class="col-lg-12 col-md-12 col-12 my-2">
            <!-- Page header -->
            <div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="mb-2 mb-lg-0">
                        <h3 class="mb-0  text-white">Data Barang</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-12">
            <!-- card  -->
            <div class="card">
                <!-- card header  -->
                <div class="table-responsive">
                    <table class="table text-nowrap mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Lab</th>
                                <th>Nama</th>
                                <th>Jenis</th>
                                <th>Stock</th>
                                <th>Dipinjam</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data->item as $item)
                                <tr>
                                    <td class="align-middle">
                                        {{ $item->lab->name ?? '' }}
                                    </td>
                                    <td class="align-middle">{{ $item->name ?? '' }}</td>
                                    <td class="align-middle">{{ $item->type ?? '' }}</td>
                                    <td class="align-middle">{{ $item->stock ?? '' }}</td>
                                    <td class="align-middle">{{ $item->borrowed ?? '' }}</td>
                                    <td class="align-middle d-flex">
                                        <form method="POST" action="{{ route('addToCart', ['id' => $item->id]) }}">
                                            @csrf
                                            <button class="btn btn-success btn-sm">tambahkan ke peminjaman</button>
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
