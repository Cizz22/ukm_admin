<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Request as ModelsRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requests = ModelsRequest::latest()->when(request()->q, function($requests) {
            $requests = $requests->where('status', 'like', '%'. request()->q . '%');
        })->paginate(10);

        return view('admin.request.index')->with('requests', $requests);

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

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $request = ModelsRequest::find($id);
        return view('admin.request.show')->with('request', $request);
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
     *  @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $category = ModelsRequest::findOrFail($id);


        try {
            if($request->tipe == 'selesai')
            {
                $category->update([
                    'status' => 'selesai'
                ]);
                return response()->json([
                    'status' => 'success'
                ]);
            }else{
                $category->update([
                    'status' => 'ditolak'
                ]);
                return response()->json([
                    'status' => 'success'
                ]);
            }
        } catch (QueryException $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = ModelsRequest::findOrFail($id);

        try {
            $category->delete();

            return response()->json([
                'status' => 'success'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e
            ]);
        }
    }
}
