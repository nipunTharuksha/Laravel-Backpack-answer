<?php

namespace App\Http\Controllers;

use App\Models\Instance;
use App\Models\User;
use Illuminate\Http\Request;

class InstanceCrudController extends Controller
{
    public function userInstances()
    {
        $user = User::find(1);

        $instance_ids_via_instance_user = (clone $user)->instances()->pluck('instance_id')->toArray(); //Instance id 4
        $instance_ids_via_project_user = Instance::whereIn('project_id', (clone $user)->projects()->pluck('project_id')->toArray())->get()->pluck('id')->toArray(); // Instance is 1,2

        $instance_ids = array_merge($instance_ids_via_instance_user,$instance_ids_via_project_user);

        $instances = Instance::find($instance_ids);

        return response()->json($instances);

    }
}
