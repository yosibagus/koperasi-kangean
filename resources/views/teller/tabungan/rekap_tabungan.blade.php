<x-admin>
    <x-slot:title>@ucfirst(auth()->user()->role) | Tabungan : {{ auth()->user()->name }}</x-slot:title>
    <div class="container-fluid">
        <div class="form-head mb-4">
            <h2 class="text-black font-w600 mb-0">Rekap Tabungan</h2>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Rekapitulasi</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-hover">
                            <table id="example3" class="display min-w850 mb-4 border-bottom border-top">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Nama</th>
                                        <th>Rekening</th>
                                        <th>Tipe</th>
                                        <th class="text-end">Saldo</th>
                                    </tr>
                                </thead>
                                @foreach ($tabungan as $get)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $get->no_rekening }}</td>
                                        <td>{{ $get->nama_rekening }}</td>
                                        <td>{{ $get->nama_kategori }}</td>
                                        <td class="text-end"><b>Rp {{ number_format($get->total_saldo, 0, '.', '.') }}</b></td>
                                    </tr>
                                @endforeach
                                <tfoot>
                                    <tr>
                                        <td colspan="4">Total</td>
                                        <td class="text-end"><span style="font-size: 20px"><b>{{ number_format($sum, 0,'.','.') }}</b></span></td>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>
