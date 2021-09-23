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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function show(Point $point)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function edit(Point $point)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Point $point)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function destroy(Point $point)
    {
        //
    }
}
