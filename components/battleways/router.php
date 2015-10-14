<?php
	//правила роутера

    function routes_battleways(){
        		$routes[] = array(
                            '_uri'  => '/^battleways\/page([0-9]+).html$/i',
                            'do'    => 'view',
                            1       => 'page'
                         );

                $routes[] = array(
                            '_uri'  => '/^battleways\/view_battleway([0-9]+).html$/i',
                            'do'    => 'view_battleway',
                            1       => 'id'
                         );
                $routes[] = array(
                            '_uri'  => '/^battleways\/del([0-9]+).html$/i',
                            'do'    => 'del',
                            1       => 'id'
                         );
						 
                $routes[] = array(
                            '_uri'  => '/^battleways\/edit_battleway([0-9]+).html$/i',
                            'do'    => 'edit_battleway',
                            1       => 'id'
                         );
						 
                $routes[] = array(
                            '_uri'  => '/^battleways\/add.html$/i',
                            'do'    => 'add_battleway'
                         );
				
			
                $routes[] = array(
                            '_uri'  => '/^battleways\/(.+)\/(.+)$/i',
                            'do'    => 'view',
                            1       => 'tag',
                            2       => 'color'
                         );
                $routes[] = array(
                            '_uri'  => '/^battleways\/(.+)$/i',
                            'do'    => 'view',
                            1       => 'tag'
                         );
        return $routes;

    }

?>
