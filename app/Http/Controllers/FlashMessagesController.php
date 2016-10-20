<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\FlashMessage;

class FlashMessagesController extends Controller
{
    public function show(Request $request)
    {
        if ($request->input('noflash') != '1') {
            $this->flash()->success('Hello LaraHel', 'Flashy Title');
        }
        return view('flashes.show');
    }

    private function flash()
    {
        return new FlashMessage();
    }
}
