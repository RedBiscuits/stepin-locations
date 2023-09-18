<?php

namespace App\Http\Controllers;

use App\Models\ClientRecord;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function getAdmins(Request $request)
    {

       $usersWithRole = User::role("admin")
           ->orderBy("id" , "desc")
           ->get();

        $response = [
            'success' => true,
            'message' => 'Admin fetched.',
            'data' => $usersWithRole,
            'errors' =>  null,
        ];
        return response($response, 200);
    }

    public function createAdmin(Request $request)
    {

        $fields = Validator::make($request->post(), [
            "email" => 'required|email|unique:users',
            "name" => 'required|string',
            "password" => 'required|string|confirmed|min:8'
        ]);

        if ($fields->fails()) {

            $response = [
                'success' => false,
                'message' => "Validation Error",
                'data' => null,
                'errors' => $fields->errors(),
            ];

            return response($response, 403);
        }

        $admin = User::create([
            "name" => $fields->validated()['name'],
            "email" => $fields->validated()['email'],
            "password" => $fields->validated()['password'],
        ]);

        $admin->assignRole('admin');

        $response = [
            'success' => true,
            'message' => 'Admin created successfully',
            'data' => [
                "name" => $admin->name,
                "email" => $admin->email,
                "password" => $admin->password,
                "created_at" => $admin->created_at
            ],
            'errors' =>  null,
        ];
        return response($response, 200);
    }

    public function updateAdmin(Request $request)
    {

        $fields = Validator::make($request->post(), [
            "id" => 'required|integer',
            "email" => 'required|email',
            "name" => 'required|string',
            "password" => 'nullable|string|confirmed|min:8'
        ]);

        if ($fields->fails()) {

            $response = [
                'success' => false,
                'message' => "Validation Error",
                'data' => null,
                'errors' => $fields->errors(),
            ];

            return response($response, 403);
        }

        $admin = User::find($fields->validated()['id']);

        if (!$admin) {
            $response = [
                'success' => false,
                'message' => "There's no admin with this id",
                'data' => null,
                'errors' => null
            ];

            return response($response, 403);
        }


        if ($admin->hasRole("superAdmin")){

            $response = [
                'success' => true,
                'message' => "Super admin can't be updated",
                "data" => null,
                'errors' =>  null,
            ];
            return response($response, 400);

        }

        $userWithEmail = User::where("email" , $fields->validated()['email'])->first();

        if ($userWithEmail) {
            if ($userWithEmail->id != $admin->id) {
                $response = [
                    'success' => false,
                    'message' => "This email already taken",
                    'data' => null,
                    'errors' => null
                ];

                return response($response, 403);
            }
        }


        if (isset($fields->validated()['password'])) {
            $admin->update([
                "name" => $fields->validated()['name'],
                "email" => $fields->validated()['email'],
                "password" => $fields->validated()['password'],
            ]);
        } else {
            $admin->update([
                "name" => $fields->validated()['name'],
                "email" => $fields->validated()['email'],
            ]);
        }
        

        $response = [
            'success' => true,
            'message' => 'Admin created successfully',
            'data' => [
                "name" => $admin->name,
                "email" => $admin->email,
                "created_at" => $admin->created_at
            ],
            'errors' =>  null,
        ];
        return response($response, 200);
    }

    public function deleteAdmin(Request $request)
    {

        $fields = Validator::make($request->query(), [
            "id" => 'required|integer',
        ]);

        if ($fields->fails()) {

            $response = [
                'success' => false,
                'message' => "Validation Error",
                'data' => null,
                'errors' => $fields->errors(),
            ];

            return response($response, 403);
        }

        $admin = User::find($fields->validated()['id']);

        if (!$admin) {

            $response = [
                'success' => true,
                'message' => "admin not found",
                "data" => null,
                'errors' =>  null,
            ];
            return response($response, 400);
        }

        if ($admin->hasRole("superAdmin")) {

            $response = [
                'success' => true,
                'message' => "Super admin can't be deleted",
                "data" => null,
                'errors' =>  null,
            ];
            return response($response, 400);
        }

        $admin->delete();

        $response = [
            'success' => true,
            'message' => 'Admin deleted successfully',
            'data' => null,
            'errors' =>  null,
        ];
        return response($response, 200);
    }
}
