<?php
namespace App\Http\Controllers;

use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller;

class UsersController extends Controller
{
    use Helpers;

    public function __construct()
    {
        $this->middleware('api.auth');
    }
    public function index(){
//        return User::all();
        $user = $this->auth->user();
        // return $this->response->array($user->toArray());
        return $user;
    }
    public function tw(){
        return '14cc423';
    }
}