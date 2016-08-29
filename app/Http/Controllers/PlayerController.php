<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Lamp\Transformers\PlayerTransformer;
use DB;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    protected $transformer;

    public function __construct(PlayerTransformer $transformer)
    {
        $this->transformer = $transformer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->invokeAPI('GET', 'roles', $request->all());
        $players = DB::connection('agame')->table('dat_role');
        if ($request->role) {
            if (is_numeric($request->role)) {
                $players = $players
                    ->where('id', $request->role)
                    ->orWhere('sid', $request->role)
                    ->orWhere('name', 'like', '%' . $request->role . '%')
                    ->orWhere('user', 'like', '%' . $request->role . '%');
            } else {
                $players = $players
                    ->Where('name', 'like', '%' . $request->role . '%')
                    ->orWhere('user', 'like', '%' . $request->role . '%');
            }
        } else {
            $players = $players->limit(100);
        }
        return response()->json([
            'data' => $this->transformer->transformCollection($players->get()),
        ]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
