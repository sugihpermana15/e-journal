@extends('admin.partials.Layouts.master')

@section('title', 'Users | Admin')
@section('title-sub', 'Settings & UI')
@section('pagetitle', 'User Management')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" />
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title mb-0">User Management</h5>
                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addUserModal">
                        Add User
                    </button>
                </div>

                <div class="card-body">
                    <table id="default_datatable" class="table table-striped table-bordered align-middle mb-0 w-100">
                        <thead>
                            <tr>
                                <th style="width: 80px">ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th style="width: 120px">Created</th>
                                <th style="width: 140px">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>{{ $user->created_at?->format('Y-m-d') }}</td>
                                    <td>
                                        <div class="d-flex flex-wrap gap-1">
                                            <button
                                                type="button"
                                                class="btn btn-warning btn-sm"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editUserModal"
                                                data-user-id="{{ $user->id }}"
                                                data-user-name="{{ $user->name }}"
                                                data-user-email="{{ $user->email }}"
                                                data-user-role="{{ $user->role }}"
                                            >
                                                Edit
                                            </button>
                                            <form method="POST" action="{{ route('admin.users.destroy', $user) }}" onsubmit="return confirm('Delete this user?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Add User Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('admin.users.store') }}">
                    @csrf
                    <input type="hidden" name="_modal" value="add">

                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label" for="add-name">Name</label>
                            <input type="text" id="add-name" name="name" value="{{ old('_modal') === 'add' ? old('name') : '' }}"
                                class="form-control @if (old('_modal') === 'add') @error('name') is-invalid @enderror @endif" required>
                            @if (old('_modal') === 'add')
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="add-email">Email</label>
                            <input type="email" id="add-email" name="email" value="{{ old('_modal') === 'add' ? old('email') : '' }}"
                                class="form-control @if (old('_modal') === 'add') @error('email') is-invalid @enderror @endif" required>
                            @if (old('_modal') === 'add')
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="add-password">Password</label>
                            <input type="password" id="add-password" name="password"
                                class="form-control @if (old('_modal') === 'add') @error('password') is-invalid @enderror @endif" required>
                            @if (old('_modal') === 'add')
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            @endif
                        </div>

                        <div class="mb-0">
                            <label class="form-label" for="add-role">Role</label>
                            <select id="add-role" name="role" class="form-select @if (old('_modal') === 'add') @error('role') is-invalid @enderror @endif" required>
                                <option value="admin" @selected(old('_modal') === 'add' && old('role') === 'admin')>admin</option>
                                <option value="user" @selected(old('_modal') === 'add' ? old('role', 'user') === 'user' : true)>user</option>
                            </select>
                            @if (old('_modal') === 'add')
                                @error('role')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            @endif
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit User Modal -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" id="editUserForm" action="#">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="_modal" value="edit">

                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label" for="edit-name">Name</label>
                            <input type="text" id="edit-name" name="name"
                                value="{{ old('_modal') === 'edit' ? old('name') : '' }}"
                                class="form-control @if (old('_modal') === 'edit') @error('name') is-invalid @enderror @endif" required>
                            @if (old('_modal') === 'edit')
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="edit-email">Email</label>
                            <input type="email" id="edit-email" name="email"
                                value="{{ old('_modal') === 'edit' ? old('email') : '' }}"
                                class="form-control @if (old('_modal') === 'edit') @error('email') is-invalid @enderror @endif" required>
                            @if (old('_modal') === 'edit')
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="edit-password">Password (optional)</label>
                            <input type="password" id="edit-password" name="password"
                                class="form-control @if (old('_modal') === 'edit') @error('password') is-invalid @enderror @endif">
                            @if (old('_modal') === 'edit')
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            @endif
                        </div>

                        <div class="mb-0">
                            <label class="form-label" for="edit-role">Role</label>
                            <select id="edit-role" name="role" class="form-select @if (old('_modal') === 'edit') @error('role') is-invalid @enderror @endif" required>
                                <option value="admin">admin</option>
                                <option value="user">user</option>
                            </select>
                            @if (old('_modal') === 'edit')
                                @error('role')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            @endif
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-warning">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('assets/admin/js/app.js') }}"></script>

    <script>
        (function() {
            document.addEventListener('DOMContentLoaded', function() {
                @if (session('success'))
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: @json(session('success')),
                        timer: 2000,
                        showConfirmButton: false
                    });
                @endif
                @if (session('error'))
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: @json(session('error')),
                        timer: 2500,
                        showConfirmButton: false
                    });
                @endif
            });

            const table = $('#default_datatable').DataTable({
                pageLength: 10,
                lengthMenu: [10, 25, 50, 100],
                order: [[0, 'asc']],
                autoWidth: false,
                pagingType: 'simple_numbers',
                language: {
                    search: 'Search:',
                    searchPlaceholder: 'Type to filter...',
                    paginate: {
                        previous: '<i class="ri-arrow-left-s-line"></i>',
                        next: '<i class="ri-arrow-right-s-line"></i>'
                    }
                },
                dom:
                    "<'row align-items-center'<'col-sm-12 col-md-6 mb-3'l><'col-sm-12 col-md-6 mb-3'f>>" +
                    "<'table-responsive'tr>" +
                    "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                initComplete: function() {
                    $('.dataTables_length select').addClass('form-select form-select-sm');
                    $('.dataTables_filter input').addClass('form-control form-control-sm');
                    $('.dataTables_filter label').addClass('d-flex align-items-center gap-2 justify-content-md-end');
                }
            });

            const editModalEl = document.getElementById('editUserModal');
            if (editModalEl) {
                editModalEl.addEventListener('show.bs.modal', function(event) {
                    const button = event.relatedTarget;
                    if (!button) return;

                    const userId = button.getAttribute('data-user-id');
                    const userName = button.getAttribute('data-user-name');
                    const userEmail = button.getAttribute('data-user-email');
                    const userRole = button.getAttribute('data-user-role');

                    const form = document.getElementById('editUserForm');
                    form.action = @json(url('/admin/users')) + '/' + userId;

                    document.getElementById('edit-name').value = userName || '';
                    document.getElementById('edit-email').value = userEmail || '';
                    document.getElementById('edit-role').value = userRole || 'user';
                    document.getElementById('edit-password').value = '';
                });
            }

            @if (old('_modal') === 'add')
                new bootstrap.Modal(document.getElementById('addUserModal')).show();
            @endif

            @if (old('_modal') === 'edit')
                const modal = new bootstrap.Modal(document.getElementById('editUserModal'));
                modal.show();
            @endif
        })();
    </script>
@endsection
