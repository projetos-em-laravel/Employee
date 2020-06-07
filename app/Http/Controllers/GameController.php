<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Image;
use File;
use App\Models\Game;
use App\Http\Requests\GameRequest;
use Validator;

class GameController extends Controller
{
    public function index()
    {
        $games = Auth::user()->game->all();
        return view('game.index', compact('games'));
    }

    public function create()
    {
        return view('game.create');
    }

    public function store(GameRequest $request)
    {

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
        toastr()->success('Game success create');
        return redirect()->route('game.index');
    }


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

    public function update(GameRequest $request, $id)
    {
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
        toastr()->success('Game success update');
        return redirect()->route('game.index');
    }

    public function destroy($id)
    {
        $game = Game::find($id);
        File::delete('storage/games/'.$game->image);
        File::delete('storage/games/thumbnail/'.$game->image);
        $game->delete();

        toastr()->success('Game success delete');
        return redirect()->back();
    }
}
