<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class createPermissionUserController extends Controller
{
    public function permission(){
        return view('admin.permission.create');
    }
    public function permission_add(Request $request)
    {
        try{
            $permissions = Permission::create([
                'name'=>$request->module_parent,
                'display_name' =>$request->module_parent,
                'parent_id' => 0,
            ]);

            foreach ($request->module_child as $value) {
                Permission::create([
                    'name'=>$value,
                    'display_name' =>$value,
                    'parent_id' => $permissions->id,
                    'key_code' =>$request->module_parent.'_'.$value
                ]);
            }
            toastr()->success('Bạn đã tạo quyền thành công');
            return redirect()->back();
        } catch (\Exception $exception) {
            toastr()->error('Error Create');
            Log::error("Lỗi : " . $exception->getMessage() . "--Line : " . $exception->getLine());
        }
    }

}
