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
 * Plugin Name:         Boilerplate Plugin
 * Plugin URI:          http://miprimerplugin.com
 * Description:         Descripción corta de nuestro plugin
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
    require_once MGDEV_PLUGIN_DIR_PATH . 'includes/class-mgdev-activator.php';
    MGDEV_Activator::activate();
}

/**
 * Código que se ejecuta en la desactivación del plugin
 */
function deactivate_mgdev_blank()
{
    require_once MGDEV_PLUGIN_DIR_PATH . 'includes/class-mgdev-deactivator.php';
    MGDEV_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_mgdev_blank');
register_deactivation_hook(__FILE__, 'deactivate_mgdev_blank');

require_once MGDEV_PLUGIN_DIR_PATH . 'includes/class-mgdev-master.php';

function run_mgdev_master()
{
    $mgdev_master = new MGDEV_Master;
    $mgdev_master->run();
}

run_mgdev_master();
