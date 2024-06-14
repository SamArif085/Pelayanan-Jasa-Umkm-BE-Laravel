<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\LayananModel;


class ApiMoblieController extends Controller
{
    public function cekLogin(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        $username = $request->input('username');
        $password = $request->input('password');

        if (Auth::attempt(['username' => $username, 'password' => $password])) {
            $user = Auth::user();
            $token = bin2hex(random_bytes(20));
            $response = [
                'status' => true,
                'statusCode' => 200,
                'token' => $token,
                'value' => [
                    'id' => $user->id,
                    'username' => $user->username,
                    'nama' => $user->nama,
                    'no_telp' => $user->no_telp,
                    'role' => $user->role,
                ],
            ];
        } else {
            $response = [
                'status' => false,
                'statusCode' => 400,
                'message' => "User not found",
            ];
        }

        return response()->json($response);
    }


    public function layananData()
    {
        $data['data'] = LayananModel::get()->toArray();

        return response()->json($data);
    }
}
