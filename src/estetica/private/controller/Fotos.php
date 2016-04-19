<?php

/**
 * Created by PhpStorm.
 * User: MICRO-05
 * Date: 19/04/2016
 * Time: 18:18
 */
class Fotos{
    public function init (){
//        dd("Estou no fotos");
        $picasa = ARMPicasaAPI::getPublicAlbumByUserAlbum('117746404603506105155','5856341556755941377');
//        dd($picasa);
        return $picasa;
    }
}