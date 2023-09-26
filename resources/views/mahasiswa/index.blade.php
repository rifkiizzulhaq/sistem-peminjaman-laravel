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
                            <h3 class="mb-0  text-white">Items Lab</h3>
                        </div>
                        <div>
                        </div>
                    </div>
                </div>
            </div>
            @php
                use Illuminate\Support\Str;
            @endphp
            @foreach ($lab as $item)
                <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
                    <!-- card -->
            <a href="{{ route('lab.item', [ 'item' => Str::lower($item->name) ]) }}">
                    <div class="card ">
                        <!-- card body -->
                        <div class="card-body">
                            <!-- heading -->
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <h4 class="mb-0">{{ $item->name }}</h4>
                                </div>
                                <div class="icon-shape icon-md bg-light-primary text-primary rounded-2">
                                    <i class="bi bi-briefcase fs-4"></i>
                                </div>
                            </div>
                            <!-- project number -->
                            <div>
                                <h1 class="fw-bold">{{ $item->item_count }}</h1>
                                <p class="mb-0"><span class="text-dark me-2"></span>Items</p>
                            </div>
                        </div>
                    </div>
                  </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
