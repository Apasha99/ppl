@extends('layouts.layout')

@section('content')
    <section>
        <div class="container-lg my-5">
            <div class="text-center text-light">
                <h2>Edit Profil</h2>
            </div>

            <div class="row my-4 g-4 justify-content-around align-items-center">
                <div class="col-md-5 text-center text-md-start">
                    <form>
                        <label for="nama" class="form-label">Nama</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class="bi bi-person-fill"></i>
                            </span>
                            <input type="text" class="form-control" id="nama" name="nama"
                                placeholder="Masukkan Nama Anda">
                        </div>

                        <label for="nip" class="form-label">NIP</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="nip" name="nip"
                                placeholder="Masukkan NIP Anda">
                        </div>

                        <label for="email" class="form-label">E-mail</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class="bi bi-envelope-fill"></i>
                            </span>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Masukkan E-mail Anda">
                        </div>

                        <label for="username" class="form-label">Username</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="username" name="username"
                                placeholder="Masukkan Username Anda">
                        </div>

                        <label for="password" class="form-label">Password</label>
                        <div class="input-group mb-5">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Masukkan Password Anda">
                        </div>

                        <a href="#" class="btn btn-warning">Edit</a>
                        <a href="#" class="btn btn-success">Save</a>
                    </form>

                </div>
                <div class="col-md-5 text-center d-none d-md-block">
                    <img src="/img/ble.jpg" class="img-fluid" alt="foto-profil">
                    <input type="file" class="form-control mt-3" id="fileInput" accept="image/*">
                </div>
            </div>
        </div>

    </section>
@endsection
