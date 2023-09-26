@extends('layouts.theme')
@section('content')
<div class="container d-flex flex-column mt-2">
    <div class="row align-items-center justify-content-center g-0
        min-vh-100">
      <div class="col-12 col-md-8 col-lg-6 col-xxl-4 py-8 py-xl-0">
        <!-- Card -->
        <div class="card smooth-shadow-md">
          <!-- Card body -->
          <div class="card-body p-6">
            <div class="mb-4">
            <h1>FORM CREATE BARANG</h1>
              <p class="mb-6">Please enter your user information.</p>
            </div>
            <!-- Form -->
            <form method="POST" action="{{ route('store_item') }}">
            @csrf
              <!-- Username -->
              <div class="mb-3">
                <label for="lab" class="form-label">lab</label>
                <select name="lab" id="lab" class="form-select" aria-label="Default select example">
                  @foreach ($lab as $item)
                    <option value="{{ $item->id }}"> {{ $item->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="mb-3">
                <label for="name" class="form-label">name</label>
                <input type="text" id="name" class="form-control" name="name" placeholder="name address here" required="">
              </div>
              <div class="mb-3">
                <label for="jenis" class="form-label">jenis</label>
                <select name="jenis" id="jenis" class="form-select" aria-label="Default select example">
                  <option value="Habis Pakai">Habis Pakai</option>
                  <option value="Non Habis Pakai">Non Habis Pakai</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="stock" class="form-label">stock</label>
                <input type="number" id="stock" class="form-control" name="stock" placeholder="stock items here" required="">
              </div>

              <div>
                <!-- Button -->
                <div class="d-grid">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>


            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
