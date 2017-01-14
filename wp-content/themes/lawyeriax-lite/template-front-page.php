<?php
/**
 * Template Name: Front Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package lawyeriax-lite
 */

get_header(); ?>

	</div><!-- .container -->

	<?php
		$lawyeriax_slider_shortcode = get_theme_mod('lawyeriax_slider_shortcode');
		if(!empty($lawyeriax_slider_shortcode)){
			echo do_shortcode($lawyeriax_slider_shortcode);
		} else {
			$lawyeriax_bigtitle_background  = get_theme_mod( 'header_image' );
			$lawyeriax_bigtitle_title       = get_theme_mod( 'lawyeriax_bigtitle_title' );
			$lawyeriax_bigtitle_text        = get_theme_mod( 'lawyeriax_bigtitle_text' );
			$lawyeriax_bigtitle_button_text = get_theme_mod( 'lawyeriax_bigtitle_button_text' );
			$lawyeriax_bigtitle_button_link = get_theme_mod( 'lawyeriax_bigtitle_button_link' );
			$lawyeriax_bigtitle_check       = ! empty( $lawyeriax_bigtitle_background ) || ! empty( $lawyeriax_bigtitle_title ) || ! empty( $lawyeriax_bigtitle_text ) || ! empty( $lawyeriax_bigtitle_button_text );

			if ( $lawyeriax_bigtitle_check === true ) {
				$data = array(
					'background'  => $lawyeriax_bigtitle_background,
					'title'       => $lawyeriax_bigtitle_title,
					'text'        => $lawyeriax_bigtitle_text,
					'button_text' => $lawyeriax_bigtitle_button_text,
					'button_link' => $lawyeriax_bigtitle_button_link,
				);
				lawyeriax_lite_big_title_section( $data );
			} else {
				/* Slider section for backward compatibility*/
				lawyeriax_lite_slider_section();
			}
		}

		/* Ribbon section */
		lawyeriax_lite_ribbon_section();

		/* Features section */
		lawyeriax_lite_features_section();

		/* About us section */
		lawyeriax_lite_about_us_section();

		/* Latest news section */
		lawyeriax_lite_latest_news_section();

	?>





	<div class="container">
<?php
get_footer();
