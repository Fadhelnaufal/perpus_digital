<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pusdiglah - Dashboard</title>
    @include('partials.styles')
</head>

<body class="boxed-size">
    @include('partials.preloader')
    @include('partials.sidebar')

    <div class="container-fluid">
        <div class="main-content d-flex flex-column">
            @include('partials.header')

            <div class="main-content-container overflow-hidden">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card bg-white border-0 rounded-3 mb-4">
                            <div class="card-body p-4">
                                <div class="col-md-7">
                                    <div class="mb-2">
                                        <h3 class="fs-20 fw-semibold">Tambah User Baru dan Atur Hak Akses</h3>
                                        <p style="line-height: 1.4;">Silakan buat user baru dan atur hak akses sesuai
                                            kebutuhan anda.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg">
                        <div class="card bg-white border-0 rounded-3 mb-4">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-3">
                                    <h3 class="mb-0">Daftar User</h3>
                                    <button class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#addUserModal">Tambah User</button>
                                </div>
                                <div class="default-table-area style-two all-products">
                                    <div class="table-responsive">
                                        <table class="table align-middle" id="myTable">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Role</th>
                                                    <th scope="col">Dibuat</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($users as $index => $user)
                                                    <tr>
                                                        <td class="text-body">{{ $index + $users->firstItem() }}</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img src="{{ asset('assets/images/user-6.jpg') }}"
                                                                    class="wh-40 rounded-3" alt="user">
                                                                <div class="ms-2 ps-1">
                                                                    <h6 class="fw-medium fs-14 mb-0">{{ $user->name }}
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="text-secondary">{{ $user->email }}</td>
                                                        <td class="text-secondary">
                                                            @if ($user->hasRole('admin'))
                                                                <span
                                                                    class="badge text-bg-success py-1 px-2 text-white rounded-1 fw-medium fs-12">Admin</span>
                                                            @elseif ($user->hasRole('teacher'))
                                                                <span
                                                                    class="badge text-bg-warning py-1 px-2 text-white rounded-1 fw-medium fs-12">Teacher</span>
                                                            @elseif ($user->hasRole('student'))
                                                                <span
                                                                    class="badge text-bg-info py-1 px-2 text-white rounded-1 fw-medium fs-12">Student</span>
                                                            @else
                                                                <span class="badge bg-secondary">User</span>
                                                            @endif

                                                        </td>

                                                        <td class="text-secondary">
                                                            {{ $user->created_at->format('d M Y') }}</td>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-1">
                                                                <!-- Tombol Detail -->
                                                                <button type="button"
                                                                    class="btn border-0 bg-transparent lh-1 position-relative top-2 show-user-btn"
                                                                    data-name="{{ $user->name }}"
                                                                    data-email="{{ $user->email }}"
                                                                    data-role="{{ $user->getRoleNames()->first() }}"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#showUserModal">
                                                                    <i
                                                                        class="material-symbols-outlined fs-16 text-primary">visibility</i>
                                                                </button>


                                                                <!-- Tombol Edit -->
                                                                <button type="button"
                                                                    class="btn-edit-user border-0 bg-transparent lh-1 position-relative top-2"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#editUserModal"
                                                                    data-id="{{ $user->id }}"
                                                                    data-name="{{ $user->name }}"
                                                                    data-email="{{ $user->email }}"
                                                                    data-role="{{ $user->getRoleNames()->first() }}">
                                                                    <i
                                                                        class="material-symbols-outlined fs-16 text-success">edit</i>
                                                                </button>

                                                                <!-- Tombol Hapus -->
                                                                <form id="delete-form-{{ $user->id }}"
                                                                    action="{{ route('admin.users.destroy', $user) }}"
                                                                    method="POST" style="display: inline;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="button"
                                                                        class="ps-0 border-0 bg-transparent lh-1 position-relative top-2 btn-delete-user"
                                                                        data-user-id="{{ $user->id }}"
                                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        data-bs-title="Hapus">
                                                                        <i
                                                                            class="material-symbols-outlined fs-16 text-danger">delete</i>
                                                                    </button>
                                                                </form>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="6" class="text-center text-secondary py-3">Belum
                                                            ada user.</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    {{ $users->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah User -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('admin.users.store') }}" method="POST" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Tambah User Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="">Nama</label>
                        <input type="text" name="name" class="form-control" required
                            value="{{ old('name') }}">
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required
                            value="{{ old('email') }}">
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Role</label>
                        <select name="role" class="form-select" required>
                            <option value="" disabled selected>Pilih Role</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}">{{ ucfirst($role->name) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Detail User -->
    <div class="modal fade" id="showUserModal" tabindex="-1" aria-labelledby="showUserModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg">
                <div class="modal-header">
                    <h5 class="modal-title" id="showUserModalLabel">Detail User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-4">
                        <img src="{{ asset('assets/images/user-6.jpg') }}" class="rounded-circle"
                            style="width: 100px; height: 100px;" alt="user">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama</label>
                        <input type="text" name="name" id="detail-name" class="form-control" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Email</label>
                        <input type="email" name="email" id="detail-email" class="form-control" readonly>
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Role</label>
                        <input type="text" name="role" id="detail-role" class="form-control" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Edit User -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" class="modal-content" id="editUserForm" action="">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="edit-id">
                    <div class="mb-3">
                        <label>Nama</label>
                        <input type="text" name="name" id="edit-name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" id="edit-email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Role</label>
                        <select name="role" id="edit-role" class="form-select" required>
                            <option value="admin">Admin</option>
                            <option value="teacher">Teacher</option>
                            <option value="student">Student</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>


    @include('partials.footer')
    @include('partials.theme_settings')
    @include('partials.scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const showButtons = document.querySelectorAll(".show-user-btn");

            showButtons.forEach(btn => {
                btn.addEventListener("click", function() {
                    document.getElementById("detail-name").value = btn.dataset.name;
                    document.getElementById("detail-email").value = btn.dataset.email;
                    document.getElementById("detail-role").value = btn.dataset.role;
                });
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const editButtons = document.querySelectorAll(".btn-edit-user");

            editButtons.forEach(btn => {
                btn.addEventListener("click", function() {
                    const userId = btn.dataset.id;
                    const userName = btn.dataset.name;
                    const userEmail = btn.dataset.email;
                    const userRole = btn.dataset.role;

                    document.getElementById("edit-id").value = userId;
                    document.getElementById("edit-name").value = userName;
                    document.getElementById("edit-email").value = userEmail;
                    document.getElementById("edit-role").value = userRole;

                    // set action
                    document.getElementById("editUserForm").action = `/admin/users/${userId}`;
                });
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            $('.show-user-btn').on('click', function() {
                const name = $(this).data('name');
                const email = $(this).data('email');
                const role = $(this).data('role');

                $('#detail-name').val(name);
                $('#detail-email').val(email);
                $('#detail-role').val(role);
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const deleteButtons = document.querySelectorAll('.btn-delete-user');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const userId = this.getAttribute('data-user-id');

                    Swal.fire({
                        title: 'Yakin ingin menghapus?',
                        text: "Data tidak bisa dikembalikan!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById('delete-form-' + userId).submit();
                        }
                    });
                });
            });
        });
    </script>
    <script>
        @if (session('success'))
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
        @endif

        @if (session('error'))
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'error',
                title: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
        @endif
    </script>




</body>

</html>
