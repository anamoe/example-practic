<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProdukController extends Controller
{
    //
    public function getproduk(){
        $p = Produk::get();

        foreach($p as $v){
            $v->foto_produk = url('produk/'.$v->foto_produk);
        }

        return response()->json($p);
       
        
    }

    public function createproduk(Request $request){
        $data = $request->all();
      
        if ($request->foto_produk) {
			$nama_file = "Produk" . time() . ".jpeg";
			$tujuan_upload = public_path() . '/Produk/';
			if (file_put_contents($tujuan_upload . $nama_file, base64_decode($request->foto_produk))) {
				$data ['foto_produk'] = $nama_file;
			}
		}
        $produk =Produk::create($data);
        if($produk){
            return response()->json([
                'status'=>'sukses',
                'pesan'=>'berhasil menambahkan produk',
                'data'=>$produk,

                
            ]);

        }else{

            return response()->json([
                'status'=>'gagal',
                'data'=>[],

                
            ]);

        }

    }

    public function showproduk($id){
        $produk  =Produk::where('id',$id)->first();
        $produk->foto_produk = url('produk/'.$produk->foto_produk);
        return $produk;
    }

    public function updateproduk(Request $request,$id){
        $data= $request->all();
        $produk =Produk::where('id',$id)->first();

        if ($request->foto_produk) {
			$nama_file = "Produk" . time() . ".jpeg";
			$tujuan_upload = public_path() . '/Produk/';
            
			if (file_put_contents($tujuan_upload . $nama_file, base64_decode($request->foto_produk))) {
				$data ['foto_produk'] = $nama_file;
			}
		}
        $produk->update($data);
        if($produk){
            return response()->json([
                'status'=>'sukses',
                'pesan'=>'berhasil update produk',
                'data'=>$produk,
            ]);

        }else{

            return response()->json([
                'status'=>'gagal',
                'data'=>[],

                
            ]);

        }

    }

    public function deleteproduk($id){

        $produk =Produk::where('id',$id)->first();
        if ($produk) {
			
            $produk->delete();

            return response()->json([
                'status'=>'sukses',
                'pesan'=>'berhasil menghapus produk',
               
            ]);
		
		}



    }
}
