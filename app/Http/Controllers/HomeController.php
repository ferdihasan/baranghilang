<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class HomeController extends Controller
{
    public function index(){
        $barang = Barang::All();
        $barang_all = Barang::All();

        if (request('search')){
            // dd(request('search'));
            $barang = $barang->where('name', request('search'))->all();
            $merek = $barang_all->where('merek', request('search'))->all();
            // dd($merek);
            foreach ($merek as $mer) {
                // $barang->push($mer);
                array_push($barang, $mer);
            }
            // dd($barang);
        }
        return view('home', [
            'title' => 'Home',
            'subtitle' => 'Barang Hilang',
            'barangs' => $barang,
        ]);
    }

    public function search(Request $request){
        // dd($request);
        $barang = Barang::All();
        // $search = $barang::search($request->search)->get();
        $search = $barang->where('name', $request->search)->all();
        dd($search);
    }
}
