<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Request as ModelsRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Client\HttpClientException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RequestController extends Controller
{

    protected $api_url;

    public function __construct()
    {
        $this->api_url = env('API_URL');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $requests = Http::get($this->api_url."/ticketing/verification/bookingfalse")->json()['data'];

        return view('admin.verifikasi-pembayaran.index')->with(compact('requests'));
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
        $request = Http::get($this->api_url."/ticketing/$id")['data'];
        return view('admin.verifikasi-pembayaran.show')->with(compact('request'));
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


    }

    public function verifikasi($id, Request $request){
        try {
            if($request->tipe == 'accept')
            {
                Http::get($this->api_url."/ticketing/verification/$id/accept");

                return redirect()->to(route('admin.request.index'))->with(['success' => 'Verifikasi Berhasil']);

            }else{
                Http::get($this->api_url."/ticketing/verification/$id/reject");

                return redirect()->to(route('admin.request.index'))->with(['success' => 'Verifikasi ditolak']);
            }
        } catch (HttpClientException $e) {
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
    // public function destroy($id)
    // {
    //     $category = ModelsRequest::findOrFail($id);

    //     try {
    //         $category->delete();

    //         return response()->json([
    //             'status' => 'success'
    //         ]);
    //     } catch (QueryException $e) {
    //         return response()->json([
    //             'status' => 'error',
    //             'message' => $e
    //         ]);
    //     }
    // }
}
