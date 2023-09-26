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
            <h1>FORM CREATE ADMIN</h1>
              <p class="mb-6">Please enter your user information.</p>
            </div>
            <!-- Form -->
            <form method="POST" action="{{ route('store_admin') }}">
            @csrf
              <!-- Username -->
              <div class="mb-3">
                <label for="name" class="form-label">name</label>
                <input type="text" id="name" class="form-control" name="name" placeholder="name address here" required="">
              </div>
              <div class="mb-3">
                <label for="username" class="form-label">username</label>
                <input type="text" id="username" class="form-control" name="username" placeholder="username here" required="">
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">email</label>
                <input type="email" id="email" class="form-control" name="email" placeholder="email here" required="">
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">password</label>
                <input type="password" id="password" class="form-control" name="password" placeholder="password address here" required="">
              </div>

              <div class="mb-3">
                <label for="lab" class="form-label">lab</label>
                <select name="lab" id="lab" class="form-select" aria-label="Default select example">
                  @foreach ($Lab as $item)
                    <option value="{{ $item->id }}"> {{ $item->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="mb-3">
                <label for="jabatan" class="form-label">jabatan</label>
                <select name="jabatan" id="jabatan" class="form-select" aria-label="Default select example">
                  <option value="admin">Admin</option>
                  <option value="ketua admin">KALAB</option>
                </select>
                {{-- <input type="text" id="jabatan" class="form-control" name="jabatan" placeholder="jabatan address here" required=""> --}}
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
