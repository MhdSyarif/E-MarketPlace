<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Company;
use DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

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
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'     => 'required|max:255',
            'username' => 'required|max:20|unique:users',
            'email'    => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $data['id'] = DB::table('users')->max('id')+1;
        
        /**
         * First Logika
         */
        // $nextID     = DB::table('mst_company')
        //                 ->SELECT('id_company')
        //                 ->limit(1)
        //                 ->orderby('id_company', 'DESC')
        //                 ->first();
        // if(is_null($nextID)){
        //     $nextID      = 'C000001';
        //     $nextCompany = str_pad($nextID,6,'0',STR_PAD_LEFT);
        // }else{
        //     $rand_code   = substr($nextID->id_company,1,6)+1;
        //     $nextCompany = 'C'.str_pad($rand_code,6,'0',STR_PAD_LEFT);
        // }
        /**
         * END
         */
        
        /**
         * Second Logika
         */
        $nextID          = DB::table('mst_company')
                            ->SELECT(DB::raw('MAX(SUBSTRING(id_company,2)+1) as id_company'))
                            ->first();

        if (is_null($nextID->id_company)) {
            $nextID      = '1';
            $nextCompany = 'C'.str_pad($nextID,6,'0',STR_PAD_LEFT);
        }else{
            $nextCompany = 'C'.str_pad($nextID->id_company,6,'0',STR_PAD_LEFT);
        }
        /**
         * END
         */
        
        // Save to table mst_company
        $newCompany             = New Company();
        $newCompany->id_company = $nextCompany;
        $newCompany->save();
        // END

        // Save to table users
        return User::create([
            'id'        => $data['id'],
            'name'      => $data['name'],
            'username'  => $data['username'],
            'email'     => $data['email'],
            'id_header' => $nextCompany,
            'password'  => bcrypt($data['password']),
        ]);
        // END
    }
}
