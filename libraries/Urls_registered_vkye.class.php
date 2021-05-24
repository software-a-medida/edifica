<?php
/**
 *
 * @package Valkyrie.Platform.Libraries
 *
 * @since 2.0.0
 * @version 1.0.0
 * @license You can see LICENSE.txt
 *
 * @author David Miguel Gómez Macías < davidgomezmacias@gmail.com >
 * @copyright Copyright (C) CodeMonkey - Valkyrie Platform. All Rights Reserved.
 */

defined('_EXEC') or die;

class Urls_registered_vkye
{
    static public $home_page_default = '/';

    static public function urls()
    {
        return [
            '/' => [
                'controller' => 'Home',
                'method' => 'index'
            ],
            '/desarrollos' => [
                'controller' => 'Developments',
                'method' => 'index'
            ],
            '/desarrollo/%param%' => [
                'controller' => 'Developments',
                'method' => 'view'
            ],
            '/inversion' => [
                'controller' => 'Investors',
                'method' => 'index'
            ],
            '/construccion' => [
                'controller' => 'Building',
                'method' => 'index'
            ],
            '/acerca' => [
                'controller' => 'About',
                'method' => 'index'
            ],
            '/contacto' => [
                'controller' => 'Contact',
                'method' => 'index'
            ],
            '/blog' => [
                'controller' => 'Blog',
                'method' => 'list'
            ],
            '/articulo/%param%' => [
                'controller' => 'Blog',
                'method' => 'view'
            ],

            '/iniciar-sesion' => [
                'controller' => 'Pages',
                'method' => 'login'
            ],
            '/registrarme' => [
                'controller' => 'Pages',
                'method' => 'register'
            ],
        ];
    }
}
