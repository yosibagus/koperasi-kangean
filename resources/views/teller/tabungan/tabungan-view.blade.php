<x-admin>
  <x-slot:title>@ucfirst(auth()->user()->role) | Tabungan : {{ auth()->user()->name }}</x-slot:title>
  <div class="container-fluid">
    <div class="form-head mb-4">
      <h2 class="text-black font-w600 mb-0">Tabungan</h2>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Histori Tabungan</h4>
            <div class="btn-group">
              <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#tarikTunai">Tarik
                Tunai</button>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalId">Simpan
                Tunai</button>
            </div>

            <!-- Modal simpanan -->
            <div class="modal fade bd-example-modal-lg" id="modalId" tabindex="-1" role="dialog"
              aria-labelledby="modalTitleId" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">
                      Simpan Tunai
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form action="{{ route('tabungan.store') }}" method="post" class="needs-validation" novalidate>
                    @csrf
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="mb-3">
                                <label for="rekening_id" class="form-label required">No Rekening</label>
                                <input type="text" class="form-control" name="rekening_id" id="rekening_id" required
                                  placeholder="masukkan No Rekening(10)" />
                              </div>
                            </div>
                            <input type="text" class="form-control" name="jenis" id="jenis" value="masuk"
                              hidden />
                            <div class="col-md-12">
                              <div class="mb-3">
                                <label for="jumlah" class="form-label required">Nominal</label>
                                <input type="number" inputmode="numeric" class="form-control" name="jumlah"
                                  id="jumlah" required placeholder="min: 10000" />
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <input type="text" name="deskripsi" id="deskripsi" class="form-control"
                                  placeholder="deskripsi singkat">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="mb-3">
                            <label for="ktp" class="form-label required">KTP</label>
                            <input type="number" inputmode="numeric" class="form-control" name="ktp" id="ktp"
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
            <!-- Modal penarikan -->
            <div class="modal fade bd-example-modal-lg" id="tarikTunai" tabindex="-1" role="dialog"
              aria-labelledby="modalTitleId" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">
                      Tarik Tunai
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form action="{{ route('tabungan.store') }}" method="post" class="needs-validation" novalidate>
                    @csrf
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="mb-3">
                                <label for="rekening_ids" class="form-label required">No Rekening</label>
                                <input type="text" class="form-control" name="rekening_id" id="rekening_ids"
                                  required placeholder="masukkan No Rekening(10)" />
                              </div>
                            </div>
                            <input type="text" class="form-control" name="jenis" id="jenis" value="keluar"
                              hidden />
                            <div class="col-md-12">
                              <div class="mb-3">
                                <label for="jumlah" class="form-label required">Nominal</label>
                                <input type="number" inputmode="numeric" class="form-control" name="jumlah"
                                  id="jumlah" required placeholder="min: 10000" />
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="mb-3">
                                <label for="" class="form-label">Deskripsi</label>
                                <input type="text" name="deskripsi" id="deskripsi" class="form-control">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="mb-3">
                            <label for="ktps" class="form-label required">KTP</label>
                            <input type="number" inputmode="numeric" class="form-control" name="ktp"
                              id="ktps" placeholder="ktp tidak ditemukan" value="" disabled />
                          </div>
                          <div class="mb-3">
                            <div id="kartus" class="mb-0"></div>
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
            <div class="table-responsive table-hover">
              <table id="example3" class="display min-w850 mb-4 border-bottom border-top">
                <thead>
                  <tr>
                    <th class="text-center">#</th>
                    <th>Nama</th>
                    <th>Nominal</th>
                    <th>Jenis</th>
                    @if (auth()->user()->role != 'teller')
                      <th>CS</th>
                      <th>Di kantor</th>
                    @endif
                    <th class="text-start">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($tabungans as $item)
                    <tr>
                      <td class="text-center">
                        <strong>{{ $loop->iteration }}</strong>
                      </td>
                      <td>
                        <p>{{ $item->rekening->no_rekening }}</p>
                        <small>{{ $item->rekening->nama_rekening }}</small>
                      </td>
                      <td>
                        <p>@rupiah($item->jumlah)</p>
                      </td>
                      <td>
                        <div class="badge {{ $item->jenis == 'masuk' ? 'badge-success' : 'badge-warning' }}">
                          {{ $item->jenis }}</div>
                      </td>
                      @if (auth()->user()->role != 'teller')
                        <td>
                          <p>{{ $item->teller->name }}</p>
                          <small>{{ $item->teller->role }}</small>
                        </td>
                        <td>
                          <p>{{ $item->teller->profile->nama_profile }}</p>
                        </td>
                      @endif
                      <td class="text-start">
                        <div class="d-flex justify-content-start gap-2">
                          <a href="{{ route('tabungan.show', $item->token_tabungan) }}" data-bs-tooltip="tooltip"
                            data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                            data-bs-title="Cetak Faktur" class="btn btn-primary shadow btn-xs sharp">
                            <i class="fas fa-clipboard"></i>
                          </a>
                          <a href="{{ route('tabungan.cetak', $item->rekening->token_rekening) }}" data-bs-tooltip="tooltip"
                            data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                            data-bs-title="Cetak Ke Tabungan" class="btn btn-warning shadow btn-xs sharp">
                            <i class="fas fa-clipboard"></i>
                          </a>
                          <button type="button" data-bs-toggle="modal"
                            data-bs-target="#editTarget{{ $item->token_tabungan }}" data-bs-tooltip="tooltip"
                            data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit data"
                            class="btn btn-secondary shadow btn-xs sharp">
                            <i class="fas fa-pencil-alt"></i>
                          </button>
                          <button type="button" data-bs-toggle="modal"
                            data-bs-target="#modalId{{ $item->token_tabungan }}" data-bs-tooltip="tooltip"
                            data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Hapus data"
                            class="btn btn-danger shadow btn-xs sharp">
                            <i class="fas fa-trash-alt"></i>
                          </button>
                        </div>
                      </td>
                    </tr>

                    <div class="modal fade bd-example-modal-lg" id="editTarget{{ $item->token_tabungan }}"
                      tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="modalTitleId">
                              Edit tabungan {{ $item->jenis }}
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                              aria-label="Close"></button>
                          </div>
                          <form action="{{ route('tabungan.update', $item->token_tabungan) }}" method="post"
                            class="needs-validation" novalidate>
                            @csrf
                            @method('PATCH')
                            <div class="modal-body">
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="mb-3">
                                        <label for="rekening_id" class="form-label required">No Rekening</label>
                                        <input type="text" class="form-control" name="rekening_id"
                                          value="{{ $item->rekening->no_rekening }}" id="rekening_idd" required
                                          placeholder="masukkan No Rekening(10)" />
                                      </div>
                                    </div>
                                    <input type="text" class="form-control" name="jenis" id="jenis"
                                      value="masuk" hidden />
                                    <div class="col-md-12">
                                      <div class="mb-3">
                                        <label for="jumlah" class="form-label required">Nominal</label>
                                        <input type="number" inputmode="numeric" class="form-control"
                                          value="{{ $item->jumlah }}" name="jumlah" id="jumlah" required
                                          placeholder="min: 10000" />
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                      <div class="mb-3">
                                        <label for="deskripsi" class="form-label">Deskripsi</label>
                                        <input type="text" name="deskripsi" id="deskripsi" class="form-control"
                                          placeholder="deskripsi singkat" value="{{ $item->deskripsi }}">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="mb-3">
                                    <label for="ktpd" class="form-label required">KTP</label>
                                    <input type="number" inputmode="numeric" class="form-control" name="ktp"
                                      id="ktp" placeholder="ktp tidak ditemukan"
                                      value="{{ $item->rekening->ktp }}" disabled />
                                  </div>
                                  <div class="mb-3">
                                    <div id="kartud" class="mb-0">
                                      <div class="card-bx mb-0">
                                        <img src="{{ asset('') }}assets/images/card/{{ $item->rekening->kategori->nama_kategori == 'Pendidikan' ? 'card2.png' : 'card.png' }}" alt=""
                                          class="mw-100">
                                        <div class="card-info text-white">
                                          <p class="mb-1 text-white">Rekening </p>
                                          <h2 class="fs-36 text-white mb-sm-4 mb-3"></h2>
                                          <div class="d-flex align-items-center justify-content-between mb-sm-5 mb-3">
                                            <img src="{{ asset('') }}assets/images/dual-dot.png" alt=""
                                              class="dot-img">
                                            <h4 class="fs-20 text-white mb-0">{{ $item->rekening->no_rekening }}</h4>
                                          </div>
                                          <div class="d-flex">
                                            <div class="me-5">
                                              <p class="fs-14 mb-1 text-white op6">{{ $item->rekening->kategori->nama_kategori }}</p>
                                              <span>{{ $item->rekening->created_at->format('m/y') }}</span>
                                            </div>
                                            <div>
                                              <p class="fs-14 mb-1 text-white op6"></p>
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
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Close
                              </button>
                              <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>

                    <!-- Modal Delete -->
                    <div class="modal fade" id="modalId{{ $item->token_tabungan }}" tabindex="-1"
                      data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                      aria-labelledby="modalTitleId" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                        role="document">
                        <div class="modal-content">
                          <div class="modal-header bg-danger">
                            <h5 class="modal-title" id="modalTitleId">
                              Hapus data {{ $item->rekening->nama_rekening }}
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                              aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            Tabungan {{ $item->jenis }}: @rupiah($item->jumlah)
                          </div>
                          <div class="modal-footer">
                            <form action="{{ route('tabungan.destroy', $item->token_tabungan) }}" method="POST"
                              novalidate>
                              @csrf
                              @method('DELETE')
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Close
                              </button>
                              <button type="submit" class="btn btn-primary">Save</button>
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
              //   console.log(data);
              let saldo = data.saldo.toLocaleString('id-ID', {
                style: 'currency',
                currency: 'IDR'
              });

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
      $('#rekening_ids').on('input', function() {
        const noRekening = $(this).val();
        if (noRekening.length === 10) {
          $.ajax({
            url: `{{ route('rekening.api', '') }}/${noRekening}`,
            method: 'GET',
            success: function(data) {
              //   console.log(data);
              let saldo = data.saldo.toLocaleString('id-ID', {
                style: 'currency',
                currency: 'IDR'
              });;

              $('#ktps').val(data.ktp);
              //   $('#imageKtp').attr('src', `{{ route('ktp', '') }}/${data.foto_ktp}`);
              $('#kartus').html(`<div class="card-bx mb-0">
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
