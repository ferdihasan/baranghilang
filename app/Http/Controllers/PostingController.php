<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


class PostingController extends Controller
{
    public function posting_barang(){
        return view('posting-barang', [
            'title' => 'Posting Barang',
            'subtitle' => 'Barang Hilang',
            'category' => Category::All(),
        ]);
    }

    public function simpan_postingan(Request $request){
        // dd(Auth::id());
        // return $request->file('image')->store('post-images');

        $user_id = Auth::id();
        $category_id = $request->category;
        $name = $request->name;
        $merek = $request->merek;
        $description = $request->description;
        $jumlah = $request->jumlah;
        $alamat = $request->alamat;
        $bukti = $request->bukti;
        $date = $request->date;
        $status = $request->status;
        $image = $request->file('image')->store('post-images');
        // $take_date = $request->take_date;

        Barang::create([
            "user_id" => $user_id,
            "category_id" => $category_id,
            "name" => $name,
            "merek" => $merek,
            "description" => $description,
            'jumlah' => $jumlah,
            'alamat' => $alamat,
            'bukti' => $bukti,
            'date' => $date,
            'status' => $status,
            'image' => $image,
        ]);

        Session::flash('suksesSimpanPost', 'Berhasil memposting barang baru!');
        return redirect('/');
    }

    public function barang(Request $request){
        $req_id = $request->id;
        return view('barang', [
            'title' => 'Barang',
            'subtitle' => 'Barang Hilang',
            'barang' => Barang::find($req_id),
        ]);
    }

    public function edit_barang(Request $request){
        $req_id = $request->id;

        return view('edit-barang', [
            'title' => 'Edit Barang',
            'subtitle' => 'Barang Hilang',
            'barang' => Barang::find($req_id),
            'category' => Category::All(),
        ]);
    }

    public function edit_barang_hapus_image(Request $request){
        $req_id = $request->id;
        $barang = Barang::find($req_id);
        $barang->update([
            "image" => null,
        ]);
        return redirect()->back();
    }

    public function simpan_edit_barang(Request $request){
        // dd($request);
        $req_id = $request->id;
        $user_id = Auth::id();
        $category_id = $request->category;
        $name = $request->name;
        $merek = $request->merek;
        $description = $request->description;
        $jumlah = $request->jumlah;
        $alamat = $request->alamat;
        $bukti = $request->bukti;
        $date = $request->date;
        $take_date = $request->takedate;
        $status = $request->status;

        $barang = Barang::find($req_id);

        if ($request->image == 'Terupload'){
            $image = $barang->image;
        } else if ($request->image !== null){
            $image = $request->file('image')->store('post-images');
        }
        else {
            $image = null;
        }
        
        
        $barang->update([
            "user_id" => $user_id,
            "category_id" => $category_id,
            "name" => $name,
            "merek" => $merek,
            "description" => $description,
            'jumlah' => $jumlah,
            'alamat' => $alamat,
            'bukti' => $bukti,
            'date' => $date,
            'take_date' => $take_date,
            'status' => $status,
            'image' => $image,
        ]);
        Session::flash('suksesSimpanEdit', 'Data Berhasil diedit!');
        return redirect('/administrator');

    }

    public function administrator(){
        $user_id = Auth::id();
        $barang = Barang::All();
        return view('administrator', [
            'title' => 'Administrator',
            'subtitle' => 'Barang Hilang',
            'barangs' => $barang->where('user_id', $user_id)->all(),
            'no' => 1,
        ]);
    }
}
