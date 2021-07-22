<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [

        ]);
    }

    /**
     * Update user instance.
     *
     * @param  array  $data
     * @return string
     */
    protected function update(UserUpdateRequest $request, User $user)
    {
        if ($user->update($request->except('password'))) {
            $user->password = bcrypt($request->password);
            $user->save();

            session()->flash('msg', 'User account successfully updated.');

            return back();
        } else {
            return "Error. Could not update user account.";
        }
    }

    /**
     * View list of system users.
     *
     * @return void
     */
    public function index()
    {
        $users = User::all();

        if (Auth::user()->user_type != 0) {
            return redirect('/');
        }

        return view('users')
            ->with([
                'users' => $users
            ]);
    }

    /**
     * Edit user form.
     *
     * @param Request $request
     * @return void
     */
    public function edit(Request $request, User $user)
    {
        return view('edit-user', compact('user'));
    }

    /**
     * Change user access.
     *
     * @param Request $request
     * @return void
     */
    public function changeAccess(Request $request, User $user)
    {
        if (! Auth::user()->isAdmin()) {

            $updated = $user->update([
                'is_active' => $request->input('action')
            ]);

            if ($updated) {
                return redirect('users');
            } else {
                return "Error. No changed made to the account.";
            }

        } else {
            return "Access denied.";
        }
    }

    /**
     * Delete user.
     *
     * @param Request $request
     * @return void
     */
    public function deleteUser(Request $request, User $user)
    {
        if (! Auth::user()->isAdmin()) {
            return [
                'error' => 1,
                'msg' => "Access denied."
            ];
        } else {
            if (! Auth::id() != $user->id) {
                return [
                    'error' => 0,
                    'msg' => "User successfully deleted."
                ];
            } else {
                return [
                    'error' => 1,
                    'msg' => "You cannot delete yourself."
                ];
            }
        }
    }
}
