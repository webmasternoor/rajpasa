<?php
/**
 * Class to display upsells.
 *
 * @package WordPress
 * @subpackage Lawyeriax Lite
 */
if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return;
}

/**
 * Class LawyeriaX_Info
 */
class LawyeriaX_Info extends WP_Customize_Control {

	/**
	 * The type of customize section being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'info';

	/**
	 * Control label
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $label = '';

	/**
	 * The render function for the controler
	 */
	public function render_content() {
		$links = array(
			array(
				'name' => __( 'View Demo','lawyeriax-lite' ),
				'link' => esc_url( 'https://themeisle.com/demo/?theme=LawyeriaX%20Lite' ),
			),
			array(
				'name' => __( 'Free VS Pro','lawyeriax-lite' ),
				'link' => esc_url( 'http://docs.themeisle.com/article/528-what-is-the-difference-between-lawyeriax-lite-and-lawyeriax-pro' ),
			),
			array(
				'name' => __( 'Leave a review','lawyeriax-lite' ),
				'link' => esc_url( 'https://wordpress.org/support/theme/lawyeriax-lite/reviews/#new-post' ),
			),
		); ?>


		<div class="lawyeriax-theme-info">
			<?php
			foreach ( $links as $item ) {  ?>
				<a href="<?php echo esc_url( $item['link'] ); ?>" target="_blank"><?php echo esc_html( $item['name'] ); ?></a>
				<hr/>
				<?php
			} ?>
		</div>
		<?php
	}
}
