@extends('layouts.administrator')

@section('alert')
    @if (session()->has('loginSuccess'))
    <div class="alert alert-success alert-dismissible fade show alert-centered" role="alert">
        <i class="bi bi-check-circle-fill"> </i>{{ session('loginSuccess') }}
        <button type="button" class="btn-close" data-bs-dismiss='alert' aria-label="Close"></button>
    </div>
    @endif
@endsection
@section('administrator')
    <div class="d-flex flex-column bg-body-tertiary p-3 m-1 rounded-3 shadow overflow-scroll" style="width:100%; height: 88vh">
        <div class="">
            <h1>Daftar barang yang ditemukan</h1>
        </div>
        <div class="">
            <table class="table">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Name</td>
                        <td>Merek</td>
                        <td>Description</td>
                        <td>Jumlah</td>
                        <td>Alamat</td>
                        <td>Bukti</td>
                        <td>Tanggal</td>
                        <td>Status</td>
                        <td>Tanggal diambil</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barangs as $barang)
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{$barang->name}}</td>
                            <td>{{$barang->merek}}</td>
                            <td>{{$barang->description}}</td>
                            <td>{{$barang->jumlah}}</td>
                            <td>{{$barang->alamat}}</td>
                            <td>{{$barang->bukti}}</td>
                            <td>{{$barang->date}}</td>
                            <td>{{$barang->status}}</td>
                            <td>{{$barang->take_date}}</td>
                            <td>
                                <div class="d-flex flex-row">
                                    <form action="barang/edit/{{ $barang->id }}" method="get">
                                        @csrf
                                        <button class="btn" type="submit">
                                            <i class="bi bi-pencil" style="color: green"></i>
                                        </button>
                                    </form>
                                    <form action="barang/{{ $barang->id }}" method="post" onsubmit="return confirm(`Apakah ingin menghapus karyawan {{ $barang->name }} `)">
                                        @csrf
                                        <button class="btn" type="submit">
                                            <i class="bi bi-trash" style="color: red"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <?php $no++ ?>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection