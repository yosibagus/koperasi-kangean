<x-admin>
    <x-slot:title>@ucfirst(auth()->user()->role) | Pembayaran Pegadaian : {{ auth()->user()->name }}</x-slot:title>
    <div class="container-fluid">
      <div class="form-head mb-4">
        <h2 class="text-black font-w600 mb-0">Pembayaran Pegadaian</h2>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Pembayaran Pegadaian {{ $pegadaian->rekening->nama_rekening }} <br>
                <small>{{ $pegadaian->token_pegadaian }}</small>
              </h4>
              <h5>@rupiah($terbayar) / @rupiah($pegadaian->jumlah + $pegadaian->bunga * (\Carbon\Carbon::parse($pegadaian->created_at)->diffInDays(now()) + 1))</h5>

              <!-- Modal trigger button -->
              <div class="btn-group">
                <a href="{{ route('pegadaian.index') }}" class="btn btn-secondary">Kembali</a>
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
                    <form action="{{ route('pembayaran-pegadaian.store', $pegadaian->token_pegadaian) }}" novalidate
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
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($pembayaranPegadaians as $item)
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
                        <td class="text-start">
                          <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('pembayaran-pegadaian.show', $item->token_pg) }}" data-bs-tooltip="tooltip"
                              data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Cetak Faktur"
                              class="btn btn-primary shadow btn-xs sharp"><i class="fas fa-clipboard"></i></a>
                            <button type="button" data-bs-toggle="modal"
                              data-bs-target="#editTarget{{ $item->token_pg }}" data-bs-tooltip="tooltip"
                              data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                              data-bs-title="Edit Pembayaran" class="btn btn-secondary shadow btn-xs sharp">
                              <i class="fas fa-pencil"></i>
                            </button>
                            <button type="button" class="btn btn-danger shadow btn-xs sharp" data-bs-tooltip="tooltip"
                              data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                              data-bs-title="Hapus Pembayaran" data-bs-toggle="modal"
                              data-bs-target="#basicModal{{ $item->token_pg }}"><i class="fas fa-trash-alt"></i></button>
                          </div>
                        </td>
                      </tr>

                      {{-- modal edit --}}
                      <div class="modal fade" id="editTarget{{ $item->token_pg }}" tabindex="-1" data-bs-backdrop="static"
                        data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                          <div class="modal-content">
                            <form action="{{ route('pembayaran-pegadaian.update', $item->token_pg) }}" novalidate
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
                      <div class="modal fade" id="basicModal{{ $item->token_pg }}">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Hapus {{ $item->pegadaian->rekening->nama_rekening }}</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal">
                              </button>
                            </div>
                            <div class="modal-body">Modal body text goes here.</div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger light"
                                data-bs-dismiss="modal">Close</button>
                              <form action="{{ route('pembayaran-pegadaian.destroy', $item->token_pg) }}"
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
