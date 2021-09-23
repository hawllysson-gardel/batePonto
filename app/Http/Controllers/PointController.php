<?php

namespace App\Http\Controllers;

use App\Models\Point;
use Illuminate\Http\Request;

use App\Http\Requests\Point\StorePointRequest;

class PointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $points = Point::where('user_id', auth()->user()->id)->paginate(10);

            return response()->view('dashboard', compact('points'), 200);
        } catch (\Throwable $th) {
            return redirect(route('dashboard'))->with(['code' => 500, 'message' => 'Erro na tela de dashboard!']);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        try {
            $my_id = auth()->user()->id;

            $points = Point::whereHas('user', function($query) use ($my_id) {
                $query->where('user_id', $my_id);
            })->with(array('user' => function($query) {
                $query->select('id','name', 'role_id', 'user_id')->with('role')->with(array('user' => function($query) {
                    $query->select('id','name');
                }));
            }))->paginate(10);

            return response()->view('point.index', compact('points'), 200);
        } catch (\Throwable $th) {
            return redirect(route('point.search'))->with(['code' => 500, 'message' => 'Erro na tela de histórico de pontos!']);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Point\StorePointRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePointRequest $request)
    {
        try {
            $point = new Point;

            $seconds = ':00';

            $date_entry = explode('T', $request->entry_time);
            $date_exit  = explode('T', $request->exit_time);

            $entry = $date_entry[0] . ' ' . $date_entry[1] . $seconds;
            $exit  = $date_exit[0] . ' ' . $date_exit[1] . $seconds;

            $point->description = $request->description;
            $point->entry_time  = $entry;
            $point->exit_time   = $exit;
            $point->user_id     = auth()->user()->id;

            $point->save();

            return redirect(route('dashboard'))->with(['code' => 201, 'message' => 'Ponto cadastrado com sucesso!']);
        } catch (\Throwable $th) {
            return abort(500, "INTERNAL SERVER ERROR.");
        }
    }
}
