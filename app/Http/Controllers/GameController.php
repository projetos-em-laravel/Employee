<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Image;
use File;
use App\Models\Game;
use Illuminate\Http\Request;
use Validator;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Auth::user()->game->all();
        return view('game.index', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('game.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'          => 'required|min:3|max:100',
            'description'   => 'required|min:10|max:191',
            'image'         => 'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->all();
        $data['user_id'] = Auth::id();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            // Define um aleatório para o arquivo baseado no timestamps atual + Recupera a extensão do arquivo
            $nameFile = uniqid(date('HisYmd')).$request->image->extension();

            $data['image'] = $nameFile;

            // Faz o upload:
            $upload = $request->image->storeAs('public/games', $nameFile);
            // Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao


            $request->image->storeAs('public/games/thumbnail', $nameFile);

            //create small thumbnail
            $thumbnailpath = public_path('storage/games/thumbnail/'.$nameFile);
            $this->createThumbnail($thumbnailpath, 150, 93);

            // Verifica se NÃO deu certo o upload (Redireciona de volta)
            if ( !$upload )
                return redirect()
                            ->back()
                            ->with('error', 'Falha ao fazer upload')
                            ->withInput();

        }


        Game::create($data);
        return redirect()->route('game.index')->with('success', 'Game success create');
    }

    /**
    * Create a thumbnail of specified size
    *
    * @param string $path path of thumbnail
    * @param int $width
    * @param int $height
    */
    public function createThumbnail($path, $width, $height)
    {
        $img = Image::make($path)->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($path);
    }

    public function show($id)
    {
        $game = Game::find($id);
        return view('game.show', compact('game'));
    }


    public function edit($id)
    {
        $game = Game::find($id);
        return view('game.edit', compact('game'));
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


        $validator = Validator::make($request->all(), [
            'name'          => 'required|min:3|max:100',
            'description'   => 'required|min:10|max:191',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $game = Game::find($id);

        $data = $request->all();
        $data['user_id'] = Auth::id();
        $data['image'] = $game->image;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            // Define um aleatório para o arquivo baseado no timestamps atual + Recupera a extensão do arquivo
            $nameFile = uniqid(date('HisYmd')).$request->image->extension();

            $data['image'] = $nameFile;

            // Faz o upload:
            $upload = $request->image->storeAs('public/games', $nameFile);
            // Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao


            $request->image->storeAs('public/games/thumbnail', $nameFile);

            //create small thumbnail
            $thumbnailpath = public_path('storage/games/thumbnail/'.$nameFile);
            $this->createThumbnail($thumbnailpath, 150, 93);

            // Verifica se NÃO deu certo o upload (Redireciona de volta)
            if ( !$upload )
                return redirect()
                            ->back()
                            ->with('error', 'Falha ao fazer upload')
                            ->withInput();

        }

        $game->update($data);
        return redirect()->route('game.index')->with('success', 'Update success');
    }

    public function destroy($id)
    {
        $game = Game::find($id);
        File::delete('storage/games/'.$game->image);
        File::delete('storage/games/thumbnail/'.$game->image);
        $game->delete();

        return redirect()->back()->with('success', 'Game success delete!');
    }
}
