<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\UserCreateRequest;
use App\Http\Requests\Users\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
class UsersController extends Controller
{
    public function index()
    {
        $users = User::filtered()->paginate(10);
        return Inertia::render('Admin/Users/Index', [
            'users' => $users,
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Admin/Users/Create');
    }

    public function store(UserCreateRequest $request)
    {
        $data = $request->validated();

        if (isset($data['number'])) {
            User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'number' => $data['number'],
                'password' => bcrypt($data['password']),
                'isAdmin' => $data['isAdmin'] ?? false,
            ]);

            return redirect()->back()->with('success', 'User created successfully.');
        } else {
            return redirect()->back()->with('error', 'User creation failed. Number is required.');
        }
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $updateData = [
            'name' => $request->get('name', $user->name),
            'email' => $request->get('email', $user->email),
            'number' => $request->get('number', $user->number),
            'isAdmin' => $request->get('isAdmin', $user->isAdmin),
        ];

        if ($request->filled('password')) {
            $updateData['password'] = bcrypt($request->password);
        }

        $user->update($updateData);

        return redirect()->back()->with('success', 'User updated successfully.');
    }


    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully.');
    }

}
