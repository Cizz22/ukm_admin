<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Request as ModelsRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $req = ModelsRequest::all();

        $response = [
            'message' => 'Data Pengaduan',
            'data' => $req
        ];

        return response()->json($response,200);
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
        $this->validate($request, [
            'title' => 'required',
            'address' => 'required',
            'message' => 'required',
            'prioritas' => 'required',
            'category_id' => 'required',
        ]);


        try {
            $req = ModelsRequest::create([
                'title' => $request->title,
                'slug' => Str::slug($request->title, '-'),
                'address' => $request->address,
                'message' => $request->message,
                'prioritas' => $request->prioritas,
                'category_id' =>$request->category_id,
                'user_id' => 1
            ]);

            $response = [
                'message' => 'Data Tersimpan',
                'data' => $req
            ];
            return response()->json($response, 201);
        } catch (QueryException $e) {
            return response()->json([
                'message' => $e
            ]);
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
