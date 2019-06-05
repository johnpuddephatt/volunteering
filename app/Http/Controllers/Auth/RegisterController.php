<?php

namespace App\Http\Controllers\Auth;

use App\Models\Organisation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Kris\LaravelFormBuilder\FormBuilder;
use Illuminate\Http\Request;
use App\Http\Requests\FrontOrganisationRequest;

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
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard
    ';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    public function showRegistrationForm(Request $request,FormBuilder $formBuilder)
    {
        $form = $formBuilder->create('App\Forms\OrganisationRegistrationForm', [
            'method' => 'POST',
            'url' => route('register'),
        ]);
        return view('auth.register', compact('form'));
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\Organisation
     */
     public function register(FrontOrganisationRequest $request)
     {

        $validated = $request->validated();
        $validated['password'] = bcrypt($validated['password']);

         $organisation = Organisation::create($validated);

         $organisation->sendEmailVerificationNotification();
         $organisation->notifyAdminOfAccountCreation();

         $request->session()->flash('success', 'Account created successfully! You will receive a verification email shortly.');

         $this->guard()->login($organisation);

         return $this->registered($request, $organisation)
                         ?: redirect($this->redirectPath());
     }

}
