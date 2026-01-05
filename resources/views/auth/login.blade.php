@php
    $title = 'Login';
@endphp
@extends('layout.auth')

@section('form')
  <form action="{{ route('login.create') }}" method="post">
    @csrf
    <div class="mb-4">
      <label class="form-label required">Email</label>
      <input type="email" class="form-control" placeholder="hello@example.com" name="email" required>
    </div>
    <div class="mb-4 position-relative">
      <label class="mb-1 form-label required">Password</label>
      <input type="password" id="dz-password" class="form-control" placeholder="123456" name="password" required>
      <span class="show-pass bt-pass eye">

        <i class="fa fa-eye-slash"></i>
        <i class="fa fa-eye"></i>

      </span>
    </div>
    <div class="form-row d-flex justify-content-between mt-4 mb-2">
      <div class="mb-4">
        <div class="form-check custom-checkbox mb-3">
          <input type="checkbox" class="form-check-input" id="customCheckBox1">
          <label class="form-check-label" for="customCheckBox1">Simpan Preferensi</label>
        </div>
      </div>
      <div class="mb-4">
        <a href="page-forgot-password.html" class="btn-link text-primary">Lupa Password?</a>
      </div>
    </div>
    <div class="text-center mb-4">
      <button type="submit" class="btn btn-primary btn-block">Masuk</button>
    </div>
    {{-- <p class="text-center">Belum Punya Akun?
      <a class="btn-link text-primary" href="{{ route('register') }}">Register</a>
    </p> --}}
  </form>
@endsection
