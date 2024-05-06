<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function tambahUser(Request $request)
    {
        try {
            $AddUser = new User();
            $AddUser->name = $request->nama;
            $AddUser->username = $request->username;
            $AddUser->password = Hash::make($request->password);
            $AddUser->role = $request->role;

            $AddUser->save();

            return response()->json(['message' => 'Data pesanan berhasil disimpan.'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menyimpan data pesanan: ' . $e->getMessage()], 500);
        }
    }
    public function getUserTek()
    {
        $getUser = User::where('role',2)->get();
        return response()->json($getUser);
    }
    public function getData()
    {
        $getUser = User::whereIn('role', [2, 3])->get();
        return response()->json($getUser);
    }

    public function editUser(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);
            $user->name = $request->nama;
            $user->username = $request->username;
            $user->role = $request->role;

            $user->save();

            return response()->json(['message' => 'Data pengguna berhasil diperbarui.'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal memperbarui data pengguna: ' . $e->getMessage()], 500);
        }
    }

    public function deleteUser($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();

            return response()->json(['message' => 'Data pengguna berhasil dihapus.'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menghapus data pengguna: ' . $e->getMessage()], 500);
        }
    }
}
