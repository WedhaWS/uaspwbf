<?php

namespace App\Http\Controllers;

use App\Models\SettingMenu;
use App\Models\JenisUser;
use App\Models\Menu;
use Illuminate\Http\Request;

class SettingMenuController extends Controller
{
    public function getMenusByJenisUser($jenisUserId)
    {
        // Mengambil menu_ids yang sudah disetting untuk jenis user tertentu
        $menuIds = SettingMenu::where('jenis_user_id', $jenisUserId)->pluck('menu_id')->toArray();
        return response()->json($menuIds);
    }   

    public function index()
    {
        $jenisUsers = JenisUser::all();
        $menus = Menu::all();
        $settingMenus = SettingMenu::with('menu', 'jenisUser')->get(); // Memuat relasi untuk jenisUser dan menu
        return view('dashboard.setting_menus.index', compact('jenisUsers', 'menus', 'settingMenus'));
    }

    public function create()
    {
        $jenisUsers = JenisUser::all();
        $menus = Menu::all();
        $settingMenus = SettingMenu::all()->groupBy('jenis_user_id');

        return view('dashboard.setting_menus.create', compact('jenisUsers', 'menus', 'settingMenus'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'jenis_user_id' => 'required',
            'menu_id' => 'required|array',
        ]);
    
        // Mengambil semua menu yang ada untuk jenis_user_id ini
        $existingMenus = SettingMenu::where('jenis_user_id', $validated['jenis_user_id'])
            ->pluck('menu_id')
            ->toArray();
    
        // Hapus menu yang tidak lagi dipilih
        foreach ($existingMenus as $existingMenuId) {
            if (!in_array($existingMenuId, $validated['menu_id'])) {
                SettingMenu::where('jenis_user_id', $validated['jenis_user_id'])
                    ->where('menu_id', $existingMenuId)
                    ->delete();
            }
        }
    
        // Tambahkan menu baru yang dipilih
        foreach ($validated['menu_id'] as $menuId) {
            // Cek apakah pengaturan sudah ada untuk jenis_user_id dan menu_id yang diberikan
            $existingSetting = SettingMenu::where('jenis_user_id', $validated['jenis_user_id'])
                ->where('menu_id', $menuId)
                ->first();
    
            // Jika belum ada, buat pengaturan baru
            if (!$existingSetting) {
                SettingMenu::create([
                    'jenis_user_id' => $validated['jenis_user_id'],
                    'menu_id' => $menuId,
                ]);
            }
        }
    
        return redirect()->route('setting_menus.index')->with('success', 'Setting Menu berhasil ditambahkan atau diupdate');
    }
    

    public function edit($id)
    {
        $settingMenu = SettingMenu::where('jenis_user_id', $id)->get(); // Mengambil semua menu untuk jenis user tertentu
        $jenisUsers = JenisUser::all();
        $menus = Menu::all();

        $selectedMenus = $settingMenu->pluck('menu_id')->toArray(); // Mengambil hanya menu_id sebagai array

        return view('dashboard.setting_menus.edit', compact('settingMenu', 'jenisUsers', 'menus', 'selectedMenus'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'jenis_user_id' => 'required',
            'menu_id' => 'required|array',
        ]);
    
        // Mengambil semua menu yang ada untuk jenis_user_id ini
        $existingMenus = SettingMenu::where('jenis_user_id', $validated['jenis_user_id'])
            ->pluck('menu_id')
            ->toArray();
    
        // Hapus menu yang tidak lagi dipilih
        foreach ($existingMenus as $existingMenuId) {
            if (!in_array($existingMenuId, $validated['menu_id'])) {
                SettingMenu::where('jenis_user_id', $validated['jenis_user_id'])
                    ->where('menu_id', $existingMenuId)
                    ->delete();
            }
        }
    
        // Tambahkan menu baru yang dipilih
        foreach ($validated['menu_id'] as $menuId) {
            // Cek apakah pengaturan sudah ada untuk jenis_user_id dan menu_id yang diberikan
            $existingSetting = SettingMenu::where('jenis_user_id', $validated['jenis_user_id'])
                ->where('menu_id', $menuId)
                ->first();
    
            // Jika belum ada, buat pengaturan baru
            if (!$existingSetting) {
                SettingMenu::create([
                    'jenis_user_id' => $validated['jenis_user_id'],
                    'menu_id' => $menuId,
                ]);
            }
        }
    
        return redirect()->route('setting_menus.index')->with('success', 'Setting Menu berhasil diupdate');
    }    

    public function destroy($id)
    {
        SettingMenu::where('jenis_user_id', $id)->delete();
        return redirect()->route('setting_menus.index')->with('success', 'Setting Menu berhasil dihapus');
    }
}
