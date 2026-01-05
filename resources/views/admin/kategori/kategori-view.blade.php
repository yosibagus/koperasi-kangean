<x-admin>
    <x-slot:title>@ucfirst(auth()->user()->role) | Kategori : {{ auth()->user()->name }}</x-slot:title>
  <div class="container-fluid">
    <div class="form-head mb-4">
      <h2 class="text-black font-w600">Kategori</h2>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header border-bottom border-primary">
            <h4 class="card-title">List Kategori</h4>
            <button type="button" class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
              aria-controls="offcanvasRight"><i class="fa-sharp fa-regular fa-plus fw-bold"></i> Tambah
              Kategori</button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight"
              aria-labelledby="offcanvasRightLabel">
              <div class="offcanvas-header border-bottom border-primary">
                <h5 class="offcanvas-title" id="offcanvasRightLabel">Form Tambah kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
              </div>
              <div class="offcanvas-body">
                <form class="form-valide-with-icon needs-validation" novalidate method="POST"
                  action="{{ route('kategori.store') }}">
                  @csrf
                  <div class="mb-3 vertical-radius">
                    <label class="text-label form-label required" for="nama_kategori">Nama Kategori</label>
                    <div class="input-group validate-username">
                      <span class="input-group-text search_icon"> <i class="fa fa-user"></i>
                      </span>
                      <input type="text" class="form-control br-style @error('nama_kategori') is-invalid @enderror"
                        id="nama_kategori" placeholder="Masukkan nama kategori.." required name="nama_kategori">
                      <div class="invalid-feedback">
                        @error('nama_kategori')
                          {{ $message }}
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="mb-3 vertical-radius">
                    <label class="text-label form-label required" for="min_saldo">Minimal Saldo</label>
                    <div class="input-group validate-username">
                        <span class="input-group-text search_icon "> Rp</i>
                        </span>
                      <input type="number" class="form-control br-style @error('min_saldo') is-invalid @enderror"
                        id="min_saldo" name="min_saldo" placeholder="Ex: 10000000" step="0.01" required>
                      <div class="invalid-feedback">
                        @error('min_saldo')
                          {{ $message }}
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="mb-3 vertical-radius">
                    <label class="text-label form-label required" for="biaya">Biaya</label>
                    <div class="input-group validate-username">
                      <input type="number" class="form-control text-end @error('biaya') is-invalid @enderror"
                        id="biaya" name="biaya" placeholder="Ex: 0,3" step="0.01" required>
                      <span class="input-group-text search_icon br-style"> %</i>
                      </span>
                      <div class="invalid-feedback">
                        @error('biaya')
                          {{ $message }}
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="mb-3 vertical-radius">
                    <label class="text-label form-label required" for="deskripsi">Deskripsi</label>
                    <div class="input-group validate-username">
                      <textarea name="deskripsi" id="deskripsi" cols="100%" rows="10" class="form-control"
                        placeholder="Masukkan Deskripsi..."></textarea>
                      <div class="invalid-feedback">
                        Salah
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn me-2 btn-primary">Submit</button>
                  <button type="button" class="btn btn-danger light" data-bs-dismiss="offcanvas"
                    aria-label="Close">Cancel</button>
                </form>
              </div>
            </div>

          </div>
          <div class="card-body">
            <div class="table-responsive table-hover">
              <table id="example3" class="display min-w850 mb-4 border-bottom border-top">
                <thead>
                  <tr>
                    <th class="text-center">#</th>
                    <th>Name</th>
                    <th>Minimal Saldo</th>
                    <th>Biaya</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($kategoris as $item)
                    <tr>
                      <td class="text-center">
                        <strong>{{ $loop->iteration }}</strong>
                      </td>
                      <td>
                        {{ $item->nama_kategori }}
                      </td>
                        <td>
                            @rupiah($item->min_saldo)
                        </td>
                      <td>
                        @percentage($item->biaya)
                      </td>
                      <td class="text-center">
                        <div class="d-flex justify-content-center gap-2">
                          <button type="submit" class="btn btn-primary shadow btn-xs sharp" data-bs-toggle="modal" data-bs-target="#exampleModalLong{{ $item->token_kategori }}"
                            data-bs-tooltip="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                            data-bs-title="Edit Kategori">
                            <i class="fas fa-pencil-alt"></i>
                          </button>
                          <button type="button" class="btn btn-danger shadow btn-xs sharp" data-bs-toggle="modal" data-bs-target="#basicModal{{ $item->token_kategori }}"
                            data-bs-tooltip="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                            data-bs-title="Hapus Kategori">
                            <i class="fas fa-trash-alt"></i>
                          </button>
                        </div>
                      </td>
                    </tr>

                    <!-- Modal delete -->
                    <div class="modal fade" id="basicModal{{ $item->token_kategori }}">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Hapus {{ $item->nama_kategori }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                    </button>
                                </div>
                                <div class="modal-body">Modal body text goes here.</div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                    <form action="{{ route('kategori.destroy', $item->token_kategori) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="exampleModalLong{{ $item->token_kategori }}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Form Edit Kategori {{ $item->nama_kategori }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                    </button>
                                </div>
                                <form action="{{ route('kategori.update', $item->token_kategori) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body">
                                        <div class="mb-3 vertical-radius">
                                            <label class="text-label form-label required" for="nama_kategori">Nama Kategori</label>
                                            <div class="input-group validate-username">
                                              <span class="input-group-text search_icon"> <i class="fa fa-user"></i>
                                              </span>
                                              <input type="text" class="form-control br-style @error('nama_kategori') is-invalid @enderror"
                                                id="nama_kategori" placeholder="Masukkan nama kategori.." required name="nama_kategori" value="{{ $item->nama_kategori }}">
                                              <div class="invalid-feedback">
                                                @error('nama_kategori')
                                                  {{ $message }}
                                                @enderror
                                              </div>
                                            </div>
                                          </div>
                                          <div class="mb-3 vertical-radius">
                                            <label class="text-label form-label required" for="min_saldo">Minimal Saldo</label>
                                            <div class="input-group validate-username">
                                                <span class="input-group-text search_icon "> Rp</i>
                                                </span>
                                              <input type="number" class="form-control br-style @error('min_saldo') is-invalid @enderror" value="{{ $item->min_saldo }}"
                                                id="min_saldo" name="min_saldo" placeholder="Ex: 10000000" step="0.01" required>
                                              <div class="invalid-feedback">
                                                @error('min_saldo')
                                                  {{ $message }}
                                                @enderror
                                              </div>
                                            </div>
                                          </div>
                                          <div class="mb-3 vertical-radius">
                                            <label class="text-label form-label required" for="biaya">Biaya</label>
                                            <div class="input-group validate-username">
                                              <input type="number" class="form-control text-end @error('biaya') is-invalid @enderror"
                                                id="biaya" name="biaya" placeholder="Ex: 0,3" step="0.01" required value="{{ $item->biaya }}">
                                              <span class="input-group-text search_icon br-style"> %</i>
                                              </span>
                                              <div class="invalid-feedback">
                                                @error('biaya')
                                                  {{ $message }}
                                                @enderror
                                              </div>
                                            </div>
                                          </div>
                                          <div class="mb-3 vertical-radius">
                                            <label class="text-label form-label required" for="deskripsi">Deskripsi</label>
                                            <div class="input-group validate-username">
                                              <textarea name="deskripsi" id="deskripsi" cols="100%" rows="10" class="form-control"
                                                placeholder="Masukkan Deskripsi...">{{ $item->deskripsi }}</textarea>
                                              <div class="invalid-feedback">
                                                Salah
                                              </div>
                                            </div>
                                          </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
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
