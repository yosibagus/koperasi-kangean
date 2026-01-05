@php
  $title = 'Verifikasi Email';
@endphp
@extends('layout.auth')

@section('form')
  <form action="{{ route('verification.resend', auth()->user()->token_user) }}" method="POST" class="d-grid">
    @csrf
    <h1>Verifikasi Alamat Email Anda</h1>
    <p>
      Sebelum melanjutkan, silakan periksa email Anda untuk tautan verifikasi.
      Jika Anda tidak menerima email tersebut, klik tombol di bawah ini untuk meminta yang lain.
    <button type="submit" class="text-primary" style="all: unset;">Kirim Email Verifikasi</button>
    </p>
  </form>
  <form action="{{ route('verification.verify', auth()->user()->token_user) }}" method="POST">
    @csrf
    <div class="mb-3 mt-4">
      <label for="otp" class="form-label">Kode OTP</label>
      <input type="number" inputmode="numeric" class="form-control" name="otp" id="otp" aria-describedby="helpId" placeholder="" />
      <small id="helpId" class="form-text text-muted">Insert Your OTP code</small>
    </div>
    <div class="mb-3 d-grid">
        <button type="submit" class="btn btn-primary">Verifikasi Email Saya</button>
    </div>
  </form>
@endsection
