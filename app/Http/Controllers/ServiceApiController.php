<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Department;
use Illuminate\Http\Request;

class ServiceApiController extends Controller
{
	public function edit(Request $request)
	{  
        $data = Service::find ( $request->id );
        $data->name = ($request->name);
        $data->description = ($request->description);
        $data->save ();
        return response ()->json ( $data );
    }

    public function delete(Request $request)
    {
    	Department::find ($request->id)->delete();
    	return response ()->json ();
    }
    //
}
