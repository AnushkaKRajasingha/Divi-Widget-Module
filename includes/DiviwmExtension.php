<?php

class DIVIWMEXT_DiviwmExtension extends DiviExtension {

	/**
	 * The gettext domain for the extension's translations.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public $gettext_domain = 'diviwmext-diviwm-extension';

	/**
	 * The extension's WP Plugin name.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public $name = 'diviwm-extension';

	/**
	 * The extension's version
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public $version = '1.0.0';

	/**
	 * DIVIWMEXT_DiviwmExtension constructor.
	 *
	 * @param string $name
	 * @param array  $args
	 */
	public function __construct( $name = 'diviwm-extension', $args = array() ) {


		$this->plugin_dir     = plugin_dir_path( __FILE__ );
		$this->plugin_dir_url = plugin_dir_url( $this->plugin_dir );

		parent::__construct( $name, $args );

      //  add_action( 'wp_ajax_ac_get_author_name', array('DIVIWMEXT_DiviwmExtension','ac_get_author_name' ));
      //  add_action( 'wp_ajax_nopriv_ac_get_author_name', array('DIVIWMEXT_DiviwmExtension','ac_get_author_name' ));
	}

   /* public function ac_get_author_name(){

        var_dump($_REQUEST);

        $post_id = $_POST['post_id'];
        $author_id = get_post_field ('post_author', $post_id);
        $display_name = get_the_author_meta( 'display_name' , $author_id );
        $result = [
            'author' => $display_name
        ];
        echo json_encode( $result );
        wp_die();

    }*/
}

new DIVIWMEXT_DiviwmExtension;
