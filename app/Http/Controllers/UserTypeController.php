<?php

namespace App\Http\Controllers;

use App\Models\UserType;
use App\Http\Requests\UserType\StoreUserTypeRequest;
use App\Http\Requests\UserType\UpdateUserTypeRequest;
use Illuminate\Http\Request;

class UserTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['msg' => 'Função não implementada!'], 500);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->json(['msg' => 'Função não implementada!'], 500);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return response()->json(['msg' => 'Função não implementada!'], 500);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return response()->json(['msg' => 'Função não implementada!'], 500);
    }

    /**
     * Get a the resource.
     *
     * @param  $id
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function get($id, Request $request)
    {
        try {
            $userType = new UserType;

            if ($request->has('trashed') && !(is_null($request->trashed))) {
                if ($request->trashed == 0) {
                    $userType = $userType->withTrashed();
                } elseif ($request->trashed == 1) {
                    $userType = $userType->onlyTrashed();
                }
            }

            $userType = $userType->find($id);

            return response()->json($userType, 200);
        } catch (\Throwable $th) {
            return response()->json(['msg' => 'Erro ao buscar o tipo!'], 500);
        }
    }

    /**
     * Search a listing of the resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        try {
            $userType = new UserType;

            if ($request->has('trashed') && !(is_null($request->trashed))) {
                if ($request->trashed == 0) {
                    $userType = $userType->withTrashed();
                } elseif ($request->trashed == 1) {
                    $userType = $userType->onlyTrashed();
                }
            }

            if ($request->has('type') && !(is_null($request->type))) {
                $userType = $userType->where('type', 'LIKE', "%{$request->type}%");
            }

            $userType = $userType->paginate();

            return response()->json($userType, 200);
        } catch (\Throwable $th) {
            return response()->json(['msg' => 'Erro na pesquisa dos tipos!'], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UserType\StoreUserTypeRequest $request
     * @return \App\Models\UserType $userType
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserTypeRequest $request)
    {
        try {
            $userType = UserType::create($request->all());

            return response()->json($userType, 201);
        } catch (\Throwable $th) {
            return response()->json(['msg' => 'Erro na criação do tipo!'], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  $id
     * @param  \App\Http\Requests\UserType\UpdateUserTypeRequest $request
     * @return \App\Models\userType $userType
     * @return \Illuminate\Http\Response
     */
    public function update($id, UpdateUserTypeRequest $request)
    {
        try {
            $userType = UserType::findOrFail($id);
            $userType->update($request->all());

            return response()->json($userType, 200);
        } catch (\Throwable $th) {
            return response()->json(['msg' => 'Erro na edição do tipo!'], 500);
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
            $userType = UserType::findOrFail($id);
            $userType->delete();

            return response()->json(['msg' => 'Tipo excluído com sucesso!'], 200);
        } catch (\Throwable $th) {
            return response()->json(['msg' => 'Erro na exclusão do tipo!'], 500);
        }
    }

    /**
     * Force remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function forceDestroy($id)
    {
        try {
            $userType = UserType::withTrashed()->findOrFail($id);
            $userType->forceDelete();

            return response()->json(['msg' => 'Tipo excluído (force) com sucesso!'], 200);
        } catch (\Throwable $th) {
            return response()->json(['msg' => 'Erro na exclusão (force) do tipo!'], 500);
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
            $userType = UserType::onlyTrashed()->findOrFail($id);
            $userType->restore();

            return response()->json(['msg' => 'Tipo restaurado com sucesso!'], 200);
        } catch (\Throwable $th) {
            return response()->json(['msg' => 'Erro na restauração do tipo!'], 500);
        }
    }
}
