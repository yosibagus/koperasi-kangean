@php
    $title = 'Register';
@endphp
@extends('layout.auth')

@section('form')
  <form action="{{ route('register.create') }}" method="POST" class="mt-0">
    @csrf
    <div class="mb-4 mt-0">
      <label class="form-label required">Username</label>
      <input required type="text" class="form-control" placeholder="Username" name="name">
    </div>
    <div class="mb-4">
      <label class="form-label required">Email</label>
      <input required type="email" class="form-control" placeholder="hello@example.com" name="email">
    </div>
    <div class="mb-4 position-relative">
      <label class="mb-1 form-label required">Password</label>
      <input required type="password" id="dz-password" class="form-control" placeholder="123456" name="password">
      <span class="show-pass bt-pass eye">

        <i class="fa fa-eye-slash"></i>
        <i class="fa fa-eye"></i>

      </span>
    </div>
    <div class="mb-4 position-relative">
      <label class="mb-1 form-label required">Confirm Password</label>
      <input required type="password" id="dx-password" class="form-control" placeholder="123456"
        name="password_confirmation">
      <span class="show-pass pass-confirm eye">
        <i class="fa fa-eye-slash"></i>
        <i class="fa fa-eye"></i>
      </span>
    </div>
    <div class="form-row d-flex justify-content-between mt-4 mb-2">
      <div class="mb-4">
        <div class="form-check custom-checkbox mb-3 ps-0 ms-0">
          <label class="form-check-label ps-0 ms-0" for="customCheckBox1">Sudah Punya Akun?</label>
        </div>
      </div>
      <div class="mb-4">
        <a href="{{ route('login') }}" class="btn-link text-primary">Sign in</a>
      </div>
    </div>
    <div class="text-center mb-4">
      <button type="submit" class="btn btn-primary btn-block">Registrasi</button>
    </div>
  </form>
@endsection
