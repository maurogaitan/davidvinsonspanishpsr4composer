<?php

/**
 * Se activa en la activación del plugin
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
class MGDEV_Activator
{

	/**
	 * Método estático que se ejecuta al activar el plugin
	 *
	 * Creación de la tabla {$wpdb->prefix}mgdev_data
	 * para guardar toda la información necesaria
	 *
	 * @since 1.0.0
	 * @access public static
	 */
	public static function activate()
	{
	}
}
