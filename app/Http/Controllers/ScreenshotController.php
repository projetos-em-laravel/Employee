<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ScreenshotRequest;
use Validator;
use File;
use App\Models\Screenshot;

class ScreenshotController extends Controller
{
    public function store(ScreenshotRequest $request, $game_id) {


        $data = $request->all();
        $data['game_id'] = $game_id;

        if ($request->hasFile('screenshot') && $request->file('screenshot')->isValid()) {

            // Define um aleatório para o arquivo baseado no timestamps atual + Recupera a extensão do arquivo
            $nameFile = uniqid(date('HisYmd')).$request->screenshot->extension();

            $data['screenshot'] = $nameFile;

            // Faz o upload:
            $upload = $request->screenshot->storeAs('public/games/screenshots', $nameFile);

            // Verifica se NÃO deu certo o upload (Redireciona de volta)
            if ( !$upload )
                return redirect()
                            ->back()
                            ->with('error', 'Falha ao fazer upload')
                            ->withInput();

        }


        Screenshot::create($data);
        toastr()->success('Screenshot card  success create');
        return redirect()->back();
    }

    public function update(ScreenshotRequest $request, $id) {

        $data = $request->all();

        if ($request->hasFile('screenshot') && $request->file('screenshot')->isValid()) {

            // Define um aleatório para o arquivo baseado no timestamps atual + Recupera a extensão do arquivo
            $nameFile = uniqid(date('HisYmd')).$request->screenshot->extension();

            $data['screenshot'] = $nameFile;

            // Faz o upload:
            $upload = $request->screenshot->storeAs('public/games/screenshots', $nameFile);

            // Verifica se NÃO deu certo o upload (Redireciona de volta)
            if ( !$upload )
                return redirect()
                            ->back()
                            ->with('error', 'Falha ao fazer upload')
                            ->withInput();

        }

        $screenshot = Screenshot::find($id);
        $screenshot->update($data);
        toastr()->success('Screenshot card  success update');
        return redirect()->back();
    }

    public function destroy($id) {
        $screenshot = Screenshot::find($id);
        File::delete('storage/screenshots/'.$screenshot->image);
        $screenshot->delete();

        toastr()->success('Screenshot success delete');
        return redirect()->back();
    }
}
