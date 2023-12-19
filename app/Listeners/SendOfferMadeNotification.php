<?php

namespace App\Listeners;

use App\Events\OfferMadeEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\OfferMadeNotification;

class SendOfferMadeNotification implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(OfferMadeEvent $event): void
    {
        $offer=$event->listing->offers()->whereBidderId($event->bidder_id)->first();

        $event->listing->user->notify(new OfferMadeNotification($offer));
    }
}
