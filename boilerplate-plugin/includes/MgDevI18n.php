<?php

/**
 * Define la funcionalidad de internacionalización
 *
 * Carga y define los archivos de internacionalización de este plugin para que esté listo para su traducción.
 *
 * @link       https://maurogaitandev.com
 * @since      1.0.0
 *
 * @package     MgDev
 * @package     MgDev/includes
 */

/**
 * Ésta clase define todo lo necesario durante la activación del plugin
 *
 * @since      1.0.0
 * @package     MgDev
 * @package     MgDev/includes
 * @author    Mauro Gaitan Souvaje <maurogaitansouvaje@gmail.com>
 */

namespace App;

class MgDevI18n
{

    /**
     * Carga el dominio de texto (textdomain) del plugin para la traducción.
     *
     * @since    1.0.0
     * @access public static
     */
    public function load_plugin_textdomain()
    {

        load_plugin_textdomain(
            'mgdev-textdomain',
            false,
            MGDEV_PLUGIN_DIR_PATH . 'languages'
        );
    }
}
