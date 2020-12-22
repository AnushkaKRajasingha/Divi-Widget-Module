<?php

/**
 * User: anushkar
 * Date: 9/7/20
 * Time: 3:22 AM
 */
class DiviWidgetModule extends ET_Builder_Module
{



    public $slug       = 'diviwmext_diviwm_module';
    public $vb_support = 'on';
    private $domain = 'diviwmext-diviwm-extension';
    private $widget_id ;

    protected $module_credits = array(
        'module_uri' => 'http://rajasingha.com/wpplugins/diviwmext-diviwm-module',
        'author'     => 'Nelson M.',
        'author_uri' => 'http://rajasingha.com',
    );

    public function init() {




        $this->name = esc_html__( 'Widget', $this->domain);

        $this->settings_modal_toggles = array(
            'general'  => array(
                'toggles' => array(
                    'main_content' => et_builder_i18n( 'Content' ),
                ),
            ),
        );

       // add_filter('et_bb_field_renderer_data', array($this,'render_widgets'),10,2);
    }

    public function get_fields() {

        if ( empty ( $GLOBALS['wp_widget_factory'] ) )
            return;

       /* echo '<pre>';
        var_dump( $GLOBALS['wp_widget_factory']->widgets);
        echo '<pre>';*/


        return array(

            'content'        => array(
                'label'            => esc_html__( 'Widgets', $this->domain ),
                'type'             => 'select',
                'options'         => wp_list_pluck( $GLOBALS['wp_widget_factory']->widgets ,'name') ,
                'option_category'  => 'basic_option',
                'description'      => esc_html__( 'Select a widget that you would like to display in this placeholder.', $this->domain),
                'toggle_slug'      => 'main_content',
                'computed_affects' => array(
                    '__widget',
                ),
            ),
            '__widget'  => array(
                'type'                => 'computed',
                'computed_callback'   => array( 'DiviWidgetModule', 'get_widget' ),
                'computed_depends_on' => array(
                    'content',
                ),

            ),

        );
    }


    public function get_saved_widget(){
        return  $this->content;
    }

    static function get_default_content() {


        return self::get_saved_widget();

        if ( !empty ( $GLOBALS['wp_widget_factory'] ) ) {
            // Pluck sidebar ids
            $widget_ids = wp_list_pluck(  $GLOBALS['wp_widget_factory']->widgets, 'id' );

            // Return first sidebar id
            return array_shift( $widget_ids );
        }

        return '';
    }


    /**
     * Get sidebar data for sidebar module
     *
     * @param string comma separated gallery ID
     * @param string on|off to determine grid / slider layout
     * @param array  passed current page params
     *
     * @return string JSON encoded array of attachments data
     */
    static function get_widget( $args = array(), $conditional_tags = array(), $current_page = array() ) {

        $defaults = array(
            'content' => 'Wp_Widget_Pages',
        );

        $args = wp_parse_args( $args, $defaults );
        if(empty($args[ 'content']))
            $args[ 'content'] = 'WP_Widget_Pages';

       /* ob_start();

        echo '<code><pre>';
        var_dump($args);
        echo '</pre></code>';

        $widget = ob_get_contents();

        ob_end_clean();

        return $widget;*/

        // Outputs sidebar
        $widgets = '';

        ob_start();

        the_widget($args['content'] );

        $widget = ob_get_contents();

        ob_end_clean();

        return $widget;
    }



    public function render_widgets($renderer_data, $field){



    }

    function before_render() {
        $this->widget_id = $this->props['content']; //var_dump($this->widget_id);
    }

    function shortcode_callback( $atts, $content = null, $function_name ) {

        var_dump($content);
    }
    public function render( $attrs, $content = null, $render_slug ) {



       $widgetid = trim(strip_tags($this->props['content']));   //var_dump($widgetid);

        ob_start();

        the_widget($widgetid );

        $widget = ob_get_contents();

        ob_end_clean();



        return sprintf( '<div> %1$s</div>', $widget );
    }




}

new DiviWidgetModule();