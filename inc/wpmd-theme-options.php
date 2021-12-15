<?php
/**
 * Create A Simple Theme Options Panel
 *
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Start Class
if ( ! class_exists( 'WPMD_Theme_Options' ) ) {

	class WPMD_Theme_Options {

		/**
		 * Start things up
		 *
		 * @since 1.0.0
		 */
		public function __construct() {

			// We only need to register the admin panel on the back-end
			if ( is_admin() ) {
				add_action( 'admin_menu', array( 'WPMD_Theme_Options', 'add_admin_menu' ) );
				add_action( 'admin_init', array( 'WPMD_Theme_Options', 'register_settings' ) );
			}

		}

		/**
		 * Returns all theme options
		 *
		 * @since 1.0.0
		 */
		public static function get_theme_options() {
			return get_option( 'theme_options' );
		}

		/**
		 * Returns single theme option
		 *
		 * @since 1.0.0
		 */
		public static function get_theme_option( $id ) {
			$options = self::get_theme_options();
			if ( isset( $options[$id] ) ) {
				return $options[$id];
			}
		}

		/**
		 * Add sub menu page
		 *
		 * @since 1.0.0
		 */
		public static function add_admin_menu() {
			add_menu_page(
				esc_html__( 'Theme Settings', 'text-domain' ),
				esc_html__( 'Theme Settings', 'text-domain' ),
				'manage_options',
				'theme-settings',
				array( 'WPMD_Theme_Options', 'create_admin_page' )
			);
		}

		/**
		 * Register a setting and its sanitization callback.
		 *
		 * We are only registering 1 setting so we can store all options in a single option as
		 * an array. You could, however, register a new setting for each option
		 *
		 * @since 1.0.0
		 */
		public static function register_settings() {
			register_setting( 'theme_options', 'theme_options', array( 'WPMD_Theme_Options', 'sanitize' ) );
		}

		/**
		 * Sanitization callback
		 *
		 * @since 1.0.0
		 */
		public static function sanitize( $options ) {

			// If we have options lets sanitize them
			if ( $options ) {

				// Input for Phone Number
				if ( ! empty( $options['wpmd_member_phno_input'] ) ) {
					$options['wpmd_member_phno_input'] = sanitize_text_field( $options['wpmd_member_phno_input'] );
				} else {
					unset( $options['wpmd_member_phno_input'] ); // Remove from options if empty
				}

				// Input for Phone Number Link
				if ( ! empty( $options['wpmd_member_phno_link_input'] ) ) {
					$options['wpmd_member_phno_link_input'] = sanitize_text_field( $options['wpmd_member_phno_link_input'] );
				} else {
					unset( $options['wpmd_member_phno_link_input'] ); // Remove from options if empty
				}

				// Input for Email
				if ( ! empty( $options['wpmd_member_email_input'] ) ) {
					$options['wpmd_member_email_input'] = sanitize_text_field( $options['wpmd_member_email_input'] );
				} else {
					unset( $options['wpmd_member_email_input'] ); // Remove from options if empty
				}

				// Sidebar Title Area color picker
				if ( ! empty( $options['sidebarbg_colorpickerinput'] ) ) {
					$options['sidebarbg_colorpickerinput'] = sanitize_text_field( $options['sidebarbg_colorpickerinput'] );
				} else {
					unset( $options['singlepage_colorpickerinput'] ); // Remove from options if empty
				}

				// ======== For Custom Post Types ==========//

				//Elder Law Reports Checkbox
				if ( ! empty( $options['wpmd_elderlawreports_checkbox'] ) ) {
					$options['wpmd_elderlawreports_checkbox'] = 'on';
				} else {
					unset( $options['wpmd_elderlawreports_checkbox'] ); // Remove from options if not checked
				}

				//Reports Checkbox
				if ( ! empty( $options['wpmd_generalreports_checkbox'] ) ) {
					$options['wpmd_generalreports_checkbox'] = 'on';
				} else {
					unset( $options['wpmd_generalreports_checkbox'] ); // Remove from options if not checked
				}

				//Staff Profiles Checkbox
				if ( ! empty( $options['wpmd_staffprofiles_checkbox'] ) ) {
					$options['wpmd_staffprofiles_checkbox'] = 'on';
				} else {
					unset( $options['wpmd_staffprofiles_checkbox'] ); // Remove from options if not checked
				}

				//FAQs Checkbox
				if ( ! empty( $options['wpmd_faqs_checkbox'] ) ) {
					$options['wpmd_faqs_checkbox'] = 'on';
				} else {
					unset( $options['wpmd_faqs_checkbox'] ); // Remove from options if not checked
				}

				//Educational Alerts Checkbox
				if ( ! empty( $options['wpmd_educationalerts_checkbox'] ) ) {
					$options['wpmd_educationalerts_checkbox'] = 'on';
				} else {
					unset( $options['wpmd_educationalerts_checkbox'] ); // Remove from options if not checked
				}

				//EP Planning Alerts Checkbox
				if ( ! empty( $options['wpmd_epplanning_checkbox'] ) ) {
					$options['wpmd_epplanning_checkbox'] = 'on';
				} else {
					unset( $options['wpmd_epplanning_checkbox'] ); // Remove from options if not checked
				}

				//Newsletters Checkbox
				if ( ! empty( $options['wpmd_newsletter_checkbox'] ) ) {
					$options['wpmd_newsletter_checkbox'] = 'on';
				} else {
					unset( $options['wpmd_newsletter_checkbox'] ); // Remove from options if not checked
				}

				//News & Events Checkbox
				if ( ! empty( $options['wpmd_newsandevents_checkbox'] ) ) {
					$options['wpmd_newsandevents_checkbox'] = 'on';
				} else {
					unset( $options['wpmd_newsandevents_checkbox'] ); // Remove from options if not checked
				}

				//Testimonial Checkbox
				if ( ! empty( $options['wpmd_testimonial_checkbox'] ) ) {
					$options['wpmd_testimonial_checkbox'] = 'on';
				} else {
					unset( $options['wpmd_testimonial_checkbox'] ); // Remove from options if not checked
				}

			}

			// Return sanitized options
			return $options;

		}

		/**
		 * Settings page output
		 *
		 * @since 1.0.0
		 */
		public static function create_admin_page() { ?>

			<div class="wrap">

				<h1 class="wpmd-admin-head"><?php esc_html_e( 'Theme Options', 'text-domain' ); ?></h1>

				<form method="post" action="options.php">

					<?php settings_fields( 'theme_options' ); ?>
    
					<!--- Member Personal Info Settings --->

					<div class="adminThemeOption-single-table-container">
						<h2 class="wpmd-admin-head"><?php esc_html_e( 'Member Information', 'text-domain' ); ?></h2>
						<div class="wpmd-admin-descrption">
							<h3>Shortcodes for displaying the content</h3>
							<p>Phone Number: <span>[phone-no]</span></p>
							<p>Email: <span>[mem-email]</span></p>
							<p>Firm's name: <span>[company-name]</span> (can be updated from Settings > General > Site Title)</p>
						</div>
						<table class="form-table wpmd-custom-admin-table-theme-option adminPost-featuredTable">

							<?php // Member's Phone Number ?>
							<tr valign="top">
								<th scope="row"><?php esc_html_e( 'Phone Number', 'text-domain' ); ?></th>
								<td>
									<?php $value = self::get_theme_option( 'wpmd_member_phno_input' ); ?>
								<input type="text" name="theme_options[wpmd_member_phno_input]" value="<?php echo esc_attr( $value ); ?>">
								</td>
							</tr>

							<tr valign="top">
								<th scope="row"><?php esc_html_e( 'Phone Number Link', 'text-domain' ); ?></th>
								<td>
									<?php $value = self::get_theme_option( 'wpmd_member_phno_link_input' ); ?>
								<input type="text" name="theme_options[wpmd_member_phno_link_input]" value="<?php echo esc_attr( $value ); ?>">
								</td>
							</tr>

							<tr valign="top">
								<th scope="row"><?php esc_html_e( 'Email', 'text-domain' ); ?></th>
								<td>
									<?php $value = self::get_theme_option( 'wpmd_member_email_input' ); ?>
								<input type="text" name="theme_options[wpmd_member_email_input]" value="<?php echo esc_attr( $value ); ?>">
								</td>
							</tr>

						</table>
					</div>


					<!--- Sidebar Settings --->

					<div class="adminThemeOption-single-table-container">
						<h2 class="wpmd-admin-head"><?php esc_html_e( 'SidebarSettings', 'text-domain' ); ?></h2>
						<table class="form-table wpmd-custom-admin-table-theme-option adminPost-featuredTable">

							<?php // Sidebar Title BG Color ?>
							<tr valign="top">
								<th scope="row"><?php esc_html_e( 'Sidebar Background Color', 'text-domain' ); ?></th>
								<td>
									<?php $value = self::get_theme_option( 'sidebarbg_colorpickerinput' ); ?>
									<input class="my-colorpicker-field" type="text" name="theme_options[sidebarbg_colorpickerinput]" value="<?php echo esc_attr( $value ); ?>" data-default-color="#0073aa" />
								</td>
							</tr>

						</table>
					</div>


					<!--- CPTS Theme Settings --->

					<div class="adminThemeOption-single-table-container">
						<h2 class="wpmd-admin-head"><?php esc_html_e( 'Custom Post Types', 'text-domain' ); ?></h2>
						<table class="form-table wpmd-custom-admin-table-theme-option adminPost-featuredTable">

							<?php // Elder Law Reports checkbox ?>
							<tr valign="top">
								<th scope="row"><?php esc_html_e( 'Elder Law Report', 'text-domain' ); ?></th>
								<td>
									<?php $value = self::get_theme_option( 'wpmd_elderlawreports_checkbox' ); ?>
									<label class="checkBox-switch">
										<input type="checkbox" name="theme_options[wpmd_elderlawreports_checkbox]" <?php checked( $value, 'on' ); ?>>
										<span class="checkBox-slider"></span>
									</label>
								</td>
							</tr>

							<?php // Reports checkbox ?>
							<tr valign="top">
								<th scope="row"><?php esc_html_e( 'Reports', 'text-domain' ); ?></th>
								<td>
									<?php $value = self::get_theme_option( 'wpmd_generalreports_checkbox' ); ?>
									<label class="checkBox-switch">
										<input type="checkbox" name="theme_options[wpmd_generalreports_checkbox]" <?php checked( $value, 'on' ); ?>>
										<span class="checkBox-slider"></span>
									</label>
								</td>
							</tr>

							<?php // Staff Profiles checkbox ?>
							<tr valign="top">
								<th scope="row"><?php esc_html_e( 'Staff Profiles', 'text-domain' ); ?></th>
								<td>
									<?php $value = self::get_theme_option( 'wpmd_staffprofiles_checkbox' ); ?>
									<label class="checkBox-switch">
										<input type="checkbox" name="theme_options[wpmd_staffprofiles_checkbox]" <?php checked( $value, 'on' ); ?>>
										<span class="checkBox-slider"></span>
									</label>
								</td>
							</tr>

							<?php // FAQs checkbox ?>
							<tr valign="top">
								<th scope="row"><?php esc_html_e( 'FAQs', 'text-domain' ); ?></th>
								<td>
									<?php $value = self::get_theme_option( 'wpmd_faqs_checkbox' ); ?>
									<label class="checkBox-switch">
										<input type="checkbox" name="theme_options[wpmd_faqs_checkbox]" <?php checked( $value, 'on' ); ?>>
										<span class="checkBox-slider"></span>
									</label>
								</td>
							</tr>

							<?php // Educational Alerts checkbox ?>
							<tr valign="top">
								<th scope="row"><?php esc_html_e( 'Educational Alerts', 'text-domain' ); ?></th>
								<td>
									<?php $value = self::get_theme_option( 'wpmd_educationalerts_checkbox' ); ?>
									<label class="checkBox-switch">
										<input type="checkbox" name="theme_options[wpmd_educationalerts_checkbox]" <?php checked( $value, 'on' ); ?>>
										<span class="checkBox-slider"></span>
									</label>
								</td>
							</tr>

							<?php // Estate Planning Articles checkbox ?>
							<tr valign="top">
								<th scope="row"><?php esc_html_e( 'Estate Planning Articles', 'text-domain' ); ?></th>
								<td>
									<?php $value = self::get_theme_option( 'wpmd_epplanning_checkbox' ); ?>
									<label class="checkBox-switch">
										<input type="checkbox" name="theme_options[wpmd_epplanning_checkbox]" <?php checked( $value, 'on' ); ?>>
										<span class="checkBox-slider"></span>
									</label>
								</td>
							</tr>

							<?php // Newsletters checkbox ?>
							<tr valign="top">
								<th scope="row"><?php esc_html_e( 'Newsletters', 'text-domain' ); ?></th>
								<td>
									<?php $value = self::get_theme_option( 'wpmd_newsletter_checkbox' ); ?>
									<label class="checkBox-switch">
										<input type="checkbox" name="theme_options[wpmd_newsletter_checkbox]" <?php checked( $value, 'on' ); ?>>
										<span class="checkBox-slider"></span>
									</label>
								</td>
							</tr>

							<?php // News & Events checkbox ?>
							<tr valign="top">
								<th scope="row"><?php esc_html_e( 'News & Events', 'text-domain' ); ?></th>
								<td>
									<?php $value = self::get_theme_option( 'wpmd_newsandevents_checkbox' ); ?>
									<label class="checkBox-switch">
										<input type="checkbox" name="theme_options[wpmd_newsandevents_checkbox]" <?php checked( $value, 'on' ); ?>>
										<span class="checkBox-slider"></span>
									</label>
								</td>
							</tr>

							<?php // Testimonial checkbox ?>
							<tr valign="top">
								<th scope="row"><?php esc_html_e( 'Testimonial', 'text-domain' ); ?></th>
								<td>
									<?php $value = self::get_theme_option( 'wpmd_testimonial_checkbox' ); ?>
									<label class="checkBox-switch">
										<input type="checkbox" name="theme_options[wpmd_testimonial_checkbox]" <?php checked( $value, 'on' ); ?>>
										<span class="checkBox-slider"></span>
									</label>
								</td>
							</tr>

						</table>
					</div>


					<?php submit_button(); ?>

				</form>

			</div><!-- .wrap -->
		<?php }

	}
}
new WPMD_Theme_Options();

