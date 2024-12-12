@extends('dashboard.layout.main')

@section('container')
<div class="container">
    <h1 class="page-heading">Tambah Pengaturan Menu</h1>

    <form action="{{ route('setting_menus.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="jenis_user_id">Jenis User:</label>
            <select name="jenis_user_id" id="jenis_user_id" required>
                <option value="">Pilih Jenis User</option>
                @foreach ($jenisUsers as $jenisUser)
                    <option value="{{ $jenisUser->id }}">{{ $jenisUser->nama_jenis_user }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="menus">Pilih Menu:</label>
            @foreach ($menus as $menu)
                <div class="checkbox-wrapper">
                    <input type="checkbox" id="menu_{{ $menu->id }}" name="menu_id[]" value="{{ $menu->id }}">
                    <label for="menu_{{ $menu->id }}">{{ $menu->nama_menu }}</label>
                </div>
            @endforeach
        </div>

        <div class="form-group">
            <button type="submit">Simpan</button>
        </div>
    </form>
</div>

<style>
    .checkbox-wrapper {
        display: flex;
        align-items: center;
        margin-bottom: 8px;
    }

    .checkbox-wrapper input[type="checkbox"] {
        margin-right: 8px;
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#jenis_user_id').change(function () {
            var jenisUserId = $(this).val();

            // Hapus centang semua checkbox saat jenis user berubah
            $('input[name="menu_id[]"]').prop('checked', false);

            if (jenisUserId) {
                $.ajax({
                    url: '/dashboard/setting_menus/menus/' + jenisUserId,
                    type: 'GET',
                    success: function (response) {
                        console.log(response); // Debugging respons
                        response.forEach(function (menuId) {
                            $('#menu_' + menuId).prop('checked', true);
                        });
                    },
                    error: function () {
                        alert('Gagal memuat menu. Silakan coba lagi.');
                    }
                });
            }
        });
    });
</script>
@endsection
