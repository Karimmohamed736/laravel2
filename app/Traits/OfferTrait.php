<?php
namespace App\Traits;



// trait to call any functions in other files to make easy in coding when there were many calling
Trait OfferTrait
{
    function SaveImage($photo,$folder){
        // save photo in folder
        $file_extension = $photo-> getClientOriginalExtension(); 
        $file_name = time(). '.' . $file_extension; //add time to photo to not copy it
        $path =$folder;
        $photo ->move($path, $file_name);  //move to folder
        return $file_name;
    }
}


?>