<x-admin>
  <x-slot:title>@ucfirst(auth()->user()->role) | Tabungan : {{ auth()->user()->name }}</x-slot:title>
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
      <h2 class="text-black font-w600 mb-0">Tabungan</h2>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card print-container">
          <div class="card-header">
            <h3 class="card-title">Faktur</h3>
            <div class="btn-group">
                <a href="{{ route('tabungan.index') }}" class="btn btn-secondary no-print">Kembali</a>
                <a href="{{ route('tabungan.cetak', $tabungan->rekening->token_rekening) }}" class="btn btn-warning no-print">Cetak di Tabungan</a>
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
                  Nama: {{ $tabungan->teller->name }} ({{ $tabungan->teller->role }}) <br>
                  email: {{ $tabungan->teller->email }}
                </address>
              </div>
              <div class="col-md-6 col-sm-12 text-right">
                <h5>Kepada:</h5>
                <address>
                  <strong>{{ $tabungan->rekening->nama_rekening }}</strong><br>
                  Email: {{ $tabungan->rekening->anggotas->email ?? '' }}<br>
                  No. Rek : {{ $tabungan->rekening->no_rekening }} <br> <br>
                  <strong>Kode Record :</strong> {{ $tabungan->token_tabungan }} <br>
                </address>
              </div>
              <div class="col-md-12">
                <strong>Tanggal:</strong> {{ $tabungan->created_at->format('d F Y') }}
                <strong>Waktu:</strong> {{ $tabungan->created_at->format('H : i T') }}
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
                      <td>{{ $tabungan->jenis == 'masuk' ? 'Simpanan' : 'Penarikan' }}</td>
                      <td>@rupiah($tabungan->jumlah)</td>
                    </tr>
                    <tr>
                      <td>Sisa Saldo</td>
                      <td>@rupiah($saldo)</td>
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
