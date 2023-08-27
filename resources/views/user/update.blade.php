@include('template.header')
@include('template.sidebar')
@include('template.navbar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h3>Edit User Data</h3>
            <form action="/update-profile" method="POST">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="name">Full name<span style="color:red;">*</span></label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        id="name" placeholder="Full name" required value="{{ old('name', $user->name) }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jk">Gender</label>
                    <br>
                    <input type="radio" id="Female" value="Female" name="jk" <?php if ($user['jk'] == 'Female') {
                        echo 'checked';
                    } ?>>
                    <label for="Female">Female</label>
                    <tr><input type="radio" id="Male" value="Male" name="jk" <?php if ($user['jk'] == 'Male') {
                        echo 'checked';
                    } ?>>
                        <label for="Male">Male</label>
                    </tr>
                </div>
                <div class="form-group">
                    <label for="notelp">Telephone<span style="color:red;">*</span></label>
                    <input type="text" name="notelp" class="form-control @error('notelp') is-invalid @enderror"
                        id="notelp" placeholder="Telephone" required value="{{ old('notelp', $user->notelp) }}">
                    @error('telp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="alamat">Address<span style="color:red;">*</span></label>
                    <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror"
                        id="alamat" placeholder="Address" required value="{{ old('alamat', $user->alamat) }}">
                    @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" value="Simpan" name="submit" class="btn btn-success btn-user">
                    Save
                </button>
                <button type="button" value="Kembali" onClick="history.go(-1)" class="btn btn-primary btn-user">
                    Back
                </button>
            </form>
        </div>
        <div class="container-fluid mt-4">
            @role('admin')
                @isset($roles)
                    <div class="mt-6 p-2 bg-slate-100">
                        <h2 class="text-2xl font-semibold">Roles</h2>
                        <div class="flex space-x-2 mt-4 p-2">
                            @if ($user->roles)
                                @foreach ($user->roles as $user_role)
                                    <form class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md" method="POST"
                                        action="{{ route('users.roles.remove', [$user->id, $user_role->id]) }}"
                                        onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">{{ $user_role->name }}</button>
                                    </form>
                                @endforeach
                            @endif
                        </div>
                        <div class="max-w-xl mt-6">
                            <form method="POST" action="{{ route('users.roles', $user->id) }}">
                                @csrf
                                <div class="sm:col-span-6">
                                    <label for="role" class="block text-sm font-medium text-gray-700">Roles</label>
                                    <select id="role" name="role" autocomplete="role-name"
                                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('role')
                                    <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="sm:col-span-6 pt-5">
                            <button type="submit" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md">Assign</button>
                        </div>
                        </form>
                    </div>
                @endisset

                @isset($permissions)
                    <div class="mt-6 p-2 bg-slate-100">
                        <h2 class="text-2xl font-semibold">Permissions</h2>
                        <div class="flex space-x-2 mt-4 p-2">
                            @if ($user->permissions)
                                @foreach ($user->permissions as $user_permission)
                                    <form class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md" method="POST"
                                        action="{{ route('users.permissions.revoke', [$user->id, $user_permission->id]) }}"
                                        onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">{{ $user_permission->name }}</button>
                                    </form>
                                @endforeach
                            @endif
                        </div>
                        <div class="max-w-xl mt-6">
                            <form method="POST" action="{{ route('users.permissions', $user->id) }}">
                                @csrf
                                <div class="sm:col-span-6">
                                    <label for="permission" class="block text-sm font-medium text-gray-700">Permission</label>
                                    <select id="permission" name="permission" autocomplete="permission-name"
                                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        @foreach ($permissions as $permission)
                                            <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('name')
                                    <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="sm:col-span-6 pt-5">
                            <button type="submit"
                                class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md">Assign</button>
                        </div>
                        </form>
                    </div>
                @endisset
            @endrole
        </div>
    </section>
    <!-- /.content -->
</div>

@include('template.footer')
