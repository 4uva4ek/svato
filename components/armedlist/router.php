<?php
 

    function routes_armedlist(){

        $routes[] = array(
                            '_uri'  => '/^armedlist\/([0-9]+)$/i',
                            1    => 'id'
                         );

        $routes[] = array(
                            '_uri'  => '/^armedlist\/([0-9]+)\-([0-9]+)$/i',
                            1    => 'id',
                            2    => 'page'
                         );

        $routes[] = array(
                            '_uri'  => '/^armedlist\/quest([0-9]+).html$/i',
                            'do'    => 'read',
                            1       => 'id'
                         );
						 
        $routes[] = array(
                            '_uri'  => '/^armedlist\/delquest([0-9]+).html$/i',
                            'do'    => 'delquest',
                            1       => 'quest_id'
                         );

        $routes[] = array(
                            '_uri'  => '/^armedlist\/sendquest.html$/i',
                            'do'    => 'sendquest'
                         );
        $routes[] = array(
                            '_uri'  => '/^armedlist\/sendquest([0-9]+).html$/i',
                            'do'    => 'sendquest',
                            1       => 'category_id'
                         );

        return $routes;

    }

?>
