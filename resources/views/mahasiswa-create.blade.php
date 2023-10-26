@extends('layouts.layout')

@section('content')
    <section>
        <div class="container-lg my-5">
            <div class="text-center text-light">
                <h2>Tambah Mahasiswa Baru</h2>
            </div>

            <div class="row justify-content-center my-5 text-light">
                <div class="col-lg-6">
                    <form action="{{ route('mahasiswa.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        @error('nama')
                            <div class="text-danger mt-2"><i class="bi bi-exclamation-circle-fill"></i> {{ $message }}</div>
                        @enderror
                        <label for="nama" class="form-label">Nama:</label>
                        <div class="input-group mb-4">
                            <input type="text" class="form-control" id="nama" name="nama"
                                placeholder="Masukkan Nama Mahasiswa" required>
                        </div>

                        @error('nim')
                            <div class="text-danger mt-2"><i class="bi bi-exclamation-circle-fill"></i> {{ $message }}</div>
                        @enderror
                        <label for="nim" class="form-label">NIM:</label>
                        <div class="input-group mb-4">
                            <input type="text" class="form-control" id="nim" name="nim"
                                placeholder="Masukkan NIM Mahasiswa" required>
                        </div>

                        @error('angkatan')
                            <div class="text-danger mb-2"><i class="bi bi-exclamation-circle-fill"></i> {{ $message }}</div>
                        @enderror
                        <label for="angkatan" class="form-label">Angkatan:</label>
                        <div class="input-group mb-4">
                            <select class="form-select" name="angkatan" id="angkatan" required>
                                <option selected value="">-- Pilih Angkatan --</option>
                                @for ($i = 18; $i <= 23; $i++)
                                    <option value="20{{ $i }}">20{{ $i }}</option>
                                @endfor
                            </select>
                        </div>

                        @error('status')
                            <div class="text-danger mb-2"><i class="bi bi-exclamation-circle-fill"></i> {{ $message }}</div>
                        @enderror
                        <label for="status" class="form-label">Status:</label>
                        <div class="mb-4">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="active" name="status" value="active" checked>
                                <label class="form-check-label" for="active">Aktif</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="inactive" name="status"
                                    value="inactive">
                                <label class="form-check-label" for="inactive">Tidak aktif</label>
                            </div>
                        </div>

                        @error('email')
                            <div class="text-danger mt-2"><i class="bi bi-exclamation-circle-fill"></i> {{ $message }}</div>
                        @enderror
                        <label for="email" class="form-label">Email:</label>
                        <div class="input-group mb-4">
                            <input type="text" class="form-control" id="email" name="email"
                                placeholder="Generate Email Mahasiswa" required disabled>
                            <button type="button" class="btn btn-outline-warning"
                                onclick="generateEmail()">Generate</button>
                        </div>

                        @error('password')
                            <div class="text-danger mt-2"><i class="bi bi-exclamation-circle-fill"></i> {{ $message }}</div>
                        @enderror
                        <label for="password" class="form-label">Password:</label>
                        <div class="input-group mb-4">
                            <input type="text" class="form-control" id="password" name="password"
                                placeholder="Generate Password Mahasiswa" required disabled>
                            <button type="button" class="btn btn-outline-warning"
                                onclick="generatePassword()">Generate</button>
                        </div>

                        @error('nip')
                            <div class="text-danger mt-2"><i class="bi bi-exclamation-circle-fill"></i> {{ $message }}</div>
                        @enderror
                        <label for="nip" class="form-label">Nama Doswal:</label>
                        <div class="input-group mb-4">
                            <input type="text" class="form-control" id="nip" name="nip"
                                placeholder="Masukkan Nama Dosen Wali" required>
                        </div>

                        <div class="text-center my-5">
                            <button type="submit" class="btn btn-secondary">Tambah Data</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>

    </section>
@endsection

@section('script')
    <script>
        // Function to generate a random email
        function generateEmail() {
            var emailField = document.getElementById("email");
            var namaField = document.getElementById("nama");
            if (namaField.value) {
                emailField.value = namaField.value.replace(/\s/g, '') + '@example.com';
            }
        }

        // Function to generate a random password
        function generatePassword() {
            var passwordField = document.getElementById("password");
            passwordField.value = Math.random().toString(36).substring(2,
                10); // Generates an 8-character alphanumeric password
        }
    </script>
@endsection
