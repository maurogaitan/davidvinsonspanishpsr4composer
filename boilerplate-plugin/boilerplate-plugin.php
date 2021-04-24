<?php

/**
 * Archivo del plugin 
 * Este archivo es leído por WordPress para generar la información del plugin
 * en el área de administración del complemento. Este archivo también incluye 
 * todas las dependencias utilizadas por el complemento, registra las funciones 
 * de activación y desactivación y define una función que inicia el complemento.
 *
 * @link                http://misitioweb.com
 * @since               1.0.0
 * @package             MgDev
 *
 * @wordpress-plugin
 * Plugin Name:         Boilerplate Plugin Dev
 * Plugin URI:          http://miprimerplugin.com
 * Description:         Descripción corta de nuestro plugin para vos
 * Version:             1.0.0
 * Author:              Gilbert Rodríguez
 * Author URI:          http://miurlpersonal.com
 * License:             GPL2
 * License URI:         https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:         mgdev-textdomain
 * Domain Path:         /languages
 */

if (!defined('WPINC')) {
    die;
}
require 'vendor/autoload.php';

use App\MgDevDeactivator;
use App\MgDevActivator;
use App\MgDevMaster;

global $wpdb;
define('MGDEV_REALPATH_BASENAME_PLUGIN', dirname(plugin_basename(__FILE__)) . '/');
define('MGDEV_PLUGIN_DIR_PATH', plugin_dir_path(__FILE__));
define('MGDEV_PLUGIN_DIR_URL', plugin_dir_url(__FILE__));
define('MGDEV_TABLE', "{$wpdb->prefix}mgdev_data");

/**
 * Código que se ejecuta en la activación del plugin
 */
function activate_mgdev_blank()
{

    MgDevActivator::activate();
}

/**
 * Código que se ejecuta en la desactivación del plugin
 */
function deactivate_mgdev_blank()
{

    MgDevDeactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_mgdev_blank');
register_deactivation_hook(__FILE__, 'deactivate_mgdev_blank');



function run_mgdev_master()
{
    $mgdev_master = new MgDevMaster();
    $mgdev_master->run();
}

run_mgdev_master();
