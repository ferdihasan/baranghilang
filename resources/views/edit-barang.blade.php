@extends('layouts.main')
@include('components.navbar')
@section('head')
    
@endsection

@section('home')
<div class="d-flex flex-column bg-body-tertiary p-3 m-1 rounded-3 shadow" style="width:100%; height: 88vh">
    <h1>Edit Barang</h1>
    <hr>
    <form action="/barang/edit/simpan/{{$barang->id}}" enctype="multipart/form-data" method="post" onsubmit="return confirm('Apakah anda yakin data yang anda masukan sudah benar?')">
        @csrf
        <div class="d-flex flex-row row">
            <div class="d-flex flex-column col-3">
                <div class="mb-3">
                    <label for="Name" class="form-label">Name</label>
                    <input type="text"  name="name" class="form-control" id="Name" value="{{$barang->name}}" required>
                </div>
                <div class="mb-3">
                    <label for="Merek" class="form-label">Merek</label>
                    <input type="text"  name="merek" class="form-control" id="Merek" required value="{{$barang->merek}}">
                </div>
                <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah</label>
                    <input type="text"  name="jumlah" class="form-control" id="jumlah" required value="{{$barang->jumlah}}" >
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Tanggal & waktu ditemukan</label>
                    <input type="datetime-local"  name="date" class="form-control" id="date" required value="{{$barang->date}}">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text"  name="alamat" class="form-control" id="alamat" required value="{{$barang->alamat}}">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" class="form-control" id="description"  defaultValue="{{$barang->description}}" required></textarea>
                </div>
            </div>
            <div class="d-flex flex-column col-3">
                <div class="mb-3">
                    <label class="form-label" for="category">Category</label>
                    <select name="category" id="category" class="form-select" aria-label="Default select example">
                        <option value="{{$barang->category->id}}">Abaikan jika tidak ingin diganti</option>
                        @foreach ($category as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="bukti" class="form-label">Bukti Ambil Barang</label>
                    <input type="text"  name="bukti" class="form-control" id="bukti" required value="{{$barang->bukti}}">
                </div>
                {{-- <div class="mb-3">
                    <label for="date" class="form-label">Tanggal Ditemukan</label>
                    <input rows="3" type="datetime" name="take_date" class="form-control" id="take_date" required >
                </div> --}}
                <div class="mb-3">
                    <label class="form-label" for="status">Status</label>
                    <select name="status" id="status" class="form-select" aria-label="Default select example" onchange="onChangeStatus()">
                        <option value="{{$barang->status}}" >Abaikan jika tidak ingin diganti</option>
                        <option value="Belum diambil">Belum diambil</option>
                        <option value="Sudah diambil">Sudah diambil</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="takedate" class="form-label">Tanggal diambil</label>
                    <input type="datetime-local"  name="takedate" class="form-control" id="takedate" <?= $barang->take_date !== null ? '' : 'readonly' ?> value="<?= $barang->take_date !== null ? $barang->take_date : ''?>">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Foto Barang</label>
                    {{-- <input class="form-control" type="file" id="image" name="image" required value="{{$barang->image}}"> --}}
                    <div class="d-flex flex-row">
                        <input style="width: 85%" type="text" name="image" class="form-control" id="image" <?php echo $barang->image !== null ? '' : 'hidden'?> readonly value="<?php echo $barang->image !== null ? 'Terupload' : ''?>">
                        @if ($barang->image !== null)
                            <a href="/barang/edit/hapus-image/{{ $barang->id }}" class="btn">
                                <i class="bi bi-trash" style="color: red"></i>
                            </a>
                        @else
                            <input class="form-control" type="file" id="image" name="image" >
                        @endif
                    </div>
                  </div>
            </div>
        </div>
        <br>
        <button class="btn btn-primary" type="submit" style="width: 20%">Simpan Perubahan</button>
    </form>
</div>

<script defer src="/dist/js/js.js" onload="onLoadDataDescription('{{$barang->description}}')"></script>


@endsection
