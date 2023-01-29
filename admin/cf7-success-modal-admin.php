<?php
class CF7_Success_Modal {

    public function __construct() {
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
        add_action( 'wp_footer', array( $this, 'display_success_modal' ) );
        add_action( 'admin_menu', array( $this, 'add_submenu' ) );
        add_action( 'admin_notices', array( $this, 'display_admin_notice' ) );
      
    }

    public function enqueue_scripts() {
        if(self::is_cf7_form_page()){
            wp_enqueue_script( 'cf7-success-modal', CF7_SUCCESS_MODAL_ASSETS . 'js/cf7-success-modal.js', array( 'jquery' ), '1.0', true );
            wp_enqueue_style( 'cf7-success-modal', CF7_SUCCESS_MODAL_ASSETS . 'css/cf7-success-modal.css' );
        }
    }

    public function display_success_modal() {
        if(self::is_cf7_form_page()){
            include plugin_dir_path(__FILE__) . 'views/cf7-modal-view.php';  
        }
        
    }

    public function add_submenu() {
        add_submenu_page(
            'wpcf7',
            'CF7 Success Modal',
            'Success Modal',
            'manage_options',
            'cf7_success_modal',
            array( $this, 'display_submenu_page' )
        );
    }

    public function display_submenu_page() {
        echo "This is the submenu page for CF7 Success Modal.";
    }

    public function display_admin_notice() {
        if ( ! is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) ) {
            ?>
            <div class="notice notice-error">
                <p>CF7 Success Modal plugin requires Contact Form 7 plugin to be active.</p>
            </div>
            <?php
        }
    }
    
    public static function is_cf7_form_page() {
       
       /*
        if ( function_exists( 'wpcf7_contact_form' ) ) {
            global $post;
            return is_a( $post, 'WPCF7_Contact_Form' );
        }
        return false;
        */


            global $post;
            if ( $post instanceof WP_Post && has_shortcode( $post->post_content, 'contact-form-7' ) ) {
                return true;
            }
            return false;

    }
    
    

}
new CF7_Success_Modal();
