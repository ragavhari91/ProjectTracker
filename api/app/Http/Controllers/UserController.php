<?php 
namespace App\Http\Controllers;

use App\Http\Requests;


use App\Http\Controllers\Controller;

use App\Http\Model\User;
use App\Http\Model\Menu;
use App\Http\Model\Responsibility;

use Illuminate\Http\Request;
use Illuminate\Http\Response;


class UserController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
            return json_encode(User::all());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
           return json_encode(User::all());
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
              $user       =  new User();
             $email      =  $request->login_id;
            
            return json_encode(array("user"=>$email));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
        
        public function login(Request $request)
        {
              $user       =  new User();
              $email      =  $request->login_id;
              $password   =  $request->password;

              $result     =  $user->where('user_email',$email)->where('user_password',$password)->where('user_status',1000)->first();
              
              if($result == null)
              {
                  $response = array("status"=>"Failure","message"=>"Login Failure,Please check your credentials");
              }
              else
              {
                  $data = array("menu"=>$this->getMenuofUser($result->user_role),
                                "responsibility"=>$this->getResponsibilityofUser($result->user_role));
                  $response = array("status"=>"Success","data"=>$data);
              }

              return json_encode($response);
        }
        
        private function getMenuofUser($role_id)
        {
            $menu  =  new Menu();
            $result = $menu->select('menu.*')
                           ->join('menu_responsibility','menu.id','=','menu_responsibility.menu_id')
                           ->join('responsibility','responsibility.id','=','menu_responsibility.responsibility_id')
                           ->join('role_responsibility','role_responsibility.responsibility_id','=','responsibility.id')
                           ->join('role','role.id','=','role_responsibility.role_id')
                           ->where('role.id','=',$role_id)
                           ->get();

     
            return $result;
        }
        
        public function getResponsibilityofUser($role_id)
        {
            $responsibility = new Responsibility();
            $result = $responsibility->select('responsibility.*')
                            ->join('role_responsibility','role_responsibility.responsibility_id','=','responsibility.id')
                            ->where('role_responsibility.role_id','=',$role_id)
                            ->get();
            return $result;
        }
}
