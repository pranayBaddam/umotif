<?php

namespace App\Http\Controllers;

use App\Action\CreateScreeningData;
use App\Enum\HeadacheFrequencyType;
use App\Http\Requests\CreateScreeningFormRequest;
use App\Models\Screening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class ScreeningController extends Controller
{
    public function index(Request $request)
    {
        $query = Screening::query();
        $query->orderByDesc('updated_at');
        $screenings = $query->paginate();

        return \view('screening.index', [
            'screenings' => $screenings
        ]);
    }
    public function show($id): View
    {
        $screening = Screening::findOrFail($id);
        return view('screening.view', [
            'screening' => $screening,
        ]);
    }

    public function create()
    {
        return \view('screening.create');
    }

    public function store(CreateScreeningFormRequest $request, CreateScreeningData $action)
    {
        $screening = $action->execute($request->all());

        Session::flash('status', "Participant {$screening->first_name} is assigned to {$screening->assigned_to->label()}.");
        return to_route('screenings.show', ['id' => $screening->id ]);
    }
}
