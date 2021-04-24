<?php

namespace App;

class MgDevSettings
{

    public function init()
    {
        $args = [
            'sanitize_callback' => 'mgdev_filtrando',
            'default' => 'Este nombre de opción no fue encontrado en la tabla de opciones'
        ];

        // registrando una nueva configuración en la página "general"
        register_setting('mgdev_pruebas', 'mgdev_miprimera_configuracion', $args);

        // Registrando una nueva sección en la página "general"
        add_settings_section(
            'mgdev_config_seccion',
            'Configuración',
            [$this, 'config_seccion_cb'],
            'mgdev_pruebas'
        );

        add_settings_field(
            'mgdev_config_campo1',
            'Configuración 1',
            [$this, 'config_campo1_cb'],
            'mgdev_pruebas',
            'mgdev_config_seccion',
            [
                'label_for' => 'mgdev_campo_1',
                'class' => 'clase_campo',
                'mgdev_dato_personalizado' => 'valor personalizado 1'
            ]
        );

        add_settings_field(
            'mgdev_config_campo2',
            'Configuración 2',
            [$this, 'config_campo2_cb'],
            'mgdev_pruebas',
            'mgdev_config_seccion',
            [
                'label_for' => 'mgdev_campo_2',
                'class' => 'clase_campo',
                'mgdev_dato_personalizado' => 'valor personalizado 2'
            ]
        );
    }

    private function config_seccion_cb()
    {
        echo "<p>Sección configuración</p>";
    }

    private function config_campo1_cb($args)
    {

        $mgdev_config = get_option('mgdev_miprimera_configuracion');

        if ($mgdev_config !== false) {
            $valor = isset($mgdev_config[$args['label_for']]) ? esc_attr($mgdev_config[$args['label_for']]) : '';
        } else {
            $valor = $mgdev_config;
        }

        $output = "<input class='{$args['class']}' data-custom='{$args['mgdev_dato_personalizado']}' type='text' name='mgdev_miprimera_configuracion[{$args['label_for']}]' value='$valor'>";

        echo $output;
    }

    function config_campo2_cb($args)
    {

        $mgdev_config = get_option('mgdev_miprimera_configuracion');

        if ($mgdev_config != false) {
            $valor = isset($mgdev_config[$args['label_for']]) ? esc_attr($mgdev_config[$args['label_for']]) : '';
        } else {
            $valor = $mgdev_config;
        }

        $html = "<input class='{$args['class']}' data-custom='{$args['mgdev_dato_personalizado']}' type='text' name='mgdev_miprimera_configuracion[{$args['label_for']}]' value='$valor'>";

        echo $html;
    }

    public function filtrando($valor)
    {

        $valor['mgdev_campo_1'] = $valor['mgdev_campo_1'];
        $valor['mgdev_campo_2'] = $valor['mgdev_campo_2'];

        return $valor;
    }
}
