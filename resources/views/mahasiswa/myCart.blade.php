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
            @foreach ($myCart as $item)
                <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
                    <!-- card -->
                    <div class="card ">
                        <!-- card body -->
                        <div class="card-body">
                            <!-- heading -->
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <h4 class="mb-0">Lab {{ $item->item->lab->name }}</h4>
                                </div>
                                <div class="icon-shape icon-md bg-light-primary text-primary rounded-2">
                                    <i class="bi bi-briefcase fs-4"></i>
                                </div>
                            </div>
                            <!-- project number -->
                            <div>
                                <h1 class="fw-bold">{{ $item->item->name }}</h1>
                                <div class="d-flex">
                                    <form method="POST"
                                        action="{{ route('add_my_cart', ['id' => $item->id]) }}">
                                        @csrf
                                        <button class="btn btn-primary btn-sm"> + </button>
                                    </form>
                                    <span class="text-dark mx-2"> {{ $item->quantity }} </span>
                                    <form method="POST"
                                        action="{{ route('destroy_my_cart', ['id' => $item->id]) }}">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger btn-sm">-</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @if (!$myCart->isEmpty())
            <form method="POST" action="{{ route('checkout') }}">
                @csrf
                <button class="btn btn-primary my-2"> Checkout </button>
            </form>
            @endif
        </div>
    </div>
@endsection
