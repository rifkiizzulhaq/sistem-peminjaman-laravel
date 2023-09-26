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
            <h1>FORM CREATE MAHASISWA</h1>
              <p class="mb-6">Please enter your user information.</p>
            </div>
            <!-- Form -->
            <form method="POST" action="{{ route('store_mahasiswa') }}">
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
                <label for="nim" class="form-label">nim</label>
                <input type="number" id="nim" class="form-control" name="nim" placeholder="nim address here" required="">
              </div>
              <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan</label>
                <select name="jurusan" id="jurusan" class="form-select" aria-label="Default select example" onchange="updateKelasOptions()">
                  <option value="TI">TI</option>
                  <option value="TPTU">TPTU</option>
                  <option value="TM">TM</option>
                  <option value="KP">KP</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="kelas" class="form-label">Kelas</label>
                <select name="kelas" id="kelas" class="form-select" aria-label="Default select example">
                  <!-- Opsi kelas akan diperbarui secara dinamis oleh JavaScript -->
                </select>
              </div>

              <script>
                function updateKelasOptions() {
                  var jurusanSelect = document.getElementById("jurusan");
                  var kelasSelect = document.getElementById("kelas");

                  // Menghapus semua opsi yang ada di select kelas
                  kelasSelect.innerHTML = "";

                  // Menambahkan opsi kelas sesuai dengan pilihan jurusan yang dipilih
                  if (jurusanSelect.value === "TI") {
                    kelasSelect.add(new Option("D3TI1A", "D3TI1A"));
                    kelasSelect.add(new Option("D3TI1B", "D3TI1B"));
                    kelasSelect.add(new Option("D3TI1C", "D3TI1C"));

                    kelasSelect.add(new Option("D3TI2A", "D3TI2A"));
                    kelasSelect.add(new Option("D3TI2B", "D3TI2B"));
                    kelasSelect.add(new Option("D3TI2C", "D3TI2C"));

                    kelasSelect.add(new Option("D3TI3A", "D3TI3A"));
                    kelasSelect.add(new Option("D3TI3B", "D3TI3B"));
                    kelasSelect.add(new Option("D3TI3C", "D3TI3C"));

                    kelasSelect.add(new Option("D4RPL1A", "D4RPL1A"));
                    kelasSelect.add(new Option("D4RPL1B", "D4RPL1B"));
                    kelasSelect.add(new Option("D4RPL1C", "D4RPL1C"));

                    kelasSelect.add(new Option("D4RPL2A", "D4RPL2A"));
                    kelasSelect.add(new Option("D4RPL2B", "D4RPL2B"));
                    kelasSelect.add(new Option("D4RPL2C", "D4RPL2C"));

                    kelasSelect.add(new Option("D4RPL3A", "D4RPL3A"));
                    kelasSelect.add(new Option("D4RPL3B", "D4RPL3B"));
                    kelasSelect.add(new Option("D4RPL3C", "D4RPL3C"));

                    kelasSelect.add(new Option("D4RPL4A", "D4RPL4A"));
                    kelasSelect.add(new Option("D4RPL4B", "D4RPL4B"));
                    kelasSelect.add(new Option("D4RPL4C", "D4RPL4C"));
                  } else if (jurusanSelect.value === "TPTU") {
                    kelasSelect.add(new Option("D3TP1A", "D3TP1A"));
                    kelasSelect.add(new Option("D3TP1B", "D3TP1B"));
                    kelasSelect.add(new Option("D3TP1C", "D3TP1C"));
                  } else if (jurusanSelect.value === "TM") {
                    kelasSelect.add(new Option("D3TM1A", "D3TM1A"));
                    kelasSelect.add(new Option("D3TM1B", "D3TM1B"));
                    kelasSelect.add(new Option("D3TM1C", "D3TM1C"));
                  } else if (jurusanSelect.value === "KP") {
                    kelasSelect.add(new Option("D3KP1A", "D3KP1A"));
                    kelasSelect.add(new Option("D3KP1B", "D3KP1B"));
                    kelasSelect.add(new Option("D3KP1C", "D3KP1C"));
                  }
                }

                updateKelasOptions();
              </script>

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
