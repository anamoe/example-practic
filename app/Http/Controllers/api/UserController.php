<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function register(Request $request)
	{

		$cekemail = User::where('email', $request->email)->first();
		if ($cekemail) {

			$out = [

				"message" => "email_ada",
				"code"   => 202,
			];

			return response()->json($out, $out['code']);

		} else {
		

			$datas = User::create([
				'name' => $request->name,
				'email' => $request->email,
				'password' => bcrypt($request->password),

			]);

			if ($datas) {

				$out = [

					"message" => "Selamat Akun Anda sudah terdaftar",
					"code"   => 201,
				];

			} else {
				$out = [

					"message" => "pendaftaran akun gagal",
					"code"   => 0,
				];
			}
			return response()->json($out, $out['code']);
		}
	}

	public function login(Request $request)
	{

		$email = $request->input('email');
		$password = $request->input('password');


		if ($logins = User::where('email', $email)->first()) {

	

				if (Hash::check($password, $logins->password)) {

	
					$response['succes'] = "1";
					$response['message'] = 'Berhasil login';
					$response['data'] = $logins;

					return response()->json($response);
				} else {

					$result["success"] = "0";
					$result["message"] = "Password Salah";
				}
				return response()->json($result);
			

		} else {
			$result["success"] = "0";
			$result["message"] = "Email Salah";
			return response()->json($result);
		}
	}
}
