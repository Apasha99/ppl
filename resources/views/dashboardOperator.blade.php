@extends('layouts.layout')

@section('content')
    <section>
        <div class="container-lg my-5">
            <div class="text-center text-light">
                <div class="display-6">Welcome, Operator</div>
            </div>

            <div class="row justify-content-center align-items-center gy-3 mt-5">
                <div class="col-lg-2 mx-2 bg-light border border-dark border-2 rounded">
                    <div class="d-flex justify-content-between pt-3 pe-2">
                        <p class="border border-dark border-1 rounded px-3">/100</p>
                        <h6 class="align-items-center"><i class="bi bi-people-fill"></i> User</h6>
                    </div>
                </div>
                <div class="col-lg-3 mx-2 bg-light border border-dark border-2 rounded">
                    <div class="d-flex justify-content-between pt-3 pe-2">
                        <p class="border border-dark border-1 rounded px-3">/100</p>
                        <h6 class="align-items-center"><i class="bi bi-building-fill"></i> Departemen</h6>
                    </div>
                </div>
                <div class="col-lg-3 mx-2 bg-light border border-dark border-2 rounded">
                    <div class="d-flex justify-content-between pt-3 pe-2">
                        <p class="border border-dark border-1 rounded px-3">/100</p>
                        <h6 class="align-items-center"><i class="bi bi-mortarboard-fill"></i> Dosen Wali</h6>
                    </div>
                </div>
                <div class="col-lg-3 mx-2 bg-light border border-dark border-2 rounded">
                    <div class="d-flex justify-content-between pt-3 pe-2">
                        <p class="border border-dark border-1 rounded px-3">/100</p>
                        <h6 class="align-items-center"><i class="bi bi-backpack-fill"></i> Mahasiswa</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-light rounded">
        <div class="text-center my-5 pt-5">
            <h1 class="display-6">Daftar Mahasiswa</h2>
        </div>

        <div class="container-lg mt-5 pb-5">
            <div class="justify-content-center">
                <table class="table table-hover table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Mahasiswa</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Angkatan</th>
                            <th scope="col">Status</th>
                            <th scope="col">Jalur Masuk</th>
                            <th scope="col">Dosen Wali</th>
                            <th scope="col">Username</th>
                            <th scope="col">Password</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 1; $i <= 20; $i++)
                            <tr>
                                <td>Mahasiswa {{ $i }}</td>
                                <td>NIM{{ $i }}</td>
                                <td>20{{ $i }}</td>
                                <td>Aktif</td>
                                <td>SNMPTN</td>
                                <td>Dr. Smith</td>
                                <td>user{{ $i }}</td>
                                <td>****</td>
                                <td>
                                    <button class="btn btn-warning">Edit</button>
                                    <button class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-end mt-3">
                <a href="/tambah-mahasiswa" class="btn btn-success">+ Tambah Mahasiswa</a>
                <!-- Ganti "/tambah-mahasiswa" dengan URL yang sesuai -->
            </div>
        </div>
    </section>
@endsection
