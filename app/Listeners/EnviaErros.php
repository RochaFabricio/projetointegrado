<?php


namespace App\Listeners;

use App\Erro;
use App\Events\Erros;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;

class EnviaErros
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
     * @param  Erros  $event
     * @return void
     */
    public function handle(Erros $event)
    {
        $log = new Erro();
        $log->user_id = Auth::user()->id;
        $log->view = $event->erros->view;
        $log->descricao = $event->erros->descricao;
        $log->save();
    }
}
