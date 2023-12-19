<?php

namespace App\Http\Controllers\Notification;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class MarkAsReadController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request,$id)
    {
        $notification=auth()->user()->notifications()->whereId($id)->firstOrFail();

        $notification->markAsRead();

        return redirect()->back();
    }
}
