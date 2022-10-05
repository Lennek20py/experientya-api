<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KillerQuestion;
use Illuminate\Support\Facades\Redirect;

class KillerQuestionController extends Controller
{
    public function update(Request $request, $id)
    {
        $killer = KillerQuestion::find($id);
        $killer->question = $request->question;
        $killer->save();

        return redirect()->route('offer.edit', ['id' => $request->offer_id ])->with('message','Killer Question actualizada exitosamente');
    }

    public function destroy(KillerQuestion $killer)
    {
        $killer->delete();

        return redirect()->route('offer.edit', ['id' => $killer->offer_id])->with('message','Killer Questions eliminada exitosamente');
    }
}
