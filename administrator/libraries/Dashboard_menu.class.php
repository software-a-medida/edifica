<?php
defined('_EXEC') or die;

class Dashboard_menu
{
    static public function main_menu() : array
    {
        $menu = [];

        // $menu[] = [
        //     'name' => 'General',
        //     'url' => 'index.php',
        //     'icon' => 'dripicons-home'
        // ];

        if ( in_array('{projects}', Session::get_value('session_permissions')) )
        {
            $menu[] = [
                'name' => 'Proyectos',
                'url' => 'index.php?c=projects',
                'icon' => 'fa fa-building-o'
            ];
        }

        if ( in_array('{blog_read}', Session::get_value('session_permissions')) )
        {
            $menu[] = [
                'name' => 'Blog',
                'url' => 'index.php?c=blog',
                'icon' => 'dripicons-blog'
            ];
        }

        $menu[] = [
            'name' => 'Ver sitio web',
            'url' => '../',
            "target" => "_blank",
            'icon' => 'fa fa-external-link'
        ];

        return $menu;
    }
}
