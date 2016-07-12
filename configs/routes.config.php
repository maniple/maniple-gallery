<?php return array(

    'gallery.images' => array(
        'route' => 'gallery/gallery-images/:dir_id',
        'defaults' => array(
            'module'     => 'maniple-gallery',
            'controller' => 'gallery',
            'action'     => 'images',
        ),
    ),

);
