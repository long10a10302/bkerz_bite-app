<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function showBread()
    {
        return view('menu.delicious-breads'); // Đảm bảo rằng đường dẫn view là đúng
    }

    public function showBreakfastPastries()
    {
        return view('menu.breakfast-pastries'); // Đảm bảo rằng đường dẫn view là đúng
    }
    
    public function showCookiesMacarons()
    {
        return view('menu.macarons-chocolates-cookies'); // Đảm bảo rằng đường dẫn view là đúng
    }
    
    public function showDesserts()
    {
        return view('menu.desserts'); // Đảm bảo rằng đường dẫn view là đúng
    }
    
    public function showSavoryDelights()
    {
        return view('menu.savory-delights'); // Đảm bảo rằng đường dẫn view là đúng
    }
    
    public function showSeasonDelights()
    {
        return view('menu.seasonal-delights'); // Đảm bảo rằng đường dẫn view là đúng
    }
    
    public function showOverview()
    {
        return view('menu.overview'); // Đảm bảo rằng đường dẫn view là đúng
    }
    public function showConfections()
    {
        return view('menu.confections'); // Đảm bảo rằng đường dẫn view là đúng
    }
    public function showThepeacockserieshocolatebars()
    {
        return view('menu.the-peacock-series-chocolate-bars'); // Đảm bảo rằng đường dẫn view là đúng
    }
}
