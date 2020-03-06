<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
     * Update the user's profile information.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        $user = $request->user();

        $this->validate($request, [
            'email' => 'required|email|unique:users,email,'.$user->id,
        ]);

        if($request['id_number'] !== null){
            // $request['birthday'] = explode('T', $request['birthday'])[0];
            return tap($user)->update(
                $request->only('id_number', 'name', 'email', 'mobile_number', 'address')
            );
        } else {
            return tap($user)->update(
                $request->only('organization_number','company_name', 'name', 'email', 'mobile_number', 'address')
            );
        }
    }
}
