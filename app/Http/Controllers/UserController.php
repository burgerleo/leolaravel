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
        $user = $this->auth->user();

        return $user;
    }
    public function tw(){
        return 123;
    }
}