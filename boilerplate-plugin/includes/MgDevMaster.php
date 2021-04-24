<?php

/**
 * El archivo que define la clase del cerebro principal del plugin
 *
 * Una definición de clase que incluye atributos y funciones que se 
 * utilizan tanto del lado del público como del área de administración.
 * 
 * @link       https://maurogaitandev.com
 * @since      1.0.0
 *
 * @package     MgDev
 * @package     MgDev/includes
 */

/**
 * También mantiene el identificador único de este complemento,
 * así como la versión actual del plugin.
 *
 * @since      1.0.0
 * @package     MgDev
 * @package     MgDev/includes
 * @author    Mauro Gaitan Souvaje <maurogaitansouvaje@gmail.com>
 * 
 * @property object $loader
 * @property string $plugin_name
 * @property string $version
 */

namespace App;



use App\MgDevLoader;
use App\MgDevI18n;
use App\MgDevAdmin;
use App\MgDevPublic;

class MgDevMaster
{

	/**
	 * El loader que es responsable de mantener y registrar
	 * todos los ganchos (hooks) que alimentan el plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      MgDevLoader   $loader  Mantiene y registra todos los ganchos ( Hooks ) del plugin
	 */
	protected $loader;

	/**
	 * El identificador único de éste plugin
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name  El nombre o identificador único de éste plugin
	 */
	protected $plugin_name;

	/**
	 * Versión actual del plugin
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version  La versión actual del plugin
	 */
	protected $version;

	/**
	 * Constructor
	 * 
	 * Defina la funcionalidad principal del plugin.
	 *
	 * Establece el nombre y la versión del plugin que se puede utilizar en todo el plugin.
	 * Cargar las dependencias, carga de instancias, definir la configuración regional (idioma)
	 * Establecer los ganchos para el área de administración y
	 * el lado público del sitio.
	 *
	 * @since    1.0.0
	 */
	public function __construct()
	{

		$this->plugin_name = 'mgdev_blank';
		$this->version = '1.0.0';

		$this->cargar_dependencias();
		$this->cargar_instancias();
		$this->set_idiomas();
		$this->definir_admin_hooks();
		$this->definir_public_hooks();
	}

	/**
	 * Cargue las dependencias necesarias para este plugin.
	 *
	 * Incluya los siguientes archivos que componen el plugin:
	 *
	 * - MGDEV_Cargador. Itera los ganchos del plugin.
	 * - MgDevI18n. Define la funcionalidad de la internacionalización
	 * - MgDevAdmin. Define todos los ganchos del área de administración.
	 * - MgDevPublic. Define todos los ganchos del del cliente/público.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function cargar_dependencias()
	{


		//require_once MGDEV_PLUGIN_DIR_PATH . 'includes/MgDevLoader.php';



		//require_once MGDEV_PLUGIN_DIR_PATH . 'admin/MgDevAdmin.php';

		/**
		 * La clase responsable de definir todas las acciones en el
		 * área del lado del cliente/público
		 */
		//require_once MGDEV_PLUGIN_DIR_PATH . 'public/MgDevPublic.php';
	}

	/**
	 * Defina la configuración regional de este plugin para la internacionalización.
	 *
	 * Utiliza la clase MgDevI18n para establecer el dominio y registrar el gancho
	 * con WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_idiomas()
	{
		/**
		 * La clase responsable de definir la funcionalidad de la
		 * internacionalización del plugin
		 */
		$mgdev_i18n = new MgDevI18n();
		$this->loader->add_action('plugins_loaded', $mgdev_i18n, 'load_plugin_textdomain');
	}

	/**
	 * Cargar todas las instancias necesarias para el uso de los 
	 * archivos de las clases agregadas
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function cargar_instancias()
	{
		/**
		 * MgDevLoader La clase responsable de iterar las acciones y filtros del núcleo del plugin.
		 */
		// Cree una instancia del loader que se utilizará para registrar los ganchos con WordPress.
		$this->loader     = new MgDevLoader;
		$this->mgdev_admin     = new MgDevAdmin($this->get_plugin_name(), $this->get_version());
		$this->mgdev_public    = new MgDevPublic($this->get_plugin_name(), $this->get_version());
	}

	/**
	 * Registrar todos los ganchos relacionados con la funcionalidad del área de administración
	 * Del plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function definir_admin_hooks()
	{

		$this->loader->add_action('admin_enqueue_scripts', $this->mgdev_admin, 'enqueue_styles');
		$this->loader->add_action('admin_enqueue_scripts', $this->mgdev_admin, 'enqueue_scripts');
	}

	/**
	 * Registrar todos los ganchos relacionados con la funcionalidad del área de administración
	 * Del plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function definir_public_hooks()
	{

		$this->loader->add_action('wp_enqueue_scripts', $this->mgdev_public, 'enqueue_styles');
		$this->loader->add_action('wp_enqueue_scripts', $this->mgdev_public, 'enqueue_scripts');
	}

	/**
	 * Ejecuta el loader para ejecutar todos los ganchos con WordPress.
	 *
	 * @since    1.0.0
	 * @access   public
	 */
	public function run()
	{
		$this->loader->run();
	}

	/**
	 * El nombre del plugin utilizado para identificarlo de forma exclusiva en el contexto de
	 * WordPress y para definir la funcionalidad de internacionalización.
	 *
	 * @since     1.0.0
	 * @access    public
	 * @return    string    El nombre del plugin.
	 */
	public function get_plugin_name()
	{
		return $this->plugin_name;
	}

	/**
	 * La referencia a la clase que itera los ganchos con el plugin.
	 *
	 * @since     1.0.0
	 * @access    public
	 * @return    MgDevLoader   Itera los ganchos del plugin.
	 */
	public function get_loader()
	{
		return $this->loader;
	}

	/**
	 * Retorna el número de la versión del plugin
	 *
	 * @since     1.0.0
	 * @access    public
	 * @return    string    El número de la versión del plugin.
	 */
	public function get_version()
	{
		return $this->version;
	}
}
