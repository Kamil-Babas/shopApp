<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminUpdateUserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;


class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index() : View
    {
        $users = User::paginate(10);

        return view("users.index", compact("users"));
    }


    /**
     * Display the specified resource.
     * @param User $user
     * @return View
     */
    public function show(User $user) : View
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param User $user
     * @return View
     */
    public function edit(User $user) : View
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     * @param AdminUpdateUserRequest $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(AdminUpdateUserRequest $request, User $user) : RedirectResponse
    {
        $user = $user->fill($request->only(['name', 'surname', 'email', 'phone_number']));
        $user->save();

        return redirect('/users')->with('status', "User updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     * @param User $user
     * @return JsonResponse
     */
    public function destroy(User $user) : JsonResponse
    {
        $userId = $user->id;
        $user->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'user deleted successfully',
            'deletedResourceId' => $userId
        ], 200);

    }

}
