@extends('layouts.main')
@include('components.navbar')
@section('home')
    <div class="d-flex flex-row">
        <div class="card col-4 m-5 shadow">
            <img src="{{asset('storage/' . $barang->image)}}" alt="{{$barang->image}}">
        </div>
        <div class="col m-5">
            <table class="table">
                <tr>
                    <th scope="row">Name</th>
                    <td>{{$barang->name}}</td>
                </tr>
                <tr>
                    <th scope="row">Merek</th>
                    <td>{{$barang->merek}}</td>
                </tr>
                <tr>
                    <th scope="row">Category</th>
                    <td>{{$barang->category->name}}</td>
                </tr>
                <tr>
                    <th scope="row">Tanggal ditemukan</th>
                    <td>{{$barang->date}}</td>
                </tr>
                <tr>
                    <th scope="row">Jumlah</th>
                    <td>{{$barang->jumlah}}</td>
                </tr>
                <tr>
                    <th scope="row">Description</th>
                    <td>{{$barang->description}}</td>
                </tr>
                <tr>
                    <th scope="row">Bukti ambil barang</th>
                    <td>{{$barang->bukti}}</td>
                </tr>
                <tr>
                    <th scope="row">Status</th>
                    <td>{{$barang->status}}</td>
                </tr>
                @if ($barang->status == 'Sudah diambil')
                    <tr>
                        <th scope="row">Tanggal diambil</th>
                        <td>{{$barang->take_date}}</td>
                    </tr>
                @endif
                <tr>
                    <th scope="row">Ditemukan oleh</th>
                    <td>{{$barang->user->name}}</td>
                </tr>
                <tr>
                    <th scope="row">Nomor</th>
                    <td>{{$barang->user->number}}</td>
                </tr>
            </table>
        </div>
    </div>
@endsection
