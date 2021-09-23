<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $users = new User;
            $users = $users->withTrashed()->paginate(10);

            return response()->view('user.index', compact('users'), 200);
        } catch (\Throwable $th) {
            return redirect(route('users'))->with(['code' => 500, 'message' => 'Erro na tela de listagem dos usuários!']);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $roles = Role::all();

            return response()->view('user.create', compact('roles'), 200);
        } catch (\Throwable $th) {
            return redirect(route('user.create'))->with(['code' => 500, 'message' => 'Erro na tela de cadastro dos usuários!']);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\User\StoreUserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        try {
            $user = new User;

            $user->name     = $request->name;
            $user->email    = $request->email;
            $user->password = Hash::make($request->password);
            $user->birthday = $request->birthday;
            $user->cpf      = $request->cpf;
            $user->cep      = $request->cep;
            $user->address  = $request->address;
            $user->user_id  = auth()->user()->id;

            $user->save();

            $user->roles()->attach($request->role);

            return redirect(route('user.create'))->with(['code' => 201, 'message' => 'Usuário cadastrado com sucesso!']);
        } catch (\Throwable $th) {
            return redirect(route('user.create'))->with(['code' => 500, 'message' => 'Erro no cadastro do usuário!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $user = User::with('roles')->withTrashed()->findOrFail($id);

            return response()->view('user.show', compact('user'), 200);
        } catch (\Throwable $th) {
            return redirect(route('user.show'))->with(['code' => 500, 'message' => 'Erro na tela de exibição do usuário!']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $user = User::with('roles')->findOrFail($id);

            return response()->view('user.edit', compact('user'), 200);
        } catch (\Throwable $th) {
            return redirect(route('user.edit'))->with(['code' => 500, 'message' => 'Erro na tela de edição do usuário!']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\User\UpdateUserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request)
    {
        try {
            $data = $request->all();
            $user = User::findOrFail($request->id)->update($data);

            return redirect(route('user.edit', ['id' => $request->id]))->with(['code' => 201, 'message' => 'Usuário editado com sucesso!']);
        } catch (\Throwable $th) {
            return redirect(route('user.edit', ['id' => $request->id]))->with(['code' => 500, 'message' => 'Erro na edição do usuário!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();

            return back()->with(['code' => 200, 'message' => 'Usuário excluído com sucesso!']);
        } catch (\Throwable $th) {
            return back()->with(['code' => 500, 'message' => 'Erro na exclusão do usuário!']);
        }
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        try {
            $user = User::onlyTrashed()->findOrFail($id);
            $user->restore();

            return back()->with(['code' => 200, 'message' => 'Usuário restaurado com sucesso!']);
        } catch (\Throwable $th) {
            return back()->with(['code' => 500, 'message' => 'Erro na restauração do usuário!']);
        }
    }
}
