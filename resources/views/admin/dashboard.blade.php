<x-admin>
  <x-slot:title>@ucfirst(auth()->user()->role) | Dashboard : {{ auth()->user()->name }}</x-slot:title>
  <div class="container-fluid">
    <div class="form-head mb-4">
      <h2 class="text-black font-w600 mb-0">Dashboard</h2>
    </div>
    <div>
      <div class="row">
        <div class="col-xl-4 col-sm-6">
          <div class="card shadow-lg border-0 account-info-area"
            style="background-image: url({{ asset('assets') }}/images/rainbow.gif); background-size: cover; background-blend-mode: overlay; background-color: rgba(135, 206, 250, 10);">
            <div class="card-body d-flex justify-content-center align-items-center text-center" style="height: 100%;">
              <div>
                <h3 class="text-dark fw-bold">Selamat Datang <br> {{ auth()->user()->name }} <br> di @myprofile('nama_profile')</h3>
                <p class="fw-semibold fst-italic" style="color: #0d6e00;">
                  "Amanah, Ridho, Barokah, Sejahtera"
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 col-sm-6">
          <div class="row">
            <div class="col-xl-4 col-sm-6">
              <div class="card">
                <div class="card-body">
                  <div class="media align-items-center invoice-card">
                    <div class="media-body">
                      <h2 class="text-black font-w600">{{ $rekening }}</h2>
                      <span>Total Rekening</span>
                    </div>
                    <span class="p-3 border ms-3 rounded-circle" style="background-color: #fafaf8;">
                      <i class="la la-credit-card" style="font-size: 34px; color: #FFC107;"></i>
                    </span>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-sm-6">
              <div class="card">
                <div class="card-body">
                  <div class="media align-items-center invoice-card">
                    <div class="media-body">
                      <h2 class="text-black font-w600">{{ $cabang }}</h2>
                      <span>Total Cabang</span>
                    </div>
                    <span class="p-3 border ms-3 rounded-circle" style="background-color: #f8f9fa;">
                      <i class="las la-landmark" style="font-size: 34px; color: #004085;"></i>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-sm-6">
              <div class="card">
                <div class="card-body">
                  <div class="media align-items-center invoice-card">
                    <div class="media-body">
                      <h2 class="text-black font-w600">{{ $kategori }}</h2>
                      <span>Total Kategori</span>
                    </div>
                    <span class="p-3 border ms-3 rounded-circle" style="background-color: #f5f5f5;">
                      <i class="las la-tags" style="font-size: 34px; color: #ff5e00;"></i>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6">
              <div class="card">
                <div class="card-body">
                  <div class="media align-items-center invoice-card">
                    <div class="media-body">
                      <h2 class="text-black font-w600">{{ $admin }}</h2>
                      <span>Admin</span>
                    </div>
                    <span class="p-3 border ms-3 rounded-circle" style="background-color: #e6eef1;">
                      <i class="la la-user-tie" style="color: #16A085; font-size: 34px;"></i>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6">
              <div class="card">
                <div class="card-body">
                  <div class="media align-items-center invoice-card">
                    <div class="media-body">
                      <h2 class="text-black font-w600">{{ $operator }}</h2>
                      <span>Operator</span>
                    </div>
                    <span class="p-3 border ms-3 rounded-circle" style="background-color: #f5ece7;">
                      <i class="la la-user-secret" style="font-size: 34px; color: #F39C12;"></i>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6">
              <div class="card">
                <div class="card-body">
                  <div class="media align-items-center invoice-card">
                    <div class="media-body">
                      <h2 class="text-black font-w600">{{ $teller }}</h2>
                      <span>Teller</span>
                    </div>
                    <span class="p-3 border ms-3 rounded-circle" style="background-color: #daeedf;">
                      <i class="la la-user-astronaut" style="font-size: 34px; color: #27AE60;"></i>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6">
              <div class="card">
                <div class="card-body">
                  <div class="media align-items-center invoice-card">
                    <div class="media-body">
                      <h2 class="text-black font-w600">{{ $anggota }}</h2>
                      <span>Anggota</span>
                    </div>
                    <span class="p-3 border ms-3 rounded-circle" style="background-color: #eaeaea;">
                      <i class="la la-user" style="font-size: 34px; color: #BDC3C7;"></i>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-12">
          <div class="d-sm-flex  d-block align-items-center mb-4">
            <div class="me-auto">
              <h4 class="fs-20 text-black">Histori Aktivitas</h4>
              <span class="fs-12">Lorem ipsum dolor sit amet, consectetur</span>
            </div>
            <div class="dropdown custom-dropdown mb-0 mt-3 mt-sm-0">
              <div class="btn btn-primary btn-rounded" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="las la-calendar-alt scale5 me-3"></i>
                Filter Date
                <i class="fa fa-caret-down  ms-3" aria-hidden="true"></i>
              </div>
              <div class="dropdown-menu dropdown-menu-end">
                <a class="dropdown-item" href="javascript:void(0);">Details</a>
                <a class="dropdown-item text-danger" href="javascript:void(0);">Cancel</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-12">
            <div class="table-responsive table-hover fs-14 ">
              <table class="table display mb-4 dataTablesCard p-3" id="example5">
                <thead>
                  <tr>
                    <th>Rekening</th>
                    <th>Tanggal</th>
                    <th>Anggota</th>
                    <th>Aktivitas</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data as $item)
                    <tr>
                      <td><span class="text-black font-w500">#{{ $item->rekening }}</span></td>
                      <td><span class="text-black text-nowrap">#{{ $item->tanggal }}</span></td>
                      <td>
                        <div class="d-flex align-items-center">
                          <div>
                            <h6 class="fs-16 text-black font-w600 mb-0 text-nowrap">{{ $item->anggota }}</h6>
                          </div>
                        </div>
                      </td>
                      <td><span class="text-black">{{ $item->aktivitas }} </span></td>
                      <td ><a href="javascript:void(0)" class="badge badge-sm
                        {{ $item->status == 'masuk' ? 'badge-success' : ($item->status == 'keluar' ? 'badge-danger' : 'badge-warning') }}
                        light ">{{ $item->status }}</a></td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
      </div>
    </div>

  </div>
</x-admin>
