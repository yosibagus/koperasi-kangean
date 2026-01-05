<x-admin>
  <x-slot:title>@ucfirst(auth()->user()->role) | Pegadaian : {{ auth()->user()->name }}</x-slot:title>
  <div class="container-fluid">
    <div class="form-head mb-4">
      <h2 class="text-black font-w600 mb-0">Pegadaian</h2>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Data Pegadaian</h4>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pegadaian">+ Buat
              Pegadaian</button>

            <!-- Modal -->
            <div class="modal fade" id="pegadaian" tabindex="-1" role="dialog" aria-labelledby="modalTitleId"
              aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <form action="{{ route('pegadaian.store') }}" method="POST" enctype="multipart/form-data" novalidate
                    class="needs-validation">
                    @csrf
                    <div class="modal-header">
                      <h5 class="modal-title" id="modalTitleId">
                        Form Pegadaian
                      </h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="mb-3">
                                <label for="rekening_id" class="form-label">No Rekening</label>
                                <input type="number" inputmode="numeric"
                                  class="form-control @error('rekening_id') 'is-invalid' @enderror" name="rekening_id"
                                  id="rekening_id" aria-describedby="helpId" placeholder="" />
                                <div class="invalid-feedback">
                                  @error('rekening_id')
                                    {{ $message }}
                                  @enderror
                                </div>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="mb-3">
                                <label for="jumlah" class="form-label">Nominal</label>
                                <input type="number" inputmode="numeric"
                                  class="form-control @error('jumlah') 'is-invalid' @enderror" name="jumlah"
                                  id="jumlah" aria-describedby="helpId" placeholder="" />
                                <div class="invalid-feedback">
                                  @error('jumlah')
                                    {{ $message }}
                                  @enderror
                                </div>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="mb-3">
                                <label for="gambar_barang" class="form-label required">Foto Barang</label>
                                <input type="file" class="form-control" id="gambar_barang" name="gambar_barang"
                                  onchange="previewImage(event, 'previewLogo')">
                                <small class="form-text text-muted">Upload foto barang.</small>
                                <img id="previewLogo" src="" alt="Preview Logo" class="img-thumbnail mt-2"
                                  style="display: none; max-width: 100%; height: auto;" width="100%">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="mb-3">
                                <label for="ktp" class="form-label required">KTP</label>
                                <input type="text" class="form-control" name="ktp" id="ktp"
                                  aria-describedby="helpId" placeholder="" disabled />
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="mb-3">
                                <div id="kartu"></div>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="mb-3">
                                <label for="detail_barang" class="form-label">Detail Barang</label>
                                <textarea class="form-control text-start" name="detail_barang" id="detail_barang" rows="3"
                                  placeholder="Isi detail barang"></textarea>
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

          </div>
          <div class="card-body">
            <div class="table table-responsive table-hover">
              <table id="example3" class="display min-w850 mb-4 border-bottom border-top">
                <thead>
                  <tr>
                    <th class="text-center">#</th>
                    <th>Nama</th>
                    <th>Rekening</th>
                    <th>Tanggal Gadai</th>
                    <th>Pokok Gadai</th>
                    <th class="text-start">Status</th>
                    @if (auth()->user()->role != 'teller')
                      <th>CS</th>
                    @endif
                    <th class="text-start">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($pegadaians as $item)
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
                        @elseif ($item->status == 'gadai')
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
                            <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24">
                                </rect>
                                <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                              </g>
                            </svg>
                          </div>
                          <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="{{ route('pegadaian.show', $item->token_pegadaian) }}">
                              Cetak Faktur
                            </a>
                            <a class="dropdown-item"
                              href="{{ route('pembayaran-pegadaian.index', $item->token_pegadaian) }}">
                              Detail Pembayaran
                            </a>
                            <a type="button" data-bs-toggle="modal"
                              data-bs-target="#editTarget{{ $item->token_pegadaian }}" class="dropdown-item">
                              Edit Pegadaian
                            </a>
                            <a type="button" data-bs-toggle="modal"
                              data-bs-target="#basicModal{{ $item->token_pegadaian }}" class="dropdown-item">
                              Hapus Pegadaian
                            </a>
                          </div>
                        </div>
                      </td>
                    </tr>

                    {{-- modal edit --}}
                    <div class="modal fade" id="editTarget{{ $item->token_pegadaian }}" tabindex="-1"
                      role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <form action="{{ route('pegadaian.update', $item->token_pegadaian) }}" method="POST"
                            enctype="multipart/form-data" novalidate class="needs-validation">
                            @csrf
                            @method('PATCH')
                            <div class="modal-header">
                              <h5 class="modal-title" id="modalTitleId">
                                Form Edit Pegadaian
                              </h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="mb-3">
                                        <label for="rekening_ids" class="form-label">No Rekening</label>
                                        <input type="number" inputmode="numeric"
                                          value="{{ $item->rekening->no_rekening }}"
                                          class="form-control @error('rekening_id') 'is-invalid' @enderror"
                                          name="rekening_id" id="rekening_ids" aria-describedby="helpId"
                                          placeholder="" />
                                        <div class="invalid-feedback">
                                          @error('rekening_id')
                                            {{ $message }}
                                          @enderror
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                      <div class="mb-3">
                                        <label for="jumlah" class="form-label">Nominal</label>
                                        <input type="number" inputmode="numeric" value="{{ $item->jumlah }}"
                                          class="form-control @error('jumlah') 'is-invalid' @enderror" name="jumlah"
                                          id="jumlah" aria-describedby="helpId" placeholder="" />
                                        <div class="invalid-feedback">
                                          @error('jumlah')
                                            {{ $message }}
                                          @enderror
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                      <div class="mb-3">
                                        <label for="gambar_barang" class="form-label required">Foto Barang</label>
                                        <input type="file" class="form-control" id="gambar_barang"
                                          name="gambar_barang"
                                          onchange="previewImage(event, 'previewLogo{{ $item->token_pegadaian }}')">
                                        <small class="form-text text-muted">Upload foto barang.</small>
                                        <img id="previewLogo{{ $item->token_pegadaian }}"
                                          src="{{ asset('images/gadai/' . $item->gambar_barang) }}" alt="Preview Logo"
                                          class="img-thumbnail mt-2" style=" max-width: 100%; height: auto;"
                                          width="100%">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="mb-3">
                                        <label for="ktps" class="form-label required">KTP</label>
                                        <input type="text" class="form-control" name="ktp" id="ktp"
                                          value="{{ $item->rekening->ktp }}" aria-describedby="helpId"
                                          placeholder="" disabled />
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                      <div class="mb-3">
                                        <div id="kartus">
                                          <div class="card-bx mb-0">
                                            <img
                                              src="{{ asset('') }}assets/images/card/{{ $item->rekening->kategori->nama_kategori == 'Pendidikan' ? 'card2.png' : 'card.png' }}"
                                              alt="" class="mw-100">
                                            <div class="card-info text-white">
                                              <p class="mb-1 text-white">Rekening </p>
                                              <h2 class="fs-36 text-white mb-sm-4 mb-3"></h2>
                                              <div
                                                class="d-flex align-items-center justify-content-between mb-sm-5 mb-3">
                                                <img src="{{ asset('') }}assets/images/dual-dot.png"
                                                  alt="" class="dot-img">
                                                <h4 class="fs-20 text-white mb-0">{{ $item->rekening->no_rekening }}
                                                </h4>
                                              </div>
                                              <div class="d-flex">
                                                <div class="me-5">
                                                  <p class="fs-14 mb-1 text-white op6">
                                                    {{ $item->rekening->kategori->nama_kategori }}</p>
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
                                    <div class="col-md-12">
                                      <div class="mb-3">
                                        <label for="detail_barang" class="form-label">Detail Barang</label>
                                        <textarea class="form-control text-start" name="detail_barang" id="detail_barang" rows="3"
                                          placeholder="Isi detail barang">{!! $item->detail_barang !!}</textarea>
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

                    <!-- Modal delete -->
                    <div class="modal fade" id="basicModal{{ $item->token_pegadaian }}">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Hapus {{ $item->rekening->nama_rekening }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                            </button>
                          </div>
                          <div class="modal-body">Modal body text goes here.</div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger light"
                              data-bs-dismiss="modal">Close</button>
                            <form action="{{ route('pegadaian.destroy', $item->token_pegadaian) }}" method="POST">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-primary">Save changes</button>
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
  <script>
    function previewImage(event, previewId) {
      const file = event.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
          const preview = document.getElementById(previewId);
          preview.src = e.target.result;
          preview.style.display = "block";
        };
        reader.readAsDataURL(file);
      } else {
        alert("Hanya file PNG yang diperbolehkan.");
        event.target.value = ""; // Reset input jika bukan PNG
      }
    }
  </script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#rekening_id').on('input', function() {
        const noRekning = $(this).val();
        if (noRekning.length === 10) {
          $.ajax({
            url: `{{ route('rekening.api', '') }}/${noRekning}`,
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
              console.log('Error:', error);
            }
          });
        }
      });
    });
  </script>
</x-admin>
