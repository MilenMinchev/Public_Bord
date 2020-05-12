<?php

namespace models;

class OpinionModel{
    
    public static function create($topickId,$opinionContent,$opinionAutor){
        
        //$opinionContent = $_POST['opinion_content'];
        //$opinionAutor   = $_POST['opinion_author'];
        
        $query = "InSERT INTO public_board.opinions(topick_id, content, author) VALUES($topickId, '$opinionContent', '$opinionAutor')";
        \db\Database::getInstance()->query($query);
        
        return\db\Database::getInstance()->lastInsertedId();
    }
    
    public static function read(){
        
    }
    public static function update(){
        
    }
    public static function delete(){
        
    }
}

