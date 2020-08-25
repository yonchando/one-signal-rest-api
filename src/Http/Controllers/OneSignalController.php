<?php


namespace Chando\OneSignalRestApi\Http\Controllers;


use App\Http\Controllers\Controller;
use Chando\OneSignalRestApi\Models\PushPlayerId;
use Illuminate\Http\Request;

class OneSignalController extends Controller
{
    public function store(Request $request)
    {
        $playerId = new PushPlayerId();
        $model_id = config('onesignal.model_id');

        $playerId->$model_id = $request->get('model_id');
        $playerId->player_id = $request->get('player_id');
        $playerId->save();

        session()->flash('message', __("Success"));
        return redirect()->back();
    }
}