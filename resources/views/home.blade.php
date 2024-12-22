@extends('layouts.main')
@include('components.navbar')
@section('head')

@endsection
@section('alert')
    @if (session()->has('logout'))
    <div class="alert alert-success alert-dismissible fade show alert-centered" role="alert">
        <i class="bi bi-check-circle-fill"> </i>{{ session('logout') }}
        <button type="button" class="btn-close" data-bs-dismiss='alert' aria-label="Close"></button>
    </div>
@endif
@section('alert')
    @if (session()->has('suksesSimpanPost'))
    <div class="alert alert-success alert-dismissible fade show alert-centered" role="alert">
        <i class="bi bi-check-circle-fill"> </i>{{ session('suksesSimpanPost') }}
        <button type="button" class="btn-close" data-bs-dismiss='alert' aria-label="Close"></button>
    </div>
@endif
    @if (session()->has('email'))
    <div class="alert alert-danger alert-dismissible fade show alert-centered" role="alert">
        <i class="bi bi-x-circle-fill"> </i>{{ session('email') }}
        <button type="button" class="btn-close" data-bs-dismiss='alert' aria-label="Close"></button>
    </div>
@endif
    @if (session()->has('loginSuccess'))
    <div class="alert alert-success alert-dismissible fade show alert-centered" role="alert">
        <i class="bi bi-check-circle-fill"> </i>{{ session('loginSuccess') }}
        <button type="button" class="btn-close" data-bs-dismiss='alert' aria-label="Close"></button>
    </div>
@endif
    @if (session()->has('berhasil_register'))
    <div class="alert alert-success alert-dismissible fade show alert-centered" role="alert">
        <i class="bi bi-check-circle-fill"> </i>{{ session('berhasil_register') }}
        <button type="button" class="btn-close" data-bs-dismiss='alert' aria-label="Close"></button>
    </div>
@endif
@endsection

@section('home')
  <div class="d-flex row row-cols-1 row-cols-md-3 g-4" style="z-index: -5">
    @foreach ($barangs as $barang)
      <a href="/barang/{{$barang->id}}" class="text-decoration-none">
        <div class="col">
          <div class="card shadow">
            <div class="overflow-hidden" style="height: 250px" >
              <img src="{{asset('storage/' . $barang->image)}}" class="card-img-top" alt="{{$barang->image}}"><hr>
            </div>
            <div class="card-body overflow-hidden" style="height: 250px">
              <h4 class="card-title">{{$barang->merek}}</h4>
              <div class="d-flex justify-content-between">
                <p class="card-title">{{$barang->name}}</p>
                <p class="card-title">{{$barang->category->name}}</p>
              </div>
              <div class="d-flex justify-content-between">
                <p class="card-title">Ditemukan oleh: </p>
                <p class="card-title">{{$barang->user->name}}</p>
              </div>
              <div class="d-flex justify-content-between">
                <p class="card-title">Alamat: </p>
                <p class="card-title">{{$barang->alamat}}</p>
              </div><hr>
              <p class="card-text">{{$barang->description}}</p>
            </div>
            <div class="card-footer d-flex justify-content-between">
              <p class="card-text d-flex ">{{$barang->status}}</p>
              <p class="card-text d-flex ">{{$barang->date}}</p>
            </div>
          </div>
        </div>
      </a>
    @endforeach
  </div>
  <br>
@endsection