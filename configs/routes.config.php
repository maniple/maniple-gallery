<?php return array(

    'gallery.images' => array(
        'route' => 'gallery/gallery-images/:dir_id/:offset/:limit',
        'defaults' => array(
            'module'     => 'maniple-gallery',
            'controller' => 'gallery',
            'action'     => 'images',
            'offset'     => null,
            'limit'      => null,
        ),
    ),

);
