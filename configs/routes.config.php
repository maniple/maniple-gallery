<?php return array(

    'gallery.images' => array(
        'route' => 'gallery/gallery-images/:dir_id',
        'defaults' => array(
            'module'     => 'maniple-galery',
            'controller' => 'gallery',
            'action'     => 'gallery-images',
        ),
    ),

);
