<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;

class MahasiswaController extends Controller
{
    public function post(Request $request)
    {
    	$mahasiswa = new Mahasiswa;
    	$mahasiswa->nim = $request->nim;
    	$mahasiswa->nama_lengkap = $request->nama_lengkap;
    	$mahasiswa->jurusan = $request->jurusan;
    	$mahasiswa->tlp = $request->tlp;
    	$mahasiswa->save();
    	return response()->json(
    		[
    			"message" => "POST Method Success",
    			"data" => $mahasiswa
    		]
    	);
    }

    public function get()
    {
    	$data = Mahasiswa::all();
    	return response()->json(
    		[
    			"message" => "Get method success",
    			"data" => $data
    		]
    	);
    }

    public function put($id, Request $request)
    {
    	$mahasiswa = Mahasiswa::where('id', $id)->first();

    	if ($mahasiswa) {
    		$mahasiswa->nim = $request->nim ? $request->nim : $mahasiswa->nim;
    		$mahasiswa->nama_lengkap = $request->nama_lengkap ? $request->nama_lengkap : $mahasiswa->nama_lengkap;
    		$mahasiswa->jurusan = $request->jurusan ? $request->jurusan : $mahasiswa->jurusan;
    		$mahasiswa->tlp = $request->tlp ? $request->tlp : $mahasiswa->tlp;
    		$mahasiswa->save();

    		return response()->json(
				[
					"message" => "Data berhasil diubah",
					"data" => $mahasiswa,
				]
			);

    	}
    	else{

    		return response()->json(
				[
					"message" => "Id tidak ditemukan",
				],
				400
			);

    	}
    }

    public function delete($id)
    {
    	$mahasiswa = Mahasiswa::where('id', $id)->first();

    	if ($mahasiswa) {
    		$mahasiswa->delete();
    		return response()->json(
				[
					"message" => "Data berhasil dihapus".$id
				]
			);
    	}

    	else{
    		return response()->json(
				[
					"message" => "Id tidak ditemukan",
				],
				400
			);
    	}
			
	}

}
