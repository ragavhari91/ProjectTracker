<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class statusController extends Controller {

	public function addStatusGroup(Request $request)
        {
            $status_group_name = $request->name;
            $status_group_desc = $request->description;
        }
}
