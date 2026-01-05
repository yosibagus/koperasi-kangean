<x-admin>
    <x-slot:title>@ucfirst(auth()->user()->role) | Tambah Kantor Cabang</x-slot:title>
    <div class="container-fluid">
      <div class="form-head mb-4">
        <h2 class="text-black font-w600">Form</h2>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header border-primary">
              <h4 class="card-title">Tambah Kantor Cabang</h4>
            </div>
            <div class="card-body">
              <form action="{{ route('profile.update', $profile->token_profile) }}" method="POST" novalidate enctype="multipart/form-data"
                class="needs-validation">
                @csrf
                @method('PUT')
                <div class="row">
                  <div class="col-lg-8">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <div class="mb-3 vertical-radius">
                            <label class="text-label form-label required" for="nama_profile">Nama Kantor</label>
                            <div class="input-group validate-username">
                              <input type="text" class="form-control br-style" id="nama_profile" name="nama_profile"
                                placeholder="Enter a username.." required value="{{ $profile->nama_profile }}">
                              <div class="invalid-feedback">
                                Please Enter a username.
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <div class="mb-3 vertical-radius">
                            <label class="text-label form-label required" for="tanggal_berdiri">Tanggal Berdiri</label>
                            <div class="input-group validate-username">
                              <input type="text" id="date-format" class="form-control br-style"
                                placeholder="Saturday 24 June 2024 - 21:44" required name="tanggal_berdiri" value="{{ \Carbon\Carbon::parse($profile->created_at)->format('l d F Y - H:i') }}">
                              <div class="invalid-feedback">
                                Please Enter a username.
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group">
                          <div class="mb-3 vertical-radius">
                            <label class="text-label form-label required" for="alamat">Alamat Kantor</label>
                            <div class="input-group validate-username">
                              <input type="text" class="form-control br-style" placeholder="Jln. Agung ..." required
                                name="alamat" id="alamat" value="{{ $profile->alamat }}">
                              <div class="invalid-feedback">
                                Please Enter a username.
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group">
                          <div class="mb-3 vertical-radius">
                            <label class="text-label form-label required" for="deskripsi">Deskripsi</label>
                            <div class="input-group validate-username">
                              <textarea name="deskripsi" id="deskripsi" class="form-control br-style" rows="10" placeholder="Isi deskripsi...">
                                {{ $profile->deskripsi }}
                              </textarea>
                              <div class="invalid-feedback">
                                Please Enter a username.
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label for="logo">Upload Logo</label>
                      <input type="file" class="form-control" id="logo" accept=".png" name="logo"
                        onchange="previewImage(event, 'previewLogo')">
                      <small class="form-text text-muted">Hanya file .png yang diperbolehkan.</small>
                      <img id="previewLogo" src="{{ asset('images/logo/'.$profile->logo) }}" alt="Preview Logo" class="img-thumbnail mt-2"
                        style=" max-width: 100%; height: auto;">
                    </div>
                    <div class="form-group">
                      <label for="logoText">Upload Logo Text</label>
                      <input type="file" class="form-control" id="logoText" accept=".png" name="logo_text"
                        onchange="previewImage(event, 'previewLogoText')">
                      <small class="form-text text-muted">Hanya file .png yang diperbolehkan.</small>
                      <img id="previewLogoText" src="{{ asset('images/logo/'.$profile->logo_text) }}" alt="Preview Logo Text" class="img-thumbnail mt-2"
                        style=" max-width: 100%; height: auto;">
                    </div>
                  </div>
                  <div class="col-lg-12">
                      <button type="submit" class="btn btn-primary">Submit</button>
                      <a href="{{ route('profile.index') }}" class="btn btn-danger">Cancel</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
      function previewImage(event, previewId) {
        const file = event.target.files[0];
        if (file && file.type === "image/png") {
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
  </x-admin>
