<?php

namespace App\Http\Controllers\Notification;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        $notifications=auth()->user()->notifications;

        return inertia('Realtor/Notification/Index',compact('notifications'));
    }
}
