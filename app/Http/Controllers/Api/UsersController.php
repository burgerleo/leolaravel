<?php
namespace App\Http\Controllers\Api;

use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller;
use App\User;
class UsersController extends Controller
{
    use Helpers;

    public function __construct()
    {
        $this->middleware('api.auth');
    }
    public function index(){
       // return User::all();
        $user = $this->auth->user();

        return $user;
    }
    public function tw(){
        return '14cc4dd23';
    } 
}
