<x-admin>
    <x-slot:title>@ucfirst(auth()->user()->role) | Pinjaman : {{ auth()->user()->name }}</x-slot:title>
    <x-slot:style>
    <style>
        @media print {
            body * {
                visibility: hidden;
            }

            .print-container,
            .print-container * {
                visibility: visible;
            }

            .print-container {
                position: absolute;
                left: 0;
                top: 0;
            }

            .no-print {
                display: none;
            }
        }
    </style>
  </x-slot:style>
    <div class="container-fluid">
      <div class="form-head mb-4">
        <h2 class="text-black font-w600 mb-0">Pinjaman</h2>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card print-container">
            <div class="card-header">
              <h3 class="card-title">Faktur</h3>
              <div class="btn-group">
                  <a href="{{ route('pinjaman.index') }}" class="btn btn-secondary no-print">Kembali</a>
                  <a href="{{ route('pembayaran-pinjaman.index', $pinjaman->token_pinjaman) }}" class="btn btn-warning no-print">Detail & Pembayaran</a>
                  <button onclick="window.print()" class="btn btn-primary float-right no-print">Cetak</button>
              </div>
            </div>
            <div class="card-body">
              <div class="row mb-3">
                <div class="col-md-6 col-sm-12">
                  <h5>Dari:</h5>
                  <address>
                    <strong>@myprofile('nama_profile')</strong><br>
                    @myprofile('alamat')<br>
                    <strong>Customer Service:</strong> <br>
                    Nama: {{ $pinjaman->teller->name }} ({{ $pinjaman->teller->role }}) <br>
                    email: {{ $pinjaman->teller->email }}
                  </address>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                  <h5>Kepada:</h5>
                  <address>
                    <strong>{{ $pinjaman->rekening->nama_rekening }}</strong><br>
                    Email: {{ $pinjaman->rekening->anggotas->email ?? '' }}<br>
                    No. Rek : {{ $pinjaman->rekening->no_rekening }} <br> <br>
                    <strong>Kode Record :</strong> {{ $pinjaman->token_pinjaman }} <br>
                  </address>
                </div>
                <div class="col-md-12">
                  <strong>Tanggal:</strong> {{ $pinjaman->created_at->format('d F Y') }}
                  <strong>Waktu:</strong> {{ $pinjaman->created_at->format('H : i T') }} <br>
                  <strong>Status: </strong> {{ $pinjaman->status == 'pinjam' ? 'Dipinjamkan' : $pinjaman->status }}
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <h4>Rincian Transaksi</h4>
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Deskripsi</th>
                        <th>Jumlah</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Pinjaman</td>
                        <td>@rupiah($pinjaman->jumlah)</td>
                      </tr>
                      <tr>
                        <td>Bunga</td>
                        <td>@rupiah($pinjaman->bunga)</td>
                      </tr>
                      <tr>
                        <td>Setoran / Bulan</td>
                        <td>@rupiah(($pinjaman->jumlah / 12) + $pinjaman->bunga)</td>
                      </tr>
                      <tr>
                        <td>Tenggat</td>
                        <td>{{ \Carbon\Carbon::parse($pinjaman->created_at)->addYear()->format('d F Y, H:i T') }}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="row">
                <div class="col-12 text-center mt-4">
                  <p>Terima kasih telah menggunakan layanan kami.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </x-admin>