// Helper function to use in your theme to return a theme option value
function myprefix_get_theme_option( $id = '' ) {
	return WPMD_Theme_Options::get_theme_option( $id );
}

//ShortCode for Phone Number
add_shortcode('phone-no', function(){
	
	//Getting Phone Number value
	$phoneNo = myprefix_get_theme_option( 'wpmd_member_phno_input' );
	$phoneNoLink = myprefix_get_theme_option( 'wpmd_member_phno_link_input' );
	
	$numHTML = '';
	if(empty($phoneNoLink)){
		$numHTML .= $phoneNo;
	}
	else{
		$numHTML .= '<a href="tel:'.$phoneNoLink.'" class="phNum-link">'.$phoneNo.'</a>';	
	}

	return $numHTML;

});

//ShortCode for Email
add_shortcode('mem-email', function(){
	
	//Getting Phone Number value
	$memEmail = myprefix_get_theme_option( 'wpmd_member_email_input' );
	
	$emailHTML = '';
	$emailHTML .= '<a href="mailto:'.$memEmail.'" class="email-link">'.$memEmail.'</a>';

	return $emailHTML;

});

//ShortCode for Company Name
add_shortcode('company-name', function(){
	
	//Getting Phone Number value
	$companyName = get_bloginfo('name');
	
	$companyHTML = '';
	$companyHTML .= '<span class="compName">'.$companyName.'</span>';

	return $companyHTML;

});



//Getting Dynamic CSS
function hook_dynamic_css(){ 

$wpmdAdminSidebarBgColor = myprefix_get_theme_option( 'sidebarbg_colorpickerinput' );
?>
   <style>
   <?php if(!empty($wpmdAdminSidebarBgColor)){ ?>
      .sidebar .widget-title {
         background-color: <?php echo $wpmdAdminSidebarBgColor ?>;
      }
   <?php } ?>
   </style>

<?php }
add_action('wp_head', 'hook_dynamic_css');


