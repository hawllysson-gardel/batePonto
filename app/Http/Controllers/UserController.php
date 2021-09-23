<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\User\StoreUserRequest;

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
            $users = $users->withTrashed()->where('id', "!=", auth()->user()->id)->paginate(10);

            return response()->view('user.index', compact('users'), 200);
        } catch (\Throwable $th) {
            return redirect(route('users'))->with(['code' => 500, 'message' => 'Erro na pesquisa dos usuários!']);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
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

            $user->save();

            return response()->view('user.create', compact('user'), 201);
        } catch (\Throwable $th) {
            return back()->with(['code' => 500, 'message' => 'Erro no cadastro do usuário!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
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
