<?php

namespace App\Http\Controllers;

use App\Action\CreateScreeningData;
use App\Http\Requests\CreateScreeningFormRequest;
use Illuminate\Http\Request;

class ScreeningController extends Controller
{
    public function create()
    {
        return view('screening.create');
    }

    public function store(CreateScreeningFormRequest $request, CreateScreeningData $action)
    {
        $screening = $action->execute($request->all());

        dd($screening);
    }
}
