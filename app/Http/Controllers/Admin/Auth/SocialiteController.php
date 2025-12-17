<?php

namespace App\Http\Controllers\Admin\Auth;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Support\Facades\Session;
use App\CentralLogics\Helpers;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\Support\Str;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;

class SocialiteController extends Controller
{
    public function loginSocial(Request $request, string $provider): RedirectResponse
    {
        $this->validateProvider($request);
 
        return Socialite::driver($provider)->redirect();
    }
 
    public function callbackSocial(Request $request, string $provider)
    {
        $this->validateProvider($request);
       
        $response = Socialite::driver($provider)->user();
        
        $user = User::where('email', $response->getEmail())->first();
        
         if (!$user) {
            $user = User::create([
                'email' => $response->getEmail(),
                'name' => $response->getName() ?? $response->getNickname(),
                'password' => Hash::make(Str::random(16)),
                'status' => 'active',
               
            ]);
    
            
            $data = [$provider . '_id' => $response->getId()];
     
            if ($user->wasRecentlyCreated) {
                $data['name'] = $response->getName() ?? $response->getNickname();
     
                event(new Registered($user));
            }
            
            
            $data = [$provider . '_id' => $response->getId()];
            $user->update($data);
        

       
            // No user found -> redirect to login with error
            //return redirect()->route('login')->with('error', 'No account found for this Google account. Please register first.');
                
            Auth::login($user, remember: true);
 
            return redirect()->intended(RouteServiceProvider::PROFILE);
            
        }else{
            if ($user->status !== 'active') {
                return redirect()->route('login')->with('error', 'Your account is not active. Please contact support.');
            }
 
            Auth::login($user, remember: true);
     
            return redirect()->intended(RouteServiceProvider::DASHBOARD);
        }
    }
 
    protected function validateProvider(Request $request): array
    {
        return $this->getValidationFactory()->make(
            $request->route()->parameters(),
            ['provider' => 'in:facebook,google,github']
        )->validate();
    }
}