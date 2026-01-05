@if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
          var successMessage = @json(session('success'));
            Swal.fire({
                type: 'success',
                icon: 'success',
                title: 'Success',
                text: successMessage,
                didOpen: () => {
                    // Menyembunyikan elemen swal2-select
                    const swalSelect = document.querySelector('.swal2-select');
                    if (swalSelect) {
                        swalSelect.style.display = 'none';
                    }
                }
            });
        });
    </script>

    {{-- <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Success</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! json_encode(session('success')) !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var successModal = new bootstrap.Modal(document.getElementById('successModal'));
            successModal.show();
        });
    </script> --}}
@endif


@if ($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                type: 'error',
                icon: 'error',
                title: 'Oops...',
                html: `
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                `,
                didOpen: () => {
                    // Menyembunyikan elemen swal2-select
                    const swalSelect = document.querySelector('.swal2-select');
                    if (swalSelect) {
                        swalSelect.style.display = 'none';
                    }
                }
            });
        });
    </script>

    {{-- <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="errorModalLabel">Error</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! json_encode(session('error')) !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
            errorModal.show();
        });
    </script> --}}
@endif
