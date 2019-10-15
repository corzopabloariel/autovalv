<?php
/**
 * 
 */
define( "MENU" ,
[
    [
        "id"        => "home",
        "nombre"    => "Home",
        "icono"     => "<i class='nav-icon fas fa-home'></i>",
        "submenu"   => [
            [
                "nombre"    => "Contenido",
                "icono"     => "<i class='nav-icon fas fa-file-contract'></i>",
                "url"       => route( 'contenido.edit' , [ 'seccion' => 'home' ] )
            ],[
                "nombre"    => "Slider",
                "icono"     => '<i class="far fa-images"></i>',
                "url"       => route('slider.index', ['seccion' => 'home'])
            ]
        ],
        "ok"        => 1
    ],
    [
        "id"        => "empresa",
        "nombre"    => "La Empresa",
        "icono"     => "<i class='nav-icon fas fa-industry'></i>",
        "submenu"   => [
            [
                "nombre"    => "Contenido",
                "icono"     => "<i class='nav-icon fas fa-file-contract'></i>",
                "url"       => route( 'contenido.edit' , [ 'seccion' => 'empresa' ] )
            ],[
                "nombre"    => "Slider",
                "icono"     => '<i class="far fa-images"></i>',
                "url"       => route('slider.index', ['seccion' => 'empresa'])
            ]
        ],
        "ok"        => 1
    ],
    [
        "id"        => "productos",
        "nombre"    => "Productos",
        "icono"     => "<i class='nav-icon fas fa-industry'></i>",
        "submenu"   => [
            [
                "nombre"    => "Familias",
                "icono"     => "<i class='nav-icon fas fa-file-contract'></i>",
                "url"       => route('familias.index'),
            ],[
                "nombre"    => "Producto",
                "icono"     => '<i class="fas fa-project-diagram"></i>',
                "url"       => route('productos.index')
            ]
        ],
        //"ok"        => 1
    ],
    [
        "id"        => "documentacion",
        "nombre"    => "Documentación",
        "icono"     => '<i class="fas fa-file-upload"></i>',
        "url"       => route( 'documentacion.index' ),
        "ok"        => 1
    ],
    [
        "id"        => "cotizacion",
        "nombre"    => "Cotización (Texto)",
        "icono"     => '<i class="fas fa-vote-yea"></i>',
        "url"       => route( 'contenido.edit' , [ 'seccion' => 'cotizacion' ] ),
        "ok"        => 1
    ],
]
);