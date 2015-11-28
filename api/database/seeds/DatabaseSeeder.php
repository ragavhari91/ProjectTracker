<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('StatusGroupTableSeeder');
                $this->call('StatusTableSeeder');
                $this->call('StatusMappingTableSeeder');
                $this->call('RoleGroupTableSeeder');
                $this->call('RoleTableSeeder');
                $this->call('RoleMappingTableSeeder');
                $this->call('ResponsibilityTableSeeder');
                $this->call('RoleResponsibilityTableSeeder');
                $this->call('MenuTableSeeder');
                $this->call('MenuResponsibilityTableSeeder');
                $this->call('UserTableSeeder');
                $this->call('ProjectTypeTableSeeder');
                $this->call('ProjectTableSeeder');
                $this->call('ProjectMembersTableSeeder');
	}

}


class StatusGroupTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('status_group')->delete();
                
                DB::table('status_group')->insert(array(
                    array('id'=>'1000','name'=>'User Related','description'=>'Status related to user such as active,in-active etc..'),
                    array('id'=>'1001','name'=>'Project Related','description'=>'Status related to project such as started,completed etc..'),
                    array('id'=>'1002','name'=>'Role Related','description'=>'Status related to roles such as active,in-active etc..')
                ));
	}

}


class StatusTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('status')->delete();
                
                DB::table('status')->insert(array(
                    array('id'=>'1000','name'=>'User Active','description'=>'User can login'),
                    array('id'=>'1001','name'=>'User InActive','description'=>'User cannot login'),
                    array('id'=>'1002','name'=>'Role Active','description'=>'Role exists'),
                    array('id'=>'1003','name'=>'Role InActive','description'=>'Role Not Exists'),
                    array('id'=>'1004','name'=>'Project Active','description'=>'Project Exists'),
                    array('id'=>'1005','name'=>'Project InActive','description'=>'Project Not Exists'),
                    
                ));
	}

}

class StatusMappingTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('status_mapping')->delete();
                
                DB::table('status_mapping')->insert(array(
                    array('status_id'=>'1000','status_group_id'=>'1000'),
                    array('status_id'=>'1001','status_group_id'=>'1000'),
                    array('status_id'=>'1002','status_group_id'=>'1002'),
                    array('status_id'=>'1003','status_group_id'=>'1002'),
                    array('status_id'=>'1004','status_group_id'=>'1001'),
                    array('status_id'=>'1005','status_group_id'=>'1001'),
                ));
	}

}



class RoleGroupTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('role_group')->delete();
                
                DB::table('role_group')->insert(array(
                    array('id'=>'1000','name'=>'User Related','description'=>'roles related to user such as admin,guest etc..','status_code'=>'1002'),
                    array('id'=>'1001','name'=>'Project Related','description'=>'Status related to project such as project manager,developer etc..','status_code'=>'1002')
                ));
	}

}


class RoleTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('role')->delete();
                
                DB::table('role')->insert(array(
                    array('id'=>'1000','name'=>'Super Admin','description'=>'Manager of entire application','status_code'=>'1002'),
                    array('id'=>'1001','name'=>'Admin','description'=>'Sub Manager','status_code'=>'1002'),
                    array('id'=>'1002','name'=>'Guest','description'=>'Test user','status_code'=>'1002'),
                    array('id'=>'1003','name'=>'Project Admin','description'=>'Admin of the project','status_code'=>'1002'),
                    array('id'=>'1004','name'=>'Project Manager','description'=>'Manages the project','status_code'=>'1002'),
                    array('id'=>'1005','name'=>'Developer','description'=>'Develops the project','status_code'=>'1002'),
                    
                ));
	}

}

class RoleMappingTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('role_mapping')->delete();
                
                DB::table('role_mapping')->insert(array(
                    array('role_id'=>'1000','role_group_id'=>'1000'),
                    array('role_id'=>'1001','role_group_id'=>'1000'),
                    array('role_id'=>'1002','role_group_id'=>'1000'),
                    array('role_id'=>'1003','role_group_id'=>'1001'),
                    array('role_id'=>'1004','role_group_id'=>'1001'),
                    array('role_id'=>'1005','role_group_id'=>'1001'),
                ));
	}

}

class ResponsibilityTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('responsibility')->delete();
                
                DB::table('responsibility')->insert(array(
                    array('id'=>'1000','name'=>'Manage Project','description'=>'One who manages project'),
                    array('id'=>'1001','name'=>'Manage User','description'=>'One who manages user')
                 ));
	}
}

class RoleResponsibilityTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('role_responsibility')->delete();
                
                DB::table('role_responsibility')->insert(array(
                    array('id'=>'1000','role_id'=>'1000','responsibility_id'=>'1001'),
                    array('id'=>'1001','role_id'=>'1000','responsibility_id'=>'1001'),
                    array('id'=>'1002','role_id'=>'1000','responsibility_id'=>'1001'),
                    array('id'=>'1003','role_id'=>'1000','responsibility_id'=>'1000'),
                    array('id'=>'1004','role_id'=>'1000','responsibility_id'=>'1000'),
                    array('id'=>'1005','role_id'=>'1000','responsibility_id'=>'1000'),
                 ));
	}
}

class MenuTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('menu')->delete();
                
                DB::table('menu')->insert(array(
                    array('id'=>'1000','name'=>'Manage Project','icon'=>'','url'=>'dashboard.manage.projects'),
                    array('id'=>'1001','name'=>'Manage User','icon'=>'','url'=>'dashboard.manage.users')
                 ));
	}
}

class MenuResponsibilityTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('menu_responsibility')->delete();
                
                DB::table('menu_responsibility')->insert(array(
                    array('id'=>'1000','menu_id'=>'1000','responsibility_id'=>'1000'),
                    array('id'=>'1001','menu_id'=>'1001','responsibility_id'=>'1001')
                 ));
	}
}


class UserTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('user')->delete();
                
                DB::table('user')->insert(array(
                    array('id'=>'1000','user_first_name'=>'Ragav','user_last_name'=>'Hari','user_age'=>'25','user_gender'=>'1','user_email'=>'ragavhari91@gmail.com','user_password'=>'Ragav','user_mobile'=>'8056598186','user_role'=>'1000','user_status'=>'1000'),
                    array('id'=>'1001','user_first_name'=>'Uva','user_last_name'=>'Prakash','user_age'=>'24','user_gender'=>'1','user_email'=>'uva@gmail.com','user_password'=>'uva','user_mobile'=>'7897897897','user_role'=>'1000','user_status'=>'1000'),
                    array('id'=>'1002','user_first_name'=>'Vigneshmuthu','user_last_name'=>'smvm','user_age'=>'25','user_gender'=>'1','user_email'=>'vigneshmuthu.s.m@gmail.com','user_password'=>'vignesh','user_mobile'=>'8978978978','user_role'=>'1000','user_status'=>'1000'),
                    array('id'=>'1003','user_first_name'=>'Harish','user_last_name'=>'Balaji','user_age'=>'25','user_gender'=>'1','user_email'=>'harish@gmail.com','user_password'=>'harish','user_mobile'=>'9876543210','user_role'=>'1000','user_status'=>'1000')
                ));
	}

}

class ProjectTypeTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('project_type')->delete();
                
                DB::table('project_type')->insert(array(
                    array('id'=>'1000','name'=>'Web Application','description'=>'Sample description for web app'),
                    array('id'=>'1001','name'=>'Mobile Application','description'=>'Sample description for mobile app')
                ));
	}

}

class ProjectTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('project')->delete();
                
                DB::table('project')->insert(array(
                    array('id'=>'1000','project_name'=>'WebProject','project_type'=>'1000','project_status'=>'1004','project_description'=>'Sample Web Application'),
                    
                ));
	}

}

class ProjectMembersTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('project_members')->delete();
                
                DB::table('project_members')->insert(array(
                    array('id'=>'1000','project_id'=>'1000','user_id'=>'1000','user_type'=>'1003','user_status'=>'1000'),
                    array('id'=>'1001','project_id'=>'1000','user_id'=>'1001','user_type'=>'1005','user_status'=>'1000'),
                    array('id'=>'1002','project_id'=>'1000','user_id'=>'1002','user_type'=>'1005','user_status'=>'1000'),
                    array('id'=>'1003','project_id'=>'1000','user_id'=>'1003','user_type'=>'1005','user_status'=>'1000'),
                    
                ));
	}

}