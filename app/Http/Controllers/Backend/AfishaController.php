<?php

namespace App\Http\Controllers\Backend;

use App\Repositories\Backend\Afisha;
use App\Repositories\Backend\Image;
use Illuminate\Http\Request;

class AfishaController extends \App\Http\Controllers\Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $afishas = Afisha::all();
        $data = [
            'afishas' => $afishas
        ];
        return view('afisha.index', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Afisha $afisha)
    {
        $imagesInitialPreviewData = $afisha->getImagesInitialPreviewData();
        $data = [
            'afisha' => $afisha,
            'imagesInitialPreviewData' => $imagesInitialPreviewData,
        ];
        return view('afisha.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Afisha $afisha)
    {
        $afisha->update($request->all());
        return redirect()->route('afisha.index', ['message' => 'Афиша сохранена!']);
    }

    public function destroyImage(Request $request)
    {
        if ($request->has('key')) {
            Image::destroy($request->key);
            return response()->json();
        }
        return response()->json(['error' => 'Отсутствует ID изображения']);
    }

    public function uploadImages(Request $request, Afisha $afisha)
    {
        if ($request->hasFile('images')) {
            $afisha->saveImages($request->file('images'));
        }

        return response()->json();
    }
}
