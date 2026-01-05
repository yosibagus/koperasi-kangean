<x-admin>
  <x-slot:title>Rekap Pegadaian</x-slot:title>
  <x-slot name="styles">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/dataTables.bootstrap5.min.css') }}">
  </x-slot>
  <x-slot name="scripts">
    <script src="{{ asset('assets/js/vendor/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/dataTables.bootstrap5.min.js') }}"></script>
    <script>
      $(document).ready(function() {
        $('#table').DataTable();
      });
    </script>
  </x-slot>
  <div class="container-fluid">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Laporan Pegadaian</h4>
      </div>
      <div class="card-body">
        <form action="{{ route('pinjaman.rekap') }}" method="GET" class="mb-3">
          <div class="row">
            <div class="col-md-2" style="margin-right: -20px">
              <div class="form-group">
                <input type="date" name="tanggal" id="datepicker" class="form-control"
                  value="{{ request('tanggal') }}">
              </div>
            </div>
            <div class="col-md-2" style="margin-right: -20px">
              <div class="form-group">
                <select name="jenis" id="jenis" class="form-control">
                  <option value="">Pilih Jenis</option>
                  <option value="pinjam" {{ request('jenis') == 'gadai' ? 'selected' : '' }}>Pinjam
                  </option>
                  <option value="lunas" {{ request('jenis') == 'lunas' ? 'selected' : '' }}>Lunas
                  </option>
                </select>
              </div>
            </div>
            <div class="col-md-2">
              <div class="row">
                <div class="col-md-12 d-flex gap-2">
                  <button type="submit" class="btn btn-primary">
                    <i class="las la-search"></i> Cari
                  </button>
                  <button id="downloadExcel" type="button" class="btn btn-outline-success" data-bs-tooltip="tooltip"
                    data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Download Excel">
                    <i class="las la-file-excel"></i>
                  </button>

                  <button id="downloadPDF" type="button" class="btn btn-outline-danger" data-bs-tooltip="tooltip"
                    data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Download PDF">
                    <i class="lar la-file-pdf"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </form>
        <div class="table-responsive">
          <table id="tabelSaya" class="table table-hover table-bordered">
            <thead>
              <tr class="table-primary">
                <th class="table-primary text-center">No</th>
                <th class="table-primary">Jumlah Pegadaian</th>
                <th class="table-primary">Tanggal Pegadaian</th>
                <th class="table-primary">Tanggal Jatuh Tempo</th>
                <th class="table-primary">Status</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($pegadaian as $item)
                <tr>
                  <td class="text-center">{{ $loop->iteration }}</td>
                  <td>@rupiah($item->jumlah)</td>
                  <td>{{ $item->created_at->format('d M Y') }}</td>
                  <td>{{ \Carbon\Carbon::parse($item->created_at)->addYear()->format('d M Y') }}</td>
                  <td>{{ $item->status }}</td>
                </tr>
              @empty
                <tr>
                  <td colspan="9" class="text-center">Data tidak ditemukan</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <script>
    document.getElementById('downloadExcel').addEventListener('click', function() {
      let table = document.getElementById('tabelSaya'); // Ambil tabel
      let workbook = XLSX.utils.table_to_book(table, {
        sheet: 'Sheet1'
      }); // Konversi tabel ke workbook
      XLSX.writeFile(workbook, 'Tabel.xlsx'); // Simpan file Excel dengan nama Tabel.xlsx
    });


    document.getElementById('downloadPDF').addEventListener('click', function() {
      const {
        jsPDF
      } = window.jspdf;
      const doc = new jsPDF();

      // Tambahkan judul atau informasi tambahan
      doc.text('Tabel Data', 14, 10);

      // Konversi tabel ke PDF menggunakan jsPDF AutoTable
      doc.autoTable({
        html: '#tabelSaya', // ID tabel yang akan diekspor
        startY: 20, // Posisi awal tabel di PDF
        theme: 'grid', // Gaya tabel (grid, plain, atau striped)
      });

      // Simpan file PDF dengan nama Tabel.pdf
      doc.save('Tabel.pdf');
    });
  </script>
</x-admin>
