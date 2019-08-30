<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Auth;
use Exception;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    
       
    protected $redirectTo = '\dashboard'; 
    //  public function authenticate() {
    //   if (Auth::attempt(['email' => $email, 'password' => $password])) {
      
    //      // Authentication passed...
    //      return redirect()->intended('dashboard');
    //   }
    // }
   
   //  public function login(LoginRequest $request)
   // {     
   //          $request->validate([
            
   //          'email' => 'required',
   //          'password' => 'required',
   //          ]);
   //     if ($this->auth->attempt($request->only('email', 'password')))
   //     {
   //      return redirect('dashboard');
   //      }
   //  }
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function redirectToGoogle()
    {

         return Socialite::driver('google')->redirect();

    }
   
    public function handleGoogleCallback()
    {
         try {
            $user = Socialite::driver('google')->user();
        } catch (Exception $e) {
            return Redirect('auth/google');
         }

        $authUser = $this->findOrCreateUser($user);

        Auth::login($authUser, true);

        return view('Eshopper.product-details');
        
    }
    private function findOrCreateUser($googleUser)
    {
        if ($authUser = User::where('google_id', $googleUser->id)->first()) {
            return $authUser;
        }

        return User::create([
            'first_name' => $googleUser->name,
            'email' => $googleUser->email,
            'google_id' => $googleUser->id,
            
        ]);
    }
}

