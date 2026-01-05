<x-admin>
  <x-slot:title>@ucfirst(auth()->user()->role) | Pembayaran Pinjaman : {{ auth()->user()->name }}</x-slot:title>
  <div class="container-fluid">
    <div class="form-head mb-4">
      <h2 class="text-black font-w600 mb-0">Pembayaran Pinjaman</h2>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Pembayaran Pinjaman {{ $pinjaman->rekening->nama_rekening }} <br>
              <small>{{ $pinjaman->token_pinjaman }}</small>
            </h4>
            <h5>@rupiah($terbayar) / @rupiah($pinjaman->jumlah + $pinjaman->bunga * (\Carbon\Carbon::parse($pinjaman->created_at)->diffInMonths(now()) + 1))</h5>

            <!-- Modal trigger button -->
            <div class="btn-group">
              <a href="{{ route('pinjaman.index') }}" class="btn btn-secondary">Kembali</a>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalId">
                Bayar
              </button>
            </div>

            <!-- Modal Body -->
            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
            <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
              role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                  <form action="{{ route('pembayaran-pinjaman.store', $pinjaman->token_pinjaman) }}" novalidate
                    method="POST">
                    @csrf
                    <div class="modal-header">
                      <h5 class="modal-title" id="modalTitleId">
                        Form Pembayaran
                      </h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="mb-3">
                        <label for="jumlah" class="form-label">Nominal</label>
                        <input type="number" inputmode="numeric" class="form-control" name="jumlah" id="jumlah"
                          aria-describedby="helpId" placeholder="" />
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
                    <th>Tanggal Pembayaran</th>
                    <th>Jumlah</th>
                    <th>CS</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($pembayaranPinjamans as $item)
                    <tr>
                      <td class="text-center">
                        <strong>{{ $loop->iteration }}</strong>
                      </td>
                      <td>
                        {{ $item->created_at->format('d F Y, H : i T') }} <br>
                        <small>{{ $item->teller->profile->nama_profile }}</small>
                      </td>
                      <td>
                        @rupiah($item->jumlah)
                      </td>
                      <td>
                        <p>{{ $item->teller->name }}</p>
                        <small>{{ $item->teller->role }}</small>
                      </td>
                      <td>
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
                                    href="{{ route('pembayaran-pinjaman.show', $item->token_pp) }}">
                                    Cetak Faktur
                                </a>
                                <a type="button" data-bs-toggle="modal"
                                    data-bs-target="#editTarget{{ $item->token_pp }}"
                                    class="dropdown-item">
                                    Edit Pembayaran
                                </a>
                                <a type="button" data-bs-toggle="modal"
                                    data-bs-target="#basicModal{{ $item->token_pp }}"
                                    class="dropdown-item">
                                    Hapus Pembayaran
                                </a>
                            </div>
                        </div>
                      </td>
                    </tr>

                    {{-- modal edit --}}
                    <div class="modal fade" id="editTarget{{ $item->token_pp }}" tabindex="-1" data-bs-backdrop="static"
                      data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                        <div class="modal-content">
                          <form action="{{ route('pembayaran-pinjaman.update', $item->token_pp) }}" novalidate
                            method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="modal-header">
                              <h5 class="modal-title" id="modalTitleId">
                                Form Edit Pembayaran
                              </h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <div class="mb-3">
                                <label for="jumlah" class="form-label">Nominal</label>
                                <input type="number" inputmode="numeric" class="form-control" name="jumlah"
                                  id="jumlah" aria-describedby="helpId" placeholder="" value="{{ $item->jumlah }}" />
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
                    <div class="modal fade" id="basicModal{{ $item->token_pp }}">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Hapus {{ $item->pinjaman->rekening->nama_rekening }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                            </button>
                          </div>
                          <div class="modal-body">Modal body text goes here.</div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger light"
                              data-bs-dismiss="modal">Close</button>
                            <form action="{{ route('pembayaran-pinjaman.destroy', $item->token_pp) }}"
                              method="POST">
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
</x-admin>
