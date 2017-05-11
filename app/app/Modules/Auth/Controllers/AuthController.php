<?php namespace App\Modules\Auth\Controllers;

use Auth;
use Socialite;
use Illuminate\Http\Request;

use App\Modules\Auth\Models\User;
use App\Modules\Base\Controller;


class AuthController extends Controller
{
    function __construct(User $User) {
        $this->model = $User;
    }

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
        $authUser = $this->model->findOrCreateUser($user, 'google');
        Auth::login($authUser, true);

        // Try to redirect the user back to their previous page
        $auth_referer = $request->session()->get('auth_referer');
        if ($auth_referer) {
            return redirect($auth_referer);
        }
        return redirect('/');
    }

    public function logout() {
        Auth::logout();

        // Always redirect back home, regardless of where they came from
        return redirect('/');
    }
}
