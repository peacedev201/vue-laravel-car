<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\JsonResponse
     */
    protected function registered(Request $request, User $user)
    {
        if ($user instanceof MustVerifyEmail) {
            $user->sendEmailVerificationNotification();

            return response()->json(['status' => trans('verification.sent')]);
        }

        return response()->json($user);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data, $recaptcha)
    // protected function validator(array $data)
    {
        if(isset($data['idNumber'])) {
            return Validator::make($data, [
                'idNumber' => 'required|max:11',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:6|confirmed',
                'address' => 'required|max:255',
                'mobile' => 'required|max:15',
                'name' => 'required|max:255',
                'recaptcha' => ['required', $recaptcha],
            ]);
        } else {
            return Validator::make($data, [
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:6|confirmed',
                'address' => 'required|max:255',
                'mobile' => 'required|max:15',
                'companyName' => 'required|max:15',
                'name' => 'required|max:255',
                'organizationNumber' => 'required',
                'recaptcha' => ['required', $recaptcha],
            ]);
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // var_dump($data['birthday']);
        if(isset($data['idNumber'])){
            // $date = explode('T', $data['birthday'])[0];
            return User::create([
                'id_number' => $data['idNumber'],
                'name' => $data['name'],
                'email' => $data['email'],
                'mobile_number' => $data['mobile'],
                // 'birthday' => $date,
                'address' => $data['address'],
                'password' => bcrypt($data['password']),
            ]);
        } else {
            return User::create([
                'organization_number' => $data['organizationNumber'],
                'company_name' => $data['companyName'],
                'email' => $data['email'],
                'name' => $data['name'],
                'mobile_number' => $data['mobile'],
                'address' => $data['address'],
                'password' => bcrypt($data['password']),
            ]);
        }
    }
}
