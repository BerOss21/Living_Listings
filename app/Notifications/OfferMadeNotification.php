<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OfferMadeNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(private $offer)
    {
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database','mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('Offer made by '.$this->offer->bidder->name.'for listing #'.$this->offer->listing_id)
                    ->action('ALl offers', route('listings.offers.index',$this->offer->listing_id))
                    ->line('Thank you for using our application!');
    }

     /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toDatabase(object $notifiable): array
    {
        return [
            'listing_id'=>$this->offer->listing_id,
            'offer_id'=>$this->offer->id,
            'bidder'=>['id'=>$this->offer->bidder_id,'name'=>$this->offer->bidder->name],
            'amount'=>$this->offer->amount,
            'created_at'=>Carbon::parse($this->offer->created_at)->format('d-m-Y')
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
