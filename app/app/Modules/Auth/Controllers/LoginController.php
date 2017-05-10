<?php namespace App\Modules\Auth\Controllers;

use Socialite;
use Illuminate\Http\Request;
use App\Modules\Base\Controller;


class LoginController extends Controller
{
    /**
     * Redirect the user to the Google authentication page.
     *
     * @return Response
     */
    public function redirectToProvider(Request $request)
    {
        $referer = $request->headers->get('referer');
        $request->session()->put('auth_referer', $referer);

        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return Response
     */
    public function handleProviderCallback(Request $request)
    {
        $user = Socialite::driver('google')->user();

        // Create user based of their user_token ($user->token)

        // Try to redirect the user back to their previous page
        $auth_referer = $request->session()->get('auth_referer');
        if ($auth_referer) {
            return redirect($auth_referer);
        }
        return redirect('/');
    }
}
