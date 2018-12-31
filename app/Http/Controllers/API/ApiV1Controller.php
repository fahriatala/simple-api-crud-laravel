<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Userreview;

use Response;

class ApiV1Controller extends Controller
{
    public function getreview(Request $request)
    {
        #query1
        // $getreview = DB::table('user_review')
        //         ->leftJoin('barang', 'user_review.barang_id', '=', 'barang.id')
        //         ->leftJoin('users', 'users.id', '=', 'user_review.user_id')
        //         ->get();
        #query2
        $getreview = Userreview::with('barang','user')->get();
        
        if (count($getreview)==0) {
            return Response::json(['status' => 0, 'message' => 'data tidak ditemukan']);
        }
        return Response::json(['status' => 1, 'data' => $getreview]);
    }
    public function getreviewbyid(Request $request)
    {
        try{
            $id=$request->input('id');
            
            $data = Userreview::where(['id'=>$id])->with('barang','user')->get();
        }catch(\Exception $e){
            return Response::json(['status' => 0, 'message' => 'Failed', 'log' => $e]);
        }
        if (count($data)==0) {
            return Response::json(['status' => 0, 'message' => 'Data tidak ditemukan/kosong']);
        }
        return Response::json(['status' => 1, 'message' => 'Data Ditemukan','data' => $data]);
    }
    public function insertreview(Request $request){
        $input=$request->all();
        
        try{
            
            $data=Userreview::Create($input);
        }catch(\Exception $e){
            return Response::json(['status' => 0, 'message' => 'Failed', 'log' => $e]);
        }
        if (empty($data)) {
            return Response::json(['status' => 0, 'message' => 'Insert Gagal']);
        }
        return Response::json(['status' => 1, 'message' => 'Input Berhasil']);
    }
    public function deletereview(Request $request){
        $input=$request->all();
        
        try{
            $id=$input['id'];
            $data=Userreview::find($id);
            if(!empty($data))
            $data->Delete();
        }catch(\Exception $e){
            return Response::json(['status' => 0, 'message' => 'Failed', 'log' => $e]);
        }
        if (empty($data)) {
            return Response::json(['status' => 0, 'message' => 'Hapus Gagal']);
        }
        return Response::json(['status' => 1, 'message' => 'Hapus Berhasil']);
    }
    public function updatereview(Request $request){
        $input=$request->all();
        
        try{
            $id=$input['id'];
            $data=Userreview::find($id);
            if(!empty($data))
            $data->Update($input);
        }catch(\Exception $e){
            return Response::json(['status' => 0, 'message' => 'Failed', 'log' => $e]);
        }
        if (empty($data)) {
            return Response::json(['status' => 0, 'message' => 'Ubah Gagal']);
        }
        return Response::json(['status' => 1, 'message' => 'Ubah Berhasil']);
    }
}
