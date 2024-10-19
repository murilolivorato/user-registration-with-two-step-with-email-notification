<?php

namespace App\Listeners;

use App\Events\EmailSent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use Modules\Contracts\Mail\EmailContratoConfirmacao;

class SendEmailListener implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Handle the event.
     *
     * @param EmailSent $event
     * @return void
     */
    public function handle(EmailSent $event)
    {
        $this->notify(new EmailContratoConfirmacao($contrato));
        /*Mail::raw('This is a test email.', function ($message) use ($event) {
            $message->to($event->email)
                ->subject('Test Email');
        });*/
    }
}
