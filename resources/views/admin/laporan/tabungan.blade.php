<x-admin>
  <x-slot name="title">Laporan Tabungan</x-slot>
  <div class="container-fluid">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Laporan Tabungan</h4>
      </div>
      <div class="card-body">
        <form action="{{ route('tabungan.laporan') }}" method="GET">
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" name="tanggal" id="datepicker" class="form-control"
                  value="{{ request('tanggal') }}">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="jenis_simpanan_id" class="form-label">Jenis Simpanan</label>
                <select name="jenis_simpanan_id" id="jenis_simpanan_id" class="form-control">
                  <option value="">Pilih Jenis Simpanan</option>
                  @foreach ($jenis_simpanan as $item)
                    <option value="{{ $item->id_kategori }}"
                      {{ request('jenis_simpanan_id') == $item->id_kategori ? 'selected' : '' }}>
                      {{ $item->nama_kategori }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="cabang_id" class="form-label">Cabang</label>
                <select name="cabang_id" id="cabang_id" class="form-control">
                  <option value="">Pilih Cabang</option>
                  @foreach ($cabang as $item)
                    <option value="{{ $item->id_profile }}"
                      {{ request('cabang_id') == $item->id_profile ? 'selected' : '' }}>
                      {{ $item->nama_profile }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="jenis" class="form-label">Jenis</label>
                <select name="jenis" id="jenis" class="form-control">
                  <option value="">Pilih Jenis</option>
                  <option value="masuk" {{ request('jenis') == 'masuk' ? 'selected' : '' }}>Masuk
                  </option>
                  <option value="keluar" {{ request('jenis') == 'keluar' ? 'selected' : '' }}>Keluar
                  </option>
                </select>
              </div>
            </div>
          </div>
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
        </form>
        <div class="table-responsive mt-3">
          <table class="table table-hover table-bordered table-primary" id="tabelSaya">
            <thead>
              <tr class="table-primary">
                <th class="table-primary text-center">#</th>
                <th class="table-primary">Tanggal</th>
                <th class="table-primary">Nama</th>
                <th class="table-primary">Jenis Simpanan</th>
                <th class="table-primary">Cabang</th>
                <th class="table-primary">Nominal</th>
                <th class="table-primary">Jenis</th>
                <th class="table-primary">Saldo</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($tabungan as $item)
                <tr>
                  <td class="text-center">{{ $loop->iteration }}</td>
                  <td>{{ $item->created_at->format('d M Y') }}</td>
                  <td>{{ $item->rekening->nama_rekening }}</td>
                  <td>{{ $item->rekening->kategori->nama_kategori }}</td>
                  <td>{{ $item->rekening->tellers->profile->nama_profile }}</td>
                  <td> @rupiah($item->jumlah)</td>
                  <td>
                    @if ($item->jenis == 'masuk')
                        Debet
                    @elseif($item->jenis == 'keluar')
                        Kredit
                    @endif
                  </td>
                  <td> @rupiah($item->saldo)</td>
                </tr>
              @empty
                <tr>
                  <td colspan="6" class="text-center">Data tidak ditemukan</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>
  <script>
    $(document).ready(function() {
      $('#datepicker').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true,
      });
    });
  </script>
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
