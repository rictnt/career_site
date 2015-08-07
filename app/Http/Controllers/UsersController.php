<?php namespace App\Http\Controllers;

use App\C21\Users\Acl\Role;
use App\C21\Users\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CreateNewUserForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Laracasts\Flash\Flash;

class UsersController extends Controller {
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('users');
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
        $users = User::with('roles')->orderBy('last_name')->paginate(10);
        //return $users;
        return view('admin.users.users',compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreate()
	{
        $roles = Role::all()->lists('display_name','id');
		return view('admin.users.add_user', compact('roles'));
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateNewUserForm $request
     * @return Response
     */
	public function postStore(CreateNewUserForm $request)
	{
		//If  all validation has passed

        User::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ])->attachRole(array('id' => $request['role_list']));
        return redirect('admin/users');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getShow($id)
    {
        $users = User::with('roles.perms')->find($id);
        return $users;
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getEdit($id)
	{
        $roles = Role::all()->lists('display_name','id');
        $user = User::with('roles.perms')->findOrFail($id);
        return view('admin.users.edit_user',compact('user','roles'));
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param CreateNewUserForm $request
     * @param User $user
     * @return Response
     */
	public function patchUpdate($id,CreateNewUserForm $request)
	{
        $user = User::findOrFail($id);
        $user->update([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
        ]);
        $user->roles()->sync($request->input('role_list'));

        return redirect('admin/users');
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
    public function getMyProfile($id){
        if(Auth::user()->can(['can_manage_users']) or Auth::user()->id == $id){
            $user = User::with('office')->find($id);
            return view('admin/users/my_profile',compact('user'));
        }
        return 'You are unauthorized to edit a users profile';

    }
    public function patchEditProfile(Request $request){
        $name = $request->input('name');
        $value = $request->input('value');
        $user = User::where('id',$request->input('pk'))->first();
        $user->$name = $value;
        $user->save();

        return $value;
    }
    public function postEditImg()
    {
        if(Input::hasFile('file')){
            $file = Input::file('file');
            $name = time() . '.' . $file->getClientOriginalExtension();
            $user = User::find(Input::get('user_id'));
            Image::make($file)->save(base_path() . '/storage/c21/images/users/uploads/' . $name);
            $user->profile_img = url('img/users/uploads/' . $name);
            $user->save();
            Flash::success("Profile Image Was Updated");
            return redirect('admin/users/my-profile' . '/' . Input::get('user_id'));

        }
        Flash::error("Profile Was Not Updated");
        return redirect('admin/users/my-profile' . '/' . Input::get('user_id'));

    }



}
