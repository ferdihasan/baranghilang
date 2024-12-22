@extends('layouts.main')
@include('components.navbar')
@section('head')
    
@endsection

@section('home')
<div class="d-flex flex-column bg-body-tertiary p-3 m-1 rounded-3 shadow" style="width:100%; height: 88vh">
    <h1>Register</h1>
    <hr>
    <form action="/register" enctype="multipart/form-data" method="post" onsubmit="return confirm('Apakah anda yakin data yang anda masukan sudah benar?')">
        @csrf
        <div class="d-flex flex-row row">
            <div class="d-flex flex-column col-3">
                <div class="mb-3">
                    <label for="Name" class="form-label">Name</label>
                    <input type="text"  name="name" class="form-control" id="name" placeholder="Masukan nama" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text"  name="email" class="form-control" id="email" placeholder="Masukan email" required>
                </div>
            </div>
            <div class="d-flex flex-column col-3">
                <div class="mb-3">
                    <label for="number" class="form-label">Number</label>
                    <input type="text"  name="number" class="form-control" id="number" placeholder="Masukan nomor" required >
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">password</label>
                    <input rows="3" type="password" name="password" class="form-control" id="password" placeholder="Masukan password" required >
                </div>
            </div>
        </div>        
        <br>
        <button class="btn btn-primary" type="submit" style="width: 20%">Register</button>
    </form>
</div>
@endsection