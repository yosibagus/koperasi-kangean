<x-admin>
  <x-slot:title>Cetak Rekening | {{ $rekening->nama_rekening }}</x-slot:title>
  <x-slot name="style">
    <style>
      .hidden {
        display: none;
      }

      @media print {
        .btn-group {
          display: none;
        }

        .hidden {
          display: block;
        }

        .print-container {
          left: 0;
          position: absolute;
          top: 0;
          padding: 0 0 0 0;
          margin: 0 0 0 0;
        }

        .print,
        .print * {
          visibility: visible;
          font-size: 15px;
        }

        .print {
          position: absolute;
          left: -10;
          top: -10;
          width: 100%;
          height: 100%;
        }

        .print-content {
          padding: 0 0 0 0;
          margin: 0 0 0 0;
        }
      }
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
  </x-slot>
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <div class="card print print-container">
          <div class="card-header no-print">
            <h3 class="card-title ">Form Cetak Rekening</h3>
            <div class="btn-group">
              <a href="{{ route('rekening.index') }}" class="btn btn-secondary">Kembali</a>
              <button type="button" class="btn btn-primary print-btn"  >Cetak</button>
            </div>
          </div>
          <div class="card-body print .print-content my-element">
            <div class="row mb-5 ">
              <div class="col-md-2 col-sm-2 col-3">
                <h4 class="no-print">Rekening</h4>
              </div>
              <div class="col-md-9 col-sm-9 col-9">
                <h4>{{ $rekening->no_rekening }}</h4>
              </div>
              <div class="col-md-2 col-sm-2 col-3">
                <h4 class="no-print">Nama</h4>
              </div>
              <div class="col-md-9 col-sm-9 col-9">
                <h4>{{ $rekening->nama_rekening }}</h4>
              </div>
              <div class="col-md-2 col-sm-2 col-3">
                <h4 class="no-print">Alamat</h4>
              </div>
              <div class="col-md-9 col-sm-9 col-9">
                <h4> {{ $rekening->alamat }}</h4>
              </div>
              <div class="col-md-2 col-sm-2 col-3">
                <h4 class="no-print">Kode Pos</h4>
              </div>
              <div class="col-md-9 col-sm-9 col-9">
                <h4>{{ $rekening->kode_pos }}</h4>
              </div>
              <div class="col-md-2 col-sm-2 col-3">
                <h4 class="no-print">Telepon</h4>
              </div>
              <div class="col-md-9 col-sm-9 col-9">
                <h4>{{ $rekening->telepon }}</h4>
              </div>
              <div class="col-md-2 col-sm-3 col-3"></div>
              <div class="col-md-9 col-sm-9 col-9">
                <h4 class="hidden">: {{ $rekening->token_rekening }}</h4>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-sm-6 col-6 text-start">
                <h3 class="no-print">Anggota</h3><br><br><br>
                <h3 class="ms-5">{{ $rekening->nama_rekening }}</h3>
              </div>
              <div class="col-md-6 col-sm-6 col-6 text-center">
                <h3 class="no-print">Disahkan Petugas</h3><br><br><br>
                <h3>{{ auth()->user()->name }}</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script>
    $('.print-btn').on('click', function() {
      $('.my-element').addClass('mt-0 ms-0 ps-0 pt-0'); // Tambahkan class sebelum mencetak
      window.print(); // Panggil fungsi cetak
      setTimeout(function() {
        $('.my-element').removeClass('mt-0 ms-0 ps-0 pt-0'); // Hapus class setelah mencetak
      }, 1000); // Tunggu 1 detik untuk memastikan cetakan selesai
    });
  </script>
</x-admin>
