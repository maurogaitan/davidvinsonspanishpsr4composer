<?php

namespace App;

class MgDevCpt
{

    public function mgdev()
    {
        $labels = [
            'name' => __('Plurar', 'mgdev-textdomain'),
            'singular_name' => __('Singular', 'mgdev-textdomain'),
            'add_new' => __('Agregar nuevo', 'mgdev-textdomain'),
            'add_new_item' => __('Agregar nuevo item', 'mgdev-textdomain'),
            'edit_item' => __('Editar items', 'mgdev-textdomain'),
            'view_item' => __('Ver items', 'mgdev-textdomain'),
            'featured_image' => __('Imagen de portada items', 'mgdev-textdomain'),
            'set_featured_image' => __('Definir portada item', 'mgdev-textdomain'),
            'remove_featured_image' => __('Remover imagen del item', 'mgdev-textdomain'),
            'use_featured_image' => __('Usar como imagen de item', 'mgdev-textdomain'),
        ];

        $args = [
            'labels' => $labels,
            'public' => true,
            'has_archive' => true,
            'supports' => ['title', 'editor', 'thumbnail'],
            'capability_type' => 'post',
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => false,
            'show_in_admin_bar' => false,
            'rewrite' => ['slug' => 'items'],
        ];

        register_post_type('mgdev_post_type', $args);

        flush_rewrite_rules();
    }
}
