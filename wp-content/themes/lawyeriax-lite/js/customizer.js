/**
 * customizer.js
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );

	/********************************************************/
	/******************* Ribbon Section *********************/
	/********************************************************/
 	wp.customize( 'lawyeriax_ribbon_tagline', function( value ) {
 		value.bind( function( to ) {
 			if( to != '1' ) {
 				$( '.ribbon' ).removeClass( 'lawyeriax_lite_hidden_if_not_customizer' );
 			}
 			else {
 				$( '.ribbon' ).addClass( 'lawyeriax_lite_hidden_if_not_customizer' );
 			}
			$( '.ribbon p' ).html( to );
 		} );
 	} );


/********************************************************/
/******************* Lawyers Section ********************/
/********************************************************/
	wp.customize( 'lawyeriax_lawyers_heading', function( value ) {
		value.bind( function( to ) {
			if( to != '1' ) {
				$( '.lawyer h2' ).removeClass( 'lawyeriax_lite_hidden_if_not_customizer' );
			}
			else {
				$( '.lawyer h2' ).addClass( 'lawyeriax_lite_hidden_if_not_customizer' );
			}
		} );
	} );
	wp.customize( 'lawyeriax_lawyers_heading', function( value ) {
		value.bind( function( to ) {
			$( '.lawyer h2' ).text( to );
		} );
	} );


/********************************************************/
/******************* About Section **********************/
/********************************************************/

//heading
	wp.customize( 'lawyeriax_about_heading', function( value ) {
		value.bind( function( to ) {
			if( to != '1' ) {
				$( '.about h3' ).removeClass( 'lawyeriax_lite_hidden_if_not_customizer' );
			}
			else {
				$( '.about h3' ).addClass( 'lawyeriax_lite_hidden_if_not_customizer' );
			}
			$( '.about h3' ).html( to );
		} );
	} );


	//text
	wp.customize( 'lawyeriax_about_text', function( value ) {
		value.bind( function( to ) {
			if( to != '1' ) {
				$( '.about .about-content p' ).removeClass( 'lawyeriax_lite_hidden_if_not_customizer' );
			}
			else {
				$( '.about .about-content p' ).addClass( 'lawyeriax_lite_hidden_if_not_customizer' );
			}
			$( '.about .about-content p' ).html( to );
		} );
	} );


	wp.customize( 'news_heading', function( value ) {
		value.bind( function( to ) {
			if( to != '1' ) {
				$( '#news h2' ).removeClass( 'lawyeriax_lite_hidden_if_not_customizer' );
			}
			else {
				$( '#news h2' ).addClass( 'lawyeriax_lite_hidden_if_not_customizer' );
			}
			$( '#news h2' ).html( to );
		} );
	} );


	// wp.customize( 'lawyeriax_about_text', function( value ) {
  //    value.bind( function( to ) {
  //      $( '#about .about-content p' ).html( to );
  //    } );
  //  } );
  //  wp.customize( 'custom_plugin_css', function( value ) {
  //    value.bind( function( to ) {
  //      $( '#about .about-content p' ).html( to );
  //    } );
  //  } );


} )( jQuery );
