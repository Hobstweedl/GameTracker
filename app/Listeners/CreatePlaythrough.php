<?php

namespace App\Listeners;

use App\Events\CreatePlaythrough;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreatePlaythrough
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CreatePlaythrough  $event
     * @return void
     */
    public function handle(CreatePlaythrough $event)
    {
        //
    }
}
