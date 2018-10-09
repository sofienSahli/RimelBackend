<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class UserController extends Controller
{
    protected $request;
    protected $user;

    /**
     *
     * @param Request $request
     * @param Product $user
     */
    public function __construct(Request $request, User $user)
    {
        $this->request = $request;
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = $this->user->all();
        return response()->json(['users' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $request->all();
        $this->user->first_name = $user['first_name'];
        $this->user->id = $user['id'];
        $this->user->last_name = $user['last_name'];
        $this->user->email = $user['email'];
        $this->user->password = $user['password'];
        $this->user->role = $user['role'];
        $this->user->save();
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $user = User::find($id);
        $user->first_name = $data['first_name'];
        $user->last_name = $data['last_name'];
        $user->email = $data['email'];
        $user->password = $data['password'];
        $user->role = $data['role'];
        $user->save();

        return response()->json($user);
    }

    public function login($password, $email)
    {
        $user = User::where([["password","=",$password ] ,["email","=",$email ]])->first();
        return   response()->json($user)   ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->user->find($id);
        $user->delete();

        return response()->json(['status' => Response::HTTP_OK]);
    }


}
