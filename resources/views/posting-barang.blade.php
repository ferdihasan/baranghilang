@extends('layouts.main')
@include('components.navbar')
@section('head')
    
@endsection

@section('home')
<div class="d-flex flex-column bg-body-tertiary p-3 m-1 rounded-3 shadow" style="width:100%; height: 88vh">
    <h1>Posting Barang</h1>
    <hr>
    <form action="/posting-barang/simpan" enctype="multipart/form-data" method="post" onsubmit="return confirm('Apakah anda yakin data yang anda masukan sudah benar?')">
        @csrf
        <div class="d-flex flex-row row">
            <div class="d-flex flex-column col-3">
                <div class="mb-3">
                    <label for="Name" class="form-label">Name</label>
                    <input type="text"  name="name" class="form-control" id="Name" required>
                </div>
                <div class="mb-3">
                    <label for="Merek" class="form-label">Merek</label>
                    <input type="text"  name="merek" class="form-control" id="Merek" required>
                </div>
                <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah</label>
                    <input type="text"  name="jumlah" class="form-control" id="jumlah" required >
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Tanggal & waktu ditemukan</label>
                    <input type="datetime-local"  name="date" class="form-control" id="date" required >
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea type="text"  name="description" class="form-control" id="description" required ></textarea>
                </div>
            </div>
            <div class="d-flex flex-column col-3">
                <div class="mb-3">
                    <label class="form-label" for="category">Category</label>
                    <select name="category" id="category" class="form-select" aria-label="Default select example">
                        <option >Pilih Category</option>
                        @foreach ($category as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="bukti" class="form-label">Bukti Ambil Barang</label>
                    <input type="text"  name="bukti" class="form-control" id="bukti" required >
                </div>
                {{-- <div class="mb-3">
                    <label for="date" class="form-label">Tanggal Ditemukan</label>
                    <input rows="3" type="datetime" name="take_date" class="form-control" id="take_date" required >
                </div> --}}
                <div class="mb-3">
                    <label class="form-label" for="status">Status</label>
                    <select name="status" id="status" class="form-select" aria-label="Default select example">
                        <option >Pilih Status</option>
                        <option value="Belum diambil">Belum diambil</option>
                        <option value="Belum diambil">Sudah diambil</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Foto Barang</label>
                    <input class="form-control" type="file" id="image" name="image" required>
                  </div>
            </div>
        </div>
        <br>
        <button class="btn btn-primary" type="submit" style="width: 20%">Posting</button>
    </form>
</div>
@endsection