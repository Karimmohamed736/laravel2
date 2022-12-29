<?php
//Listener 
namespace App\Listeners;

use App\Events\VideoViewer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class IncreaseView
{
    public function __construct() 
    {
        //
    }

    public function handle(VideoViewer $event) //call the event class 
    {
        $this-> updateViewer($event-> video);  //call the function then parameter (class event of -> the database var in event)
    }

    //update row in DB
    function updateViewer($v){
        $v -> viewers = $v -> viewers +1 ; //v=v+1 to increase by 1 for every visitor and v in the first is 1 
        $v -> save(); //save and go to crudcontroller to call the listener and event

    }
}
