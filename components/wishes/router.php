<?php

    function routes_wishes(){
				 

        $routes[] = array(
                            '_uri'  => '/^wishes\/wish_item([0-9]+).html$/i',
                            'do'    => 'wish_item',
                            1       => 'id'
                         );
						 
        $routes[] = array(
                            '_uri'  => '/^wishes\/add([0-9]+).html$/i',
                            'do'    => 'add_item',
                            1       => 'id'
                         );	
        $routes[] = array(
                            '_uri'  => '/^wishes\/type([0-9]+).html$/i',
                            'do'    => 'type',
                            1       => 'id'
                         );	
        $routes[] = array(
                            '_uri'  => '/^wishes\/delete([0-9]+).html$/i',
                            'do'    => 'delete',
                            1       => 'id'
                         );
         $routes[] = array(
                            '_uri'  => '/^wishes\/type([0-9]+)\-page([0-9]+).html$/i',
                            'do'    => 'type',
                            1       => 'id',
                            2       	=> 'page'
                         );	                        
       $routes[] = array(
                            '_uri'  => '/^wishes\/all.html$/i',
                            'do'    => 'type'
                         );	
       $routes[] = array(
                            '_uri'  	=> '/^wishes\/all\-page([0-9]+).html$/i',
                            'do'    	=> 'type',
                            1       	=> 'page'
                         );   
	   $routes[] = array(
                            '_uri'  => '/^wishes\/load.html$/i',
                            'do'    => 'load'
                         );						 
        return $routes;

    }

?>
