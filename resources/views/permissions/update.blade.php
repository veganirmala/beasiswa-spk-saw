@include('template.header')
@include('template.sidebar')
@include('template.navbar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h3>Edit Data Permission</h3>
            <form action="/permission/{{ $permission->id }}" method="POST">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="name">Nama Permission<span style="color:red;">*</span></label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        id="name" placeholder="Nama Permission" required
                        value="{{ old('name', $permission->name) }}">
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
            <h3>Roles</h3>
            <div class="flex flex-row">
                @if ($permission->roles)
                    @foreach ($permission->roles as $permission_role)
                        <form class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md" method="POST"
                            action="{{ route('permissions.roles.remove', [$permission->id, $permission_role->id]) }}"
                            onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-default btn-user" type="submit"><span
                                    class="mr-1">{{ $permission_role->name }}</span><i class="fa fa-times"
                                    aria-hidden="true"></i></button>
                        </form>
                    @endforeach
                @endif
            </div>
            <div class="max-w-xl mt-6">
                <form method="POST" action="{{ route('permissions.roles', $permission->id) }}">
                    @csrf
                    <div class="form-group">
                        <label for="role">Roles<span style="color:red;">*</span></label>
                        <select name="role" class="form-control @error('role') is-invalid @enderror" id="role"
                            required>
                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>

                        @error('role')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" value="Simpan" name="submit" class="btn btn-success btn-user">
                        Assign Role
                    </button>
                </form>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

@include('template.footer')
