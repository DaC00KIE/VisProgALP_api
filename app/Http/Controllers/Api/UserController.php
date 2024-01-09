<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Exception;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\StoreUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required | unique:users,username',
            'email' => 'required | email',
            'password' => 'required',
            'bio' => 'nullable',
            'location' => 'nullable',
            'display_name' => 'nullable',
            'profile_picture' => 'nullable'
        ]);
        // 'username' => ['required', 'unique'],
        // 'email' => ['required', 'email'],
        // 'password' => ['required'],
        // 'bio' => ['nullable'],
        // 'location' => ['nullable'],
        // 'display_name' => ['nullable'],
        // 'profile_picture' => ['nullable',]
        return new UserResource(User::create($validatedData));
    }
 
    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        if (!empty($user)) {
            try {
                $user->username = $request->username;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                $user->bio = $request->bio;
                $user->location = $request->location;
                $user->display_name = $request->display_name;
                $user-> profile_picture = $request->profile_picture;
                $user->save();
 
                return [
                    'status' => Response::HTTP_OK,
                    'message' => 'User Updated',
                    'data' => $user
                ];
            } catch (Exception $e) {
                return [
                    'status' => Response::HTTP_INTERNAL_SERVER_ERROR,
                    'message' => $e->getMessage(),
                    'data' => []
                ];
            }
        }

        return [
            'status' => Response::HTTP_NOT_FOUND,
            'message' => 'User not Found',
            'data' => []
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        if (!empty($request->id)) {
            $user = User::where('id', $request->id)->first();
        }

        if (!empty($user)) {
            $user->delete();
            return [
                'status' => Response::HTTP_OK,
                'message' => 'User Deleted',
                'data' => []
            ];
        }

        return [
            'status' => Response::HTTP_NOT_FOUND,
            'message' => 'User not Found',
            'data' => []
        ];
    }
}
