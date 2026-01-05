<x-admin>
    <x-slot:title>@ucfirst(auth()->user()->role) | Pinjaman : {{ auth()->user()->name }}</x-slot:title>
    <div class="container-fluid">
        <div class="form-head mb-4">
            <h2 class="text-black font-w600 mb-0">Rekening</h2>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Pinjaman</h4>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalId">Buat
                            Pinjaman</button>

                        <div class="modal fade bd-example-modal-lg" id="modalId" tabindex="-1" role="dialog"
                            aria-labelledby="modalTitleId" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTitleId">
                                            Buat Pinjaman
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('pinjaman.store') }}" method="post" class="needs-validation"
                                        novalidate>
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="mb-3">
                                                                <label for="rekening_id" class="form-label required">No
                                                                    Rekening</label>
                                                                <input type="text" class="form-control"
                                                                    name="rekening_id" id="rekening_id" required
                                                                    placeholder="masukkan No Rekening(10)" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="mb-3">
                                                                <label for="jumlah"
                                                                    class="form-label required">Nominal</label>
                                                                <input type="number" inputmode="numeric"
                                                                    class="form-control" name="jumlah" id="jumlah"
                                                                    required placeholder="min: 10000" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="mb-3">
                                                                <label for=""
                                                                    class="form-label">Deskripsi</label>
                                                                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" placeholder="deskripsi singkat"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="ktp" class="form-label required">KTP</label>
                                                        <input type="number" inputmode="numeric" class="form-control"
                                                            name="ktp" id="ktp"
                                                            placeholder="ktp tidak ditemukan" value="" disabled />
                                                    </div>
                                                    <div class="mb-3">
                                                        <div id="kartu" class="mb-0"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                Close
                                            </button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="table table-responsive table-hover">
                            <table id="example3" class="display min-w850 mb-4 border-bottom border-top">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Nama</th>
                                        <th>Rekening</th>
                                        <th>Tanggal Pinjaman</th>
                                        <th>Pokok Pinjaman</th>
                                        <th class="text-start">Status</th>
                                        @if (auth()->user()->role != 'teller')
                                            <th>CS</th>
                                        @endif
                                        <th class="text-start">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pinjamans as $item)
                                        <tr>
                                            <td class="text-center">
                                                <strong>{{ $loop->iteration }}</strong>
                                            </td>
                                            <td>
                                                <p>{{ $item->rekening->nama_rekening }}</p>
                                                <small>{{ $item->rekening->telepon }}</small>
                                            </td>
                                            <td>
                                                <p>{{ $item->rekening->no_rekening }}</p>
                                                <small>{{ $item->rekening->kategori->nama_kategori }}</small>
                                            </td>
                                            <td>
                                                <p>{{ $item->created_at->format('d F Y') }}</p>
                                                <small>{{ $item->teller->profile->nama_profile }}</small>
                                            </td>
                                            <td>
                                                @rupiah($item->jumlah)
                                            </td>
                                            <td class="text-start">
                                                @if ($item->status == 'pending')
                                                    <span class="badge bg-warning">{{ $item->status }}</span>
                                                @elseif ($item->status == 'pinjam')
                                                    <span class="badge bg-secondary">{{ $item->status }}</span>
                                                @elseif ($item->status == 'lunas')
                                                    <span class="badge bg-success">{{ $item->status }}</span>
                                                @endif
                                            </td>
                                            @if (auth()->user()->role != 'teller')
                                                <td>
                                                    <p>{{ $item->teller->name }}</p>
                                                    <small>{{ $item->teller->role }}</small>
                                                </td>
                                            @endif
                                            <td class="text-center align-middle">
                                                <div
                                                    class="dropdown d-flex justify-content-center align-items-center ms-auto text-end c-pointer">
                                                    <div class="btn-link" data-bs-toggle="dropdown">
                                                        <svg width="24px" height="24px" viewBox="0 0 24 24"
                                                            version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24">
                                                                </rect>
                                                                <circle fill="#000000" cx="5" cy="12"
                                                                    r="2"></circle>
                                                                <circle fill="#000000" cx="12" cy="12"
                                                                    r="2"></circle>
                                                                <circle fill="#000000" cx="19" cy="12"
                                                                    r="2"></circle>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item"
                                                            href="{{ route('pinjaman.show', $item->token_pinjaman) }}">
                                                            Cetak Faktur
                                                        </a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('pembayaran-pinjaman.index', $item->token_pinjaman) }}">
                                                            View Pembayaran
                                                        </a>
                                                        <a type="button" data-bs-toggle="modal"
                                                            data-bs-target="#editTarget{{ $item->token_pinjaman }}"
                                                            class="dropdown-item">
                                                            Edit Pinjaman
                                                        </a>
                                                        <a type="button" data-bs-toggle="modal"
                                                            data-bs-target="#basicModal{{ $item->token_pinjaman }}"
                                                            class="dropdown-item">
                                                            Hapus Pinjaman
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        {{-- modal edit --}}
                                        <div class="modal fade bd-example-modal-lg"
                                            id="editTarget{{ $item->token_pinjaman }}" tabindex="-1" role="dialog"
                                            aria-labelledby="modalTitleId" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalTitleId">
                                                            Edit Pinjaman {{ $item->rekening->nama_rekening }}
                                                        </h5>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form
                                                        action="{{ route('pinjaman.update', $item->token_pinjaman) }}"
                                                        method="post" class="needs-validation" novalidate>
                                                        @csrf
                                                        @method('PATCH')
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="mb-3">
                                                                                <label for="rekening_ids"
                                                                                    class="form-label required">No
                                                                                    Rekening</label>
                                                                                <input type="text"
                                                                                    class="form-control"
                                                                                    name="rekening_id"
                                                                                    value="{{ $item->rekening->no_rekening }}"
                                                                                    id="rekening_ids" required
                                                                                    placeholder="masukkan No Rekening(10)" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="mb-3">
                                                                                <label for="jumlah"
                                                                                    class="form-label required">Nominal</label>
                                                                                <input type="number"
                                                                                    inputmode="numeric"
                                                                                    class="form-control"
                                                                                    value="{{ $item->jumlah }}"
                                                                                    name="jumlah" id="jumlah"
                                                                                    required
                                                                                    placeholder="min: 10000" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="mb-3">
                                                                                <label for=""
                                                                                    class="form-label">Deskripsi</label>
                                                                                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" placeholder="deskripsi singkat">{!! $item->deskripsi !!}</textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label for="ktp"
                                                                            class="form-label required">KTP</label>
                                                                        <input type="number" inputmode="numeric"
                                                                            class="form-control" name="ktp"
                                                                            id="ktp"
                                                                            placeholder="ktp tidak ditemukan"
                                                                            value="{{ $item->rekening->ktp }}"
                                                                            disabled />
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <div id="kartus" class="mb-0">
                                                                            <div class="card-bx mb-0">
                                                                                <img src="{{ asset('') }}assets/images/card/{{ $item->rekening->kategori->nama_kategori == 'Pendidikan' ? 'card2.png' : 'card.png' }}"
                                                                                    alt="" class="mw-100">
                                                                                <div class="card-info text-white">
                                                                                    <p class="mb-1 text-white">Rekening
                                                                                    </p>
                                                                                    <h2
                                                                                        class="fs-36 text-white mb-sm-4 mb-3">
                                                                                    </h2>
                                                                                    <div
                                                                                        class="d-flex align-items-center justify-content-between mb-sm-5 mb-3">
                                                                                        <img src="{{ asset('') }}assets/images/dual-dot.png"
                                                                                            alt=""
                                                                                            class="dot-img">
                                                                                        <h4
                                                                                            class="fs-20 text-white mb-0">
                                                                                            {{ $item->rekening->no_rekening }}
                                                                                        </h4>
                                                                                    </div>
                                                                                    <div class="d-flex">
                                                                                        <div class="me-5">
                                                                                            <p
                                                                                                class="fs-14 mb-1 text-white op6">
                                                                                                {{ $item->rekening->kategori->nama_kategori }}
                                                                                            </p>
                                                                                            <span>{{ $item->rekening->created_at->format('m/y') }}</span>
                                                                                        </div>
                                                                                        <div>
                                                                                            <p
                                                                                                class="fs-14 mb-1 text-white op6">
                                                                                            </p>
                                                                                            <span>{{ $item->rekening->nama_rekening }}</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">
                                                                Close
                                                            </button>
                                                            <button type="submit"
                                                                class="btn btn-primary">Save</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Modal delete -->
                                        <div class="modal fade" id="basicModal{{ $item->token_pinjaman }}">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Hapus
                                                            {{ $item->rekening->nama_rekening }}</h5>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal">
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">Modal body text goes here.</div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger light"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <form
                                                            action="{{ route('pinjaman.destroy', $item->token_pinjaman) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-primary">Save
                                                                changes</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#rekening_id').on('input', function() {
                const noRekening = $(this).val();
                if (noRekening.length === 10) {
                    $.ajax({
                        url: `{{ route('rekening.api', '') }}/${noRekening}`,
                        method: 'GET',
                        success: function(data) {
                            let saldo = data.saldo.toLocaleString('id-ID', {
                                style: 'currency',
                                currency: 'IDR'
                            });;

                            $('#ktp').val(data.ktp);
                            //   $('#imageKtp').attr('src', `{{ route('ktp', '') }}/${data.foto_ktp}`);
                            $('#kartu').html(`<div class="card-bx mb-0">
                <img src="{{ asset('') }}assets/images/card/${data.card}" alt="" class="mw-100">
                <div class="card-info text-white">
                  <p class="mb-1 text-white">Total Saldo</p>
                  <h2 class="fs-36 text-white mb-sm-4 mb-3">${saldo}</h2>
                  <div class="d-flex align-items-center justify-content-between mb-sm-5 mb-3">
                    <img src="{{ asset('') }}assets/images/dual-dot.png" alt="" class="dot-img">
                    <h4 class="fs-20 text-white mb-0">${data.rekening}</h4>
                  </div>
                  <div class="d-flex">
                    <div class="me-5">
                      <p class="fs-14 mb-1 text-white op6">${data.kategori}</p>
                      <span>${data.tanggal}</span>
                    </div>
                    <div>
                      <p class="fs-14 mb-1 text-white op6">${data . role}</p>
                      <span>${data.nama}</span>
                    </div>
                  </div>
                </div>
              </div>`);
                        },
                        error: function(error) {
                            console.error('Error:', error);
                        }
                    });
                }
            });
        });
    </script>
</x-admin>
