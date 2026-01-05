<x-admin>
    <x-slot:title>Cetak Mutasi Tabungan</x-slot:title>

    <x-slot name="style">

    </x-slot>

    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3>Cetak Mutasi Tabungan</h3>
                {{-- <button class="btn btn-primary" id="printBtn">Cetak</button> --}}
            </div>

            <div class="card-body">

                <form method="POST" action="{{ route('tabungan.cetak.pdf', $rekening) }}" target="_blank">
                    @csrf

                    <div class="row mb-2">

                        <div class="col-md-4">
                            <label>Letakkan di baris ke (Kertas):</label>
                            <input type="number" id="rowPosition" name="rowPosition" class="form-control"
                                value="1" min="1" max="37">
                            <small class="text-warning">
                                Halaman 1: baris 1-18 • Halaman 2: baris 20-37
                            </small>
                        </div>

                        <div class="col-md-4">
                            <label>SANDI:</label>
                            <input type="number" id="sandi" name="sandi" class="form-control" required>
                        </div>
                    </div>

                    <button class="btn btn-primary">
                        Cetak PDF
                    </button>




                    <!-- ==========================
                     TABEL UTAMA
                ========================== -->
                    <table id="browserTable" class="table table-bordered mt-3">
                        <thead>
                            <tr>
                                <th class="text-center">Pilih
                                    <input type="checkbox" id="checkAll">
                                </th>
                                <th>Tanggal</th>
                                <th>KODE</th>
                                <th>Debet</th>
                                <th>Kredit</th>
                                <th>Saldo</th>
                                <th>Val</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($tabungans as $item)
                                <tr>
                                    <td class="text-center">
                                        <input type="checkbox" name="rows[]" value="{{ $item->id_tabungan }}">
                                    </td>

                                    <td>{{ $item->created_at->format('d/m/y') }}</td>
                                    <td>{{ $item->id_tabungan }}</td>

                                    <td>
                                        {{ $item->jenis == 'masuk' ? number_format($item->jumlah, 0, ',', '.') : '' }}
                                    </td>

                                    <td>
                                        {{ $item->jenis == 'keluar' ? number_format($item->jumlah, 0, ',', '.') : '' }}
                                    </td>

                                    <td>{{ number_format($item->saldo, 0, ',', '.') }}</td>
                                    <td>{{ Auth::user()->name }}</td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                    <small class="text-info">
                        Centang baris mutasi yang ingin dicetak
                    </small>
                </form>
            </div>
        </div>
    </div>


    <script>
        document.getElementById('checkAll').addEventListener('change', function() {
            document.querySelectorAll('.row-checkbox')
                .forEach(cb => cb.checked = this.checked);
        });
    </script>

</x-admin>
