<x-admin>
  <x-slot:title>@ucfirst(auth()->user()->role) | Service : {{ auth()->user()->name }}</x-slot:title>
  <div class="container-fluid">
    <div class="form-head mb-4">
      <h2 class="text-black font-w600">Customer Service</h2>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="default-tab">
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" data-bs-toggle="tab" href="#home"><i
                      class="la la-user-astronaut me-2"></i> Teller</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="tab" href="#profile"><i class="la la-user-tie me-2"></i> Admin</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="tab" href="#contact"><i class="la la-user-secret me-2"></i>
                    Operator</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="tab" href="#anggota"><i class="la la-user me-2"></i>
                    Anggota</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-danger" data-bs-toggle="tab" href="#ditangguhkan"><i
                      class="la la-user-slash me-2 text-danger"></i>
                    Ditangguhkan</a>
                </li>
                <li class="nav-item ms-auto mb-2 me-3">
                  <a class="btn btn-primary" href="{{ route('customer-service.create') }}">+ Tambah CS</a>
                </li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane fade show active" id="home" role="tabpanel">
                  <div class="pt-4">
                    <div class="table-responsive table-hover">
                      <table id="example3" class="display min-w850 mb-4 border-bottom border-top">
                        <thead>
                          <tr>
                            <th class="text-center">#</th>
                            <th>Nama</th>
                            <th>Kantor</th>
                            <th>Email</th>
                            <th class="text-start">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($customer_services->where('role', 'teller') as $teller)
                            <tr>
                              <td class="text-center">
                                <strong>{{ $loop->iteration }}</strong>
                              </td>
                              <td>
                                {{ $teller->name }}
                              </td>
                              <td>
                                <p>{{ $teller->profile->nama_profile }}</p>
                                <small>{{ $teller->profile->no_profile }}</small>
                              </td>
                              <td>
                                {{ $teller->email }}
                              </td>
                              <td class="text-start">
                                <div class="d-flex justify-content-start gap-2">
                                  <a href="{{ route('customer-service.edit', $teller->token_user) }}"
                                    class="btn btn-primary shadow btn-xs sharp" data-bs-tooltip="tooltip" data-bs-placement="top"
                                    data-bs-custom-class="custom-tooltip" data-bs-title="Edit Teler">
                                    <i class="fas fa-pencil-alt"></i>
                                  </a>
                                  <button type="button" class="btn btn-danger shadow btn-xs sharp"
                                    data-bs-toggle="modal" data-bs-target="#basicModal{{ $teller->token_user }}" data-bs-tooltip="tooltip"
                                    data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Hapus Teler">
                                    <i class="fas fa-trash-alt"></i>
                                  </button>
                                </div>
                              </td>
                            </tr>

                            <!-- Modal delete -->
                            <div class="modal fade" id="basicModal{{ $teller->token_user }}">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title">Hapus {{ $teller->name }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                    </button>
                                  </div>
                                  <div class="modal-body">Modal body text goes here.</div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-danger light"
                                      data-bs-dismiss="modal">Close</button>
                                    <form action="{{ route('customer-service.destroy', $teller->token_user) }}"
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
                <div class="tab-pane fade" id="profile">
                  <div class="pt-4">
                    <div class="table-responsive table-hover">
                      <table id="example3" class="display min-w850 mb-4 border-bottom border-top">
                        <thead>
                          <tr>
                            <th class="text-center">#</th>
                            <th>Nama</th>
                            <th>Kantor</th>
                            <th>Email</th>
                            <th class="text-start">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($customer_services->where('role', 'admin') as $admin)
                            <tr>
                              <td class="text-center">
                                <strong>{{ $loop->iteration }}</strong>
                              </td>
                              <td>
                                {{ $admin->name }}
                              </td>
                              <td>
                                <p>{{ $admin->profile->nama_profile }}</p>
                                <small>{{ $admin->profile->no_profile }}</small>
                              </td>
                              <td>
                                {{ $admin->email }}
                              </td>
                              <td class="text-start">
                                <div class="d-flex justify-content-start gap-2">
                                  <a href="{{ route('customer-service.edit', $admin->token_user) }}"
                                    class="btn btn-primary shadow btn-xs sharp" data-bs-tooltip="tooltip" data-bs-placement="top"
                                    data-bs-custom-class="custom-tooltip" data-bs-title="Edit Admin">
                                    <i class="fas fa-pencil-alt"></i>
                                  </a>
                                  <button type="button" class="btn btn-danger shadow btn-xs sharp"
                                    data-bs-toggle="modal" data-bs-target="#basicModal{{ $admin->token_user }}" data-bs-tooltip="tooltip"
                                    data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Hapus Admin">
                                    <i class="fas fa-trash-alt"></i></button>
                                </div>
                              </td>
                            </tr>

                            <!-- Modal delete -->
                            <div class="modal fade" id="basicModal{{ $admin->token_user }}">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title">Hapus {{ $admin->name }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                    </button>
                                  </div>
                                  <div class="modal-body">Modal body text goes here.</div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-danger light"
                                      data-bs-dismiss="modal">Close</button>
                                    <form action="{{ route('customer-service.destroy', $admin->token_user) }}"
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
                <div class="tab-pane fade" id="contact">
                  <div class="pt-4">
                    <div class="table-responsive table-hover">
                      <table id="example3" class="display min-w850 mb-4 border-bottom border-top">
                        <thead>
                          <tr>
                            <th class="text-center">#</th>
                            <th>Nama</th>
                            <th>Kantor</th>
                            <th>Email</th>
                            <th class="text-start">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($customer_services->where('role', 'operator') as $operator)
                            <tr>
                              <td class="text-center">
                                <strong>{{ $loop->iteration }}</strong>
                              </td>
                              <td>
                                {{ $operator->name }}
                              </td>
                              <td>
                                <p>{{ $operator->profile->nama_profile }}</p>
                                <small>{{ $operator->profile->no_profile }}</small>
                              </td>
                              <td>
                                {{ $operator->email }}
                              </td>
                              <td class="text-start">
                                <div class="d-flex justify-content-start gap-2">
                                  <a href="{{ route('customer-service.edit', $operator->token_user) }}"
                                    class="btn btn-primary shadow btn-xs sharp" data-bs-tooltip="tooltip" data-bs-placement="top"
                                    data-bs-custom-class="custom-tooltip" data-bs-title="Edit Operator">
                                    <i class="fas fa-pencil-alt"></i>
                                  </a>
                                  <button type="button" class="btn btn-danger shadow btn-xs sharp"
                                    data-bs-toggle="modal" data-bs-target="#basicModal{{ $operator->token_user }}" data-bs-tooltip="tooltip"
                                    data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Hapus Operator">
                                    <i class="fas fa-trash-alt"></i></button>
                                </div>
                              </td>
                            </tr>

                            <!-- Modal delete -->
                            <div class="modal fade" id="basicModal{{ $operator->token_user }}">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title">Hapus {{ $operator->name }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                    </button>
                                  </div>
                                  <div class="modal-body">Modal body text goes here.</div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-danger light"
                                      data-bs-dismiss="modal">Close</button>
                                    <form action="{{ route('customer-service.destroy', $operator->token_user) }}"
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
                <div class="tab-pane fade" id="anggota">
                  <div class="pt-4">
                    <div class="table-responsive table-hover">
                      <table id="example3" class="display min-w850 mb-4 border-bottom border-top">
                        <thead>
                          <tr>
                            <th class="text-center">#</th>
                            <th>Nama</th>
                            <th>Kantor</th>
                            <th>Email</th>
                            <th class="text-start">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($customer_services->where('role', 'anggota') as $anggota)
                            <tr>
                              <td class="text-center">
                                <strong>{{ $loop->iteration }}</strong>
                              </td>
                              <td>
                                {{ $anggota->name }}
                              </td>
                              <td>
                                <p>{{ $anggota->profile->nama_profile }}</p>
                                <small>{{ $anggota->profile->no_profile }}</small>
                              </td>
                              <td>
                                {{ $anggota->email }}
                              </td>
                              <td class="text-start">
                                <div class="d-flex justify-content-start gap-2">
                                  <a href="{{ route('customer-service.edit', $anggota->token_user) }}"
                                    class="btn btn-primary shadow btn-xs sharp" data-bs-tooltip="tooltip" data-bs-placement="top"
                                    data-bs-custom-class="custom-tooltip" data-bs-title="Edit Anggota">
                                    <i class="fas fa-pencil-alt"></i>
                                  </a>
                                  <button type="button" class="btn btn-danger shadow btn-xs sharp"
                                    data-bs-toggle="modal" data-bs-target="#basicModal{{ $anggota->token_user }}" data-bs-tooltip="tooltip"
                                    data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Hapus Anggota">
                                    <i class="fas fa-trash-alt"></i>
                                  </button>
                                </div>
                              </td>
                            </tr>

                            <!-- Modal delete -->
                            <div class="modal fade" id="basicModal{{ $anggota->token_user }}">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title">Hapus {{ $anggota->name }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                    </button>
                                  </div>
                                  <div class="modal-body">Modal body text goes here.</div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-danger light"
                                      data-bs-dismiss="modal">Close</button>
                                    <form action="{{ route('customer-service.destroy', $anggota->token_user) }}"
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
                <div class="tab-pane fade" id="ditangguhkan">
                  <div class="pt-4">
                    <div class="table-responsive table-hover">
                      <table id="example3" class="display min-w850 mb-4 border-bottom border-top">
                        <thead>
                          <tr>
                            <th class="text-center">#</th>
                            <th>Nama</th>
                            <th>Kantor</th>
                            <th>Email</th>
                            <th class="text-start">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($ditangguhkan as $blokir)
                            <tr>
                              <td class="text-center">
                                <strong>{{ $loop->iteration }}</strong>
                              </td>
                              <td>
                                {{ $blokir->name }}
                              </td>
                              <td>
                                <p>{{ $blokir->profile->nama_profile }}</p>
                                <small>{{ $blokir->profile->no_profile }}</small>
                              </td>
                              <td>
                                {{ $blokir->email }}
                              </td>
                              <td class="text-start">
                                <div class="d-flex justify-content-start gap-2">
                                  <button type="button" class="btn btn-primary shadow btn-xs sharp" data-bs-toggle="modal"
                                  data-bs-target="#modalId{{ $blokir->token_user }}" data-bs-tooltip="tooltip" data-bs-placement="top"
                                  data-bs-custom-class="custom-tooltip" data-bs-title="Pulihkan Akun">
                                  <i class="fas fa-pencil-alt"></i>
                                </button>
                                  <button type="button" class="btn btn-danger shadow btn-xs sharp"
                                    data-bs-toggle="modal" data-bs-target="#basicModal{{ $blokir->token_user }}" data-bs-tooltip="tooltip"
                                    data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Hapus Akun">
                                    <i class="fas fa-trash-alt"></i>
                                  </button>
                                </div>
                              </td>
                            </tr>

                            <!-- Modal Body -->
                            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                            <div class="modal fade" id="modalId{{ $blokir->token_user }}" tabindex="-1" data-bs-backdrop="static"
                              data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId"
                              aria-hidden="true">
                              <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="modalTitleId">
                                      Buka Akun?
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                      aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">Anda yakin ingin membuka akun {{ $blokir->name }}</div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                      Close
                                    </button>
                                    <form action="{{ route('unsuspend', $blokir->token_user) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>


                            <!-- Modal delete -->
                            <div class="modal fade" id="basicModal{{ $blokir->token_user }}">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title">Hapus {{ $blokir->name }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                    </button>
                                  </div>
                                  <div class="modal-body">Modal body text goes here.</div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-danger light"
                                      data-bs-dismiss="modal">Close</button>
                                    <form action="{{ route('customer-service.destroy', $blokir->token_user) }}"
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
        </div>
      </div>
    </div>
  </div>
</x-admin>
