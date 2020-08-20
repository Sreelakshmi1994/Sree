<?php
/*
 Plugin Name: chandutestplugin
 Plugin URI: http://localhost/plugins/testplugin/
 Description: test
 Version: 1.0
 Author : chandu
 */


//version compare.
if(! version_compare(PHP_VERSION, '5.6', '>=')){
    add_action('admin_notice','test_fail_php_version');
}elseif(! version_compare(get_bloginfo('version'), '4.2','>=')){
    add_action('admin_notice','test_fail_wp_version');
}else{
     add_action("admin_menu","addMenu");
            function addMenu(){
                add_menu_page("Example", "Example Test", 4, "example", "ExampleMenu");
                add_submenu_page("example", "Option 1", "Option 1", 4, "example-1", "option1");
                add_submenu_page("example", "Option 2", "Option 2", 4, "example-2", "option2");
                add_submenu_page("example", "Option 3", "Option 3", 4, "example-3", "option3");
                add_submenu_page("example", "Option 4", "Option 4", 4, "example-4", "option4");
             }
            function ExampleMenu(){
                
                echo "chandu";
            }
            function option1()
            {
                echo "Walrus";
            }
            function option2()
            {
                echo "Walrus";
            }
            function option3()
            {
                echo "Walrus";
            }
            function option4()
            {
                echo "Walrus";
            }

   
}


//notice for users minimum php version

    function test_fail_php_version(){
        $message = sprintf(esc_html__('test requires PHP version %s+, plugin is currently NOT RUNNING.', 'test'));
        $html_message = sprintf('<div class="error">%s</div>', wpautop($message));
        echo wp_kses_post($html_message);
    }



//notice for users minimum wp version

    function test_fail_wp_version(){
        $message = sprintf(esc_html__('test requires wp version %s+, plugin is currently NOT RUNNING.', 'test'));
        $html_message = sprintf('<div class="error">%s</div>', wpautop($message));
        echo wp_kses_post($html_message);
    }


class plugin{

//Unserializing

    public function __wakeup() {
        // Unserializing instances of the class is forbidden.
        _doing_it_wrong( __FUNCTION__, esc_html__( 'Something went wrong.', 'test' ), '2.0.0' );
    }



//Cloning

  public function __clone() {
        // Cloning instances of the class is forbidden.
        _doing_it_wrong( __FUNCTION__, esc_html__( 'Something went wrong.', 'test' ), '2.0.0' );
    }


//plugins_loaded

   private function __construct() {

        $this->register_autoloader();
        $this->load_immediate();

        if ( did_action( 'plugins_loaded' ) ){
            $this->init();
        } else {
            add_action( 'plugins_loaded', [ $this, 'init' ], 0 );
        }

    }

}

/**
 * Get DB
 *
 * @param $name
 *
 * @return DB\DB|DB\Meta_DB|DB\Tags
 */
function get_db( $name ) {
    return Plugin:: $instance->dbs->get_db( $name );
}




?>