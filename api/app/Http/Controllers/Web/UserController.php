<?php 
namespace App\Http\Controllers\Web;

use App\Http\Requests;


use App\Http\Controllers\Controller;

use App\Http\Model\User;
use App\Http\Model\Menu;
use App\Http\Model\Responsibility;

use Illuminate\Http\Request;
use Illuminate\Http\Response;


class UserController extends Controller 
{
        private function isUserExist($user_email)
        {
            $user    = new User();
            $result  = $user->where('user_email','=',$user_email)->count();
            if($result != 0)
            {
                $userExist  = true;
            }
            else
            {
                $userExist = false;
            }
            return $userExist;
        }
        
	public function registerUser(Request $request)
        {
            $first_name  = $request->first_name;
            $last_name   = $request->last_name;
            $email       = $request->email;
            $password    = $request->password;
            
            // check if email already exists
           if($this->isUserExist($email))
           {
               $response = array("status"=>"Failure","message"=>"Email already exist");
           }
           else
           {
                $user        = new User();
            
                $user->user_first_name = $first_name;
                $user->user_last_name  = $last_name;
                $user->user_email      = $email;
                $user->user_password   = $password; 
                $user->user_role       = "1002"; //register as guest
                $user->user_status     = "1000"; //status user active
                try
                {
                    $result = $user->save();
                    if($result)
                    {
                        $response = array("status"=>"Success","message"=>"Data Inserted Successfully");
                    }
                    else 
                    {
                        $response = array("status"=>"Failure","message"=>"Data Insertion Failure");
                    }
                } 
                catch (Exception $ex) 
                {
                    $response = array("status"=>"Failure","message"=>"Error occurs please try again later","exception"=>$e);
                }
           }
           return json_encode($response);
        }
        
        
        public function login(Request $request)
        {
              $user       =  new User();
              $email      =  $request->login_id;
              $password   =  $request->password;

              $result     =  $user->select('user.*')->where('user_email',$email)->where('user_password',$password)->where('user_status',1000)->first();
              
              if($result == null)
              {
                  $response = array("status"=>"Failure","message"=>"Login Failure,Please check your credentials");
              }
              else
              {
                  $data = array("userdetail"=>$result,"menu"=>$this->getMenuofUser($result->user_role),
                                "responsibility"=>$this->getResponsibilityofUser($result->user_role));
                  $response = array("status"=>"Success","data"=>$data);
              }

              return json_encode($response);
        }
        
        private function getLoginSession($email)
        {
            
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
