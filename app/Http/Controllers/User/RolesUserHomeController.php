<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use App\Traits\DeleteModelTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RolesUserHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $role;
    private $permission;
    use DeleteModelTrait;
    public function __construct(Role $role,Permission $permission)
    {
        $this->role= $role;
        $this->permission = $permission;
    }

    public function index()
    {
        $roles = $this->role->paginate((int)config('contants.PER_PAGE_DEFAULT_ADMIN'));
        $viewData = [
            'roles' => $roles,
        ];
        return view('admin.role.index',$viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $permissionParent = $this->permission->where('parent_id',0)->get();
        $viewData = [
            'permissionParent' => $permissionParent,
        ];
        return view('admin.role.create',$viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        try{
            DB::beginTransaction();
            $role = $this->role->create([
                'name' =>$request->name,
                'display_name' =>$request->display_name,
            ]);

            $role->permissions()->attach($request->permission_id);
            DB::commit();
            toastr()->success('Bạn vừa thêm chức năng quyền thành công');
            return redirect()->route('roles.index');
        }
        catch(\Exception $exception){
            DB::rollBack();
            toastr()->error('Lỗi rồi');
            Log::error("Lỗi : ".$exception->getMessage()."Dòng : ".$exception->getLine());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permissionParent = $this->permission->where('parent_id',0)->get();
        $role = $this->role->findOrFail($id);
        $permissionsChecked = $role->permissions;
        $viewData = [
            'permissionParent' => $permissionParent,
            'role' => $role,
            'permissionsChecked' => $permissionsChecked,
        ];
        return view('admin.role.edit',$viewData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        try{
            DB::beginTransaction();
            $role = $this->role->find($id);
            $role->update([
                'name' =>$request->name,
                'display_name' =>$request->display_name,
            ]);

            $role->permissions()->sync($request->permission_id);
            DB::commit();
            @toastr()->success('Bạn vừa thao tác sửa quyền thành công');
            return redirect()->route('roles.index');
        }
        catch(\Exception $exception){
            DB::rollBack();
            @toastr()->error('Lỗi rồi');
            Log::error("Lỗi : ".$exception->getMessage()."Dòng : ".$exception->getLine());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try
        {
            $role = $this->role->findOrFail($id);
            $role->permissions()->detach();
            $this->deleteModelTrait($id,$this->role);
            @toastr()->success('Bạn vừa thao tác sửa quyền thành công');
            return redirect()->route('roles.index');
        } catch(ModelNotFoundException  $exception) {
            echo ("Lỗi : ".$exception->getMessage()."Dòng : ".$exception->getLine());
            @toastr()->error('Lỗi rồi');
            return redirect()->route('roles.index');
        }
    }
}
