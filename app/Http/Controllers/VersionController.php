<?php

namespace App\Http\Controllers;

use App\Lamp\Transformers\VersionTransformer;
use App\Version;
use DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;

class VersionController extends ApiController
{
    /**
     * @var Lamp\Transformers\VersionTransformer
     */
    protected $versionTransformer;

    public function __construct(VersionTransformer $versionTransformer)
    {
        $this->versionTransformer = $versionTransformer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $versions = DB::table('versions');
        if ($request->version) {
            $versions = $versions
                ->where('version', $request->version)
                ->orWhere('version', 'like', $request->version . '.%');
        }
        if ($request->mode) {
            $versions = $versions->where('mode', $request->mode);
        }
        if ($request->deprecated) {
            $versions = $versions->where('deprecated', strtolower($request->deprecated) === 'true');
        }
        return response()->json([
            'data' => $this->versionTransformer->transformCollection($versions->get()),
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
        if (!Input::get('version') or !Input::get('mode')) {
            return $this->setStatusCode(422)
                ->respondWithError('Parameters failed validation for a version');
        }
        $version = Version::firstOrCreate(Input::all());
        return $this->setStatusCode(200)->respond([
            'msg' => 'Lesson successfully created.',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $version = Version::find($id);

        if (!$version) {
            return $this->respondNotFound('Version does not exist.');
        }

        return response()->json([
            'data' => $this->versionTransformer->transform($version),
        ]);
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
