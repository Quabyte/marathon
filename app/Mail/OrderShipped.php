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
    public function __construct(Order $order)
    {
        $this->order = $order;

        $user = $this->order->user_id;

        $this->user = User::findOrFail($user);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@detur.com')
                    ->view('emails.order')
                    ->replyTo('info@detur.com')
                    ->subject('38. Istanbul Marathon Package Purchase');
    }
}
