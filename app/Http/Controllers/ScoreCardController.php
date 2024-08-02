<?php

namespace App\Http\Controllers;
use App\Models\ScoreCard;
use Illuminate\Http\Request;

class ScoreCardController extends Controller
{
    public function update(Request $request, $id)
    {
        $request->validate([
            'number_of_graduates' => 'required|integer',
            'number_of_employed' => 'required|integer',
        ]);

        $scoreCard = ScoreCard::findOrFail($id);
        $scoreCard->number_of_graduates = $request->number_of_graduates;
        $scoreCard->number_of_employed = $request->number_of_employed;
        $scoreCard->employment_rate = ($request->number_of_employed / $request->number_of_graduates) * 100;

        $scoreCard->save();

        return redirect()->back()->with('success', 'Score card updated successfully');
    }
}
