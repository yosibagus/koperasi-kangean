<x-admin>
    <x-slot:title>@ucfirst(auth()->user()->role) | Edit CS : {{ auth()->user()->name }}</x-slot:title>
    <div class="container-fluid">
      <div class="form-head mb-4">
        <h2 class="text-black font-w600">Edit CS</h2>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <form action="{{ route('customer-service.update', $customer_service->token_user) }}" method="POST" enctype="multipart/form-data" novalidate
                class="needs-validation">
                @csrf
                @method('PATCH')
                <div class="row">
                  <div class="col-lg-8">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="mb-3 vertical-radius">
                          <label class="text-label form-label required" for="name">Nama</label>
                          <div class="input-group validate-username">
                            <span class="input-group-text search_icon"> <i class="fa fa-user"></i>
                            </span>
                            <input type="text" class="form-control br-style @error('name') is-invalid @enderror"
                              id="name" placeholder="Masukkan nama kategori.." required name="name" value="{{ $customer_service->name }}">
                            <div class="invalid-feedback">
                              @error('name')
                                {{ $message }}
                              @enderror
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="mb-3 vertical-radius">
                          <label class="text-label form-label required" for="email">Email</label>
                          <div class="input-group validate-username">
                            <span class="input-group-text search_icon"> <i class="fa fa-envelope"></i>
                            </span>
                            <input type="email" class="form-control br-style @error('email') is-invalid @enderror"
                              id="email" placeholder="example@gmail.com" required name="email" value="{{ $customer_service->email }}">
                            <div class="invalid-feedback">
                              @error('email')
                                {{ $message }}
                              @enderror
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="mb-3 vertical-radius">
                          <label class="text-label form-label required" for="role">role</label>
                          <div class="input-group validate-username">
                            <span class="input-group-text search_icon"> <i class="fa fa-users"></i>
                            </span>
                            <select class="form-control @error('role') is-invalid @enderror" id="role"
                              placeholder="Masukkan nama kategori.." required name="role">
                              <option value="" selected disabled>Pilih Role</option>
                              <option value="teller" {{ $customer_service->role == 'teller' ? 'selected' : '' }}>Teller</option>
                              <option value="admin" {{ $customer_service->role == 'admin' ? 'selected' : '' }}>Admin</option>
                              <option value="operator" {{ $customer_service->role == 'operator' ? 'selected' : '' }}>Operator</option>
                            </select>
                            <div class="invalid-feedback">
                              @error('role')
                                {{ $message }}
                              @enderror
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label for="logoText">Upload Foto Profil</label>
                      <input type="file" class="form-control" id="logoText" name="foto_user"
                        onchange="previewImage(event, 'previewLogoText')">
                      <small class="form-text text-muted">Hanya file .png, .jpg, .jpeg yang diperbolehkan.</small>
                      <img id="previewLogoText" src="{{ asset('images/user/'.$customer_service->foto_user) }}" alt="Preview Logo Text" class="img-thumbnail mt-2"
                        style="max-width: 100%; height: auto;">
                    </div>
                  </div>
                </div>

                  <div class="mb-3">
                      <button type="submit" class="btn btn-primary">Simpan</button>
                      <a href="{{ route('customer-service.index') }}" class="btn btn-danger">Cancel</a>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </x-admin>

  <script>
    function previewImage(event, previewId) {
      var reader = new FileReader();
      reader.onload = function() {
        var output = document.getElementById(previewId);
        output.src = reader.result;
        output.style.display = 'block';
      }
      reader.readAsDataURL(event.target.files[0]);
    }
  </script>
