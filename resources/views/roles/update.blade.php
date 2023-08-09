@include('template.header')
@include('template.sidebar')
@include('template.navbar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h3>Edit Data Role</h3>
            <form action="/role/{{ $role->id }}" method="POST">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="name">Nama Role<span style="color:red;">*</span></label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        id="name" placeholder="Nama Role" required value="{{ old('name', $role->name) }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" value="Simpan" name="submit" class="btn btn-success btn-user">
                    Simpan
                </button>
                <button type="button" value="Kembali" onClick="history.go(-1)" class="btn btn-primary btn-user">
                    Kembali
                </button>
            </form>
        </div>
        <div class="container-fluid mt-4">
            <h3>Role Permissions</h3>
            <div class="flex flex-row">
                @if ($role->permissions)
                    @foreach ($role->permissions as $role_permission)
                        <form class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md" method="POST"
                            action="{{ route('roles.permissions.revoke', [$role->id, $role_permission->id]) }}"
                            onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-default btn-user" type="submit"><span
                                    class="mr-1">{{ $role_permission->name }}</span><i class="fa fa-times"
                                    aria-hidden="true"></i></button>
                        </form>
                    @endforeach
                @endif
            </div>
            <div class="max-w-xl mt-6">
                <form action="{{ route('roles.permissions', $role->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="permission">Permission<span style="color:red;">*</span></label>
                        <select name="permission" class="form-control @error('permission') is-invalid @enderror"
                            id="permission" required>
                            @foreach ($permissions as $permission)
                                <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                            @endforeach
                        </select>

                        @error('permission')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" value="Simpan" name="submit" class="btn btn-success btn-user">
                        Assign Permission
                    </button>
                </form>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

@include('template.footer')
