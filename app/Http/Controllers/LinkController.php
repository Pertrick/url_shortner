<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUrlRequest;
use Illuminate\Support\Str;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('index');
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
    public function store(StoreUrlRequest $request)
    {
        $validated = $request->validated();
        $link = Link::where('url', $request->url)->first();

        if($link){
            return redirect()->route('url.index')->withInput()->with('hash_link', $link->hash);
        }else{
            do{
                $newHash = Str::random(6);
            }while(Link::where('hash', $newHash)->count() > 0);

            Link::create([
                'url' => $request->url,
                'hash' => $newHash
            ]);

            return redirect()->route('url.index')->withInput()->with('hash_link', $newHash);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function show($hash)
    {
            $link = Link:: where('hash', $hash)->first();
            if($link){
                return redirect()->away($link->url); 
            }else{
                return redirect()->route('url.index')->with('messgae', 'invalid link');
            }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function edit(Link $link)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Link $link)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function destroy(Link $link)
    {
        //
    }
}
