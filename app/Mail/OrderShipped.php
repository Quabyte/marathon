<?php

namespace App\Mail;

use App\User;
use App\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $orderRef)
    {
        $this->order = Order::where('reference', '=', $orderRef)->firstOrFail();

        $this->user = User::find($this->order->user_id);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@detur.com')
                    ->view('emails.order');
    }
}
