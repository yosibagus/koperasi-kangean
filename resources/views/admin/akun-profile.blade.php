<x-admin>
  <x-slot:title>@ucfirst(auth()->user()->role) | Profil Akun : {{ auth()->user()->name }}</x-slot:title>
  <div class="container-fluid">

    <div class="row">
      <div class="col-lg-12">
        <div class="profile card card-body px-3 pt-3 pb-0">
          <div class="profile-head">
            <div class="photo-content">
              <div class="cover-photo rounded"></div>
            </div>
            <div class="profile-info">
              <div class="profile-photo">
                <img
                  src="{{ auth()->user()->foto_user && file_exists(public_path('images/user/' . auth()->user()->foto_user)) ? asset('images/user/' . auth()->user()->foto_user) : asset('images/user/default.png') }}"
                  class="img-fluid rounded-circle" alt="">
              </div>
              <div class="profile-details">
                <div class="profile-name px-3 pt-2">
                  <h4 class="text-primary mb-0">{{ auth()->user()->name }}</h4>
                  <p>@ucfirst(auth()->user()->role)</p>
                </div>
                <div class="profile-email px-2 pt-2">
                  <h4 class="text-muted mb-0">{{ auth()->user()->email }}</h4>
                  <p>Email</p>
                </div>
                <div class="ms-auto">
                  <button class="btn btn-danger sharp sweet-confirm">
                    <i class="fa fa-trash me-2"></i> Delete Account
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xl-6">
        <div class="card">
          <div class="card-header">
            <div>
              <h4 class="text-primary">Informasi Profil</h4>
              <small class="d-block">Perbarui informasi profil dan alamat email akun Anda.</small>
            </div>
          </div>
          <div class="card-body">
            <form action="{{ route('settings.update') }}" method="POST" class="form-valide-with-icon needs-validation" novalidate>
              @csrf
              @method('PATCH')
              <div class="mb-3 vertical-radius">
                <label class="text-label form-label required" for="validationCustomUsername">Username</label>
                <div class="input-group validate-username">
                  <span class="input-group-text search_icon"> <i class="fa fa-user"></i>
                  </span>
                  <input type="text" class="form-control br-style" id="validationCustomUsername"
                    placeholder="Username" name="name" required value="{{ auth()->user()->name }}">
                  <div class="invalid-feedback">
                    Please Enter a username.
                  </div>
                </div>
              </div>
              <div class="mb-3 vertical-radius">
                <label class="text-label form-label required" for="validationCustomUsername">Email</label>
                <div class="input-group validate-username">
                  <span class="input-group-text search_icon">
                    <strong>@</strong>
                  </span>
                  <input type="text" class="form-control br-style" id="validationCustomUsername" value="{{ auth()->user()->email }}"
                    placeholder="hello@example.com" name="email" required>
                  <div class="invalid-feedback">
                    Please Enter a username.
                  </div>
                </div>
              </div>
              <button type="submit" class="btn me-2 btn-primary">Simpan</button>
            </form>
          </div>
        </div>
      </div>
      <div class="col-xl-6">
        <div class="card">
          <div class="card-header">
            <div>
              <h4 class="text-primary">Perbarui Kata Sandi</h4>
              <small class="d-block">Pastikan akun Anda menggunakan kata sandi acak yang panjang agar tetap aman.</small>
            </div>
          </div>
          <div class="card-body">
            <form action="" method="POST" class="form-valide-with-icon needs-validation" novalidate>
              @csrf
              <div class="mb-3 vertical-radius ">
                <label class="text-label form-label required" for="dz-password">Kata sandi saat ini</label>
                <div class="input-group transparent-append  validate-password">
                  <span class="input-group-text search_icon"> <i class="fa fa-lock"></i>
                  </span>
                  <input type="password" class="form-control" id="dz-password" placeholder="123456"
                    required>
                  <span class="input-group-text search_icon show-pass br-style">
                    <i class="fa fa-eye-slash"></i>
                    <i class="fa fa-eye"></i>
                  </span>
                  <div class="invalid-feedback">
                    Please Enter a username.
                  </div>
                </div>
              </div>
              <div class="mb-3 vertical-radius ">
                <label class="text-label form-label required" for="dz-password">Kata sandi baru</label>
                <div class="input-group transparent-append  validate-password">
                  <span class="input-group-text search_icon"> <i class="fa fa-lock"></i>
                  </span>
                  <input type="password" class="form-control" id="dz-password" placeholder="123456"
                    required>
                  <span class="input-group-text search_icon show-pass br-style">
                    <i class="fa fa-eye-slash"></i>
                    <i class="fa fa-eye"></i>
                  </span>
                  <div class="invalid-feedback">
                    Please Enter a username.
                  </div>
                </div>
              </div>
              <div class="mb-3 vertical-radius ">
                <label class="text-label form-label required" for="dz-password">Konfirmasikan Kata Sandi</label>
                <div class="input-group transparent-append  validate-password">
                  <span class="input-group-text search_icon"> <i class="fa fa-lock"></i>
                  </span>
                  <input type="password" class="form-control" id="dz-password" placeholder="123456"
                    required>
                  <span class="input-group-text search_icon show-pass br-style">
                    <i class="fa fa-eye-slash"></i>
                    <i class="fa fa-eye"></i>
                  </span>
                  <div class="invalid-feedback">
                    Please Enter a username.
                  </div>
                </div>
              </div>
              <button type="submit" class="btn me-2 btn-primary">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
</x-admin>
