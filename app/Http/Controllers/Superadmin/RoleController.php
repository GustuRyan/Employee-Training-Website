<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;


class RoleController extends Controller
{
    public function index($id)
    {

        $roles = Role::query();

        if ($id != 'All') {
            $roles->where('subject_type', $id);
        }

        return view('admin.pages.superadmin.role')
            ->with('products', $roles);
    }
}
