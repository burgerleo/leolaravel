<?php

// namespace App\Http\Api\Login;
namespace App\Http\Controllers;

use App\User;
use Dingo\Api\Routing\Helpers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Storage;
class LoginController extends Controller
{
    use AuthenticatesUsers;
    use Helpers;

    public function login(Request $request){

        $user = User::where('email', $request->email)->orWhere('name', $request->email)->first();

        if($user && Hash::check($request->get('password'), $user->password)){
            $token = JWTAuth::fromUser($user);
            $date = compact('user','token');
            $json_date = json_encode($date);
            Storage::disk('local')->put('token.json',$json_date );
            return $this->sendLoginResponse($request, $token);
        }
        // return '失敗';

        return $this->sendFailedLoginResponse($request);
    }

    public function sendLoginResponse(Request $request, $token){
        $this->clearLoginAttempts($request);

        return $this->authenticated($token);
    }

    public function authenticated($token){
        // return $token;
        return $this->response->array([
            'token' => $token,
            'status_code' => 200,
            'message' => 'User Authenticated'
        ]);
    }

    public function sendFailedLoginResponse(){
        // throw new BadRequestHttpException('參數缺少');

        throw new UnauthorizedHttpException('',"bad Credentials");
    }

    public function logout(){
        $this->guard()->logout();
    }
 }