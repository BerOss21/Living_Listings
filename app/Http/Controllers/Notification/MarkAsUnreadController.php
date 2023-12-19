<?php

namespace App\Http\Controllers\Notification;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class MarkAsUnreadController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request,$id)
    {
        $notification=auth()->user()->notifications()->whereId($id)->firstOrFail();

        $notification->read_at=null;
        $notification->save();

        return redirect()->back();
    }
}
