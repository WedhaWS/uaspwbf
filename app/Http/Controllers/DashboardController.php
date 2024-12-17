<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;
use App\Models\Emiten;
use App\Models\TransaksiHarian;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Get authenticated user and menus
        $user = Auth::user();
        $menus = Menu::whereHas('settingMenus', function ($query) use ($user) {
            $query->where('jenis_user_id', $user->jenis_user_id);
        })->get();
    
        return view('dashboard.index', compact(
            'user',
            'menus'
        ));
    }

    public function info()
    {
        return view('dashboard.info.infogempa');
    }

    
}
