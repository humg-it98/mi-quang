<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\createUserRequest;
use App\Models\Role;
use App\Models\User;
use App\Traits\StorageImageTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserHomeController extends Controller
{
    /**
     * @var User
     */
    private $user;
    private $role;
    use StorageImageTrait;

    /**
     * Display a listing of the resource.
     *
     * @param User $user
     * @param Role $role
     */
    public function __construct(User $user,Role $role)
    {
        $this->user = $user;
        $this->role =$role;
    }

    public function index()
    {
        $users = $this->user->orderBy('id', 'DESC')->paginate((int)config('contants.PER_PAGE_DEFAULT_ADMIN'));
        $viewData = [
            'users' => $users,
        ];
        return view('admin.user.index',$viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $roles = $this->role->all();
        $viewData = [
          'roles'  => $roles,
        ];
        return view('admin.user.create',$viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(createUserRequest $request)
    {
        try{
            DB::beginTransaction();
            $dataInert = [
                'name' => $request->name,
                'email'=> $request->email,
                'password' => Hash::make('12345678'),
            ];

            if($request->avatar){
                $imageSlider = $this->storageTraitUpload($request, 'avatar', 'users');
                if (!empty($imageSlider))
                {
                    $dataInert['avatar'] = $imageSlider['file_path'];
                }
            }

            $user = $this->user->create($dataInert);
            $roleIds = $request->role_id;
            $user->roles()->attach($roleIds);
            toastr()->success('B???n v???a th??m ng?????i d??ng th??nh c??ng');
            return redirect()->route('users.index');
        } catch(\Exception $exception){
            DB::rollBack();
            toastr()->error('L???i r???i');
            echo ("L???i : ".$exception->getMessage()."D??ng : ".$exception->getLine());
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
        $roles = $this->role->all();
        $user = $this->user->findOrFail($id);
        $rolesOfUser = $user->roles;
        $viewData = [
            'user' => $user,
            'roles' => $roles,
            'rolesOfUser' => $rolesOfUser,
        ];
        return view('admin.user.edit',$viewData);
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
            if(!empty($_POST['password'] )){
                $password = $request->password;
                $this->user->find($id)->update([
                    'name' => $request->name,
                    'email'=> $request->email,
                    'password'=> Hash::make($request->password),
                ]);
            }else{
                $this->user->find($id)->update([
                    'name' => $request->name,
                    'email'=> $request->email,
                ]);
            }
            $user = $this->user->find($id);
            $roleIds = $request->role_id;
            $user->roles()->sync($roleIds);
            DB::commit();
            toastr()->success('Success Update');
            return redirect()->route('users.index');
        } catch(\Exception $exception){
            DB::rollBack();
            toastr()->error('Error Update');
            Log::error("L???i : ".$exception->getMessage()."D??ng : ".$exception->getLine());
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
        $user = User::findOrfail($id);
        if ($user)
        {
            if ($user->id == 1) {
                toastr()->error('B???n kh??ng th??? x??a super Admin');
                return redirect()->back();
            }
            else{
                $user->delete();
                toastr()->success('User ???? ???????c x??a th??nh c??ng');
                return redirect()->back();
            }
        }else{
            toastr()->info('C?? l???i khi x??a, li??n h??? b??o Admin');
            return redirect()->back();
        }
    }

}
