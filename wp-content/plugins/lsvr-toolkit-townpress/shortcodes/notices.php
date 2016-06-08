<?php
if ( ! lsvr_shortcode_exists( 'lsvr_notices' ) && ! function_exists( 'lsvr_notices_shortcode' ) ) {

    function lsvr_notices_shortcode( $atts, $content = null, $generator = false, $check_if_inline = false ) {

        /* ---------------------------------------------------------------------

            Output shortcode info for shortcode generator

        --------------------------------------------------------------------- */

        if ( $generator === true ) {

            $shortcode_data = array(
                'lsvr_notices' => array(
                    'name' => __( 'Notices', 'lsvrtoolkit' ),
                    'description' => __( 'Lists notices. You can add notices under <strong>Notices</strong>', 'lsvrtoolkit' ),
                    'paired' => false,
                    'inline' => false,
                    'atts' => array(
                        'title' => array(
                            'label' => __( 'Title', 'lsvrtoolkit' ),
                            'type' => 'text',
							'default' => __( 'Town <strong>Notices</strong>', 'lsvrtoolkit' )
                        ),
						'icon' => array(
                            'label' => __( 'Icon', 'lsvrtoolkit' ),
							'description' => __( 'Name of the icon (e.g. "fa fa-heart"). Please refer to the documentation to learn more about using the icons.', 'lsvrtoolkit' ),
                            'type' => 'text',
							'default' => 'tp tp-calendar-full',
                        ),
                        'number_of_items' => array(
                            'label' => __( 'Number of Notices', 'lsvrtoolkit' ),
                            'type' => 'select',
                            'values' => array( '0' => __( 'All', 'lsvrtoolkit' ), '1' => 1, '2' => 2, '3' => 3, '4' => 4, '5' => 5, '6' => 6, '7' => 7, '8' => 8, '9' => 9, '10' => 10 ),
                            'default' => 'all'
                        ),
                        'show_excerpt' => array(
                            'label' => __( 'Show excerpt', 'lsvrtoolkit' ),
                            'type' => 'select',
                            'values' => array( 'yes' => __( 'Yes', 'lsvrtoolkit' ), 'no' => __( 'No', 'lsvrtoolkit' ) ),
                            'default' => 'yes'
                        ),
                        'more_btn_label' => array(
                            'label' => __( 'More Button Label', 'lsvrtoolkit' ),
							'description' => __( 'Leave blank to hide More button.', 'lsvrtoolkit' ),
                            'type' => 'text',
                        ),
                        'custom_class' => array(
                            'label' => __( 'Custom Class', 'lsvrtoolkit' ),
                            'description' => __( 'It can be used for applying custom CSS.', 'lsvrtoolkit' ),
                            'type' => 'text'
                        )
                    )
                )
            );

            // CHECK FOR CATEGORIES
            $categories_tax = get_categories( 'taxonomy=lsvrnoticecat&hide_empty=1&hierarchical=0&parent=0' ) ;

            if ( count( $categories_tax ) > 0 ) {

                $values = array( 'none' => __( 'None', 'lsvrtoolkit' ) );

                foreach ( $categories_tax as $value ) {
                    $values[$value->cat_ID] = $value->name;
                }

                $att_data = array(
                    'label' => __( 'Category', 'lsvrtoolkit' ),
                    'description' => __( 'Category to load notices from. Choose <strong>None</strong> to load notices regardless of category.', 'lsvrtoolkit' ),
                    'type' => 'select',
                    'values' => $values,
                    'default' => 'none'
                );

                $shortcode_atts_arr = $shortcode_data['lsvr_notices']['atts'];
				$shortcode_atts_arr = array( 'category' => $att_data ) + $shortcode_atts_arr;
                $shortcode_data['lsvr_notices']['atts'] = $shortcode_atts_arr;

            }

            return $shortcode_data;

        }

        /* ---------------------------------------------------------------------
            Check if shortcode is inline
        --------------------------------------------------------------------- */

        if ( $check_if_inline === true ) {
            return false;
        }

        /* ---------------------------------------------------------------------
            Prepare arguments
        --------------------------------------------------------------------- */

        $args = shortcode_atts(
            array(
				'category' => 'none',
				'title' => '',
				'icon' => 'tp tp-bullhorn',
				'number_of_items' => 'all',
                'show_excerpt' => 'yes',
				'more_btn_label' => '',
                'custom_class' => ''
            ),
            $atts
        );

		$category = trim( esc_attr( $args['category'] ) );
		$title = $args['title'];
		$icon = esc_attr( $args['icon'] );
        $number_of_items = (int) esc_attr( $args['number_of_items'] );
        $number_of_items = $number_of_items < 1 ? 1000 : $number_of_items;
        $show_excerpt = esc_attr( $args['show_excerpt'] );
        $show_excerpt = $show_excerpt === 'yes' ? true : false;
		$more_btn_label = $args['more_btn_label'];
        $custom_class = esc_attr( $args['custom_class'] );

        /* ---------------------------------------------------------------------
            Generate HTML
        --------------------------------------------------------------------- */

		$class = $custom_class;
        $class .= $icon !== '' ? ' m-has-icon' : '';
		$class = trim( preg_replace( '/\s+/', ' ', $class ) );
		$class = $class !== '' ? ' ' . $class : '';

		$more_btn_link = $category !== 'none' ? get_term_link( intval( $category ), 'lsvrnoticecat' ) : get_post_type_archive_link( 'lsvrnotice' );

        $output = '<div class="c-notices"><div class="c-content-box"><div class="c-notices-inner">';

        $before_title = $icon !== '' ? '<h3 class="widget-title m-has-ico"><i class="widget-ico ' . $icon . '"></i>' : '<h3 class="widget-title">';

        ob_start();
        the_widget( 'Lsvr_Notices_Widget', array(
            'title' => $title,
            'icoclass' => $icon,
            'category' => $category,
            'limit' => $number_of_items,
            'show_excerpt' => $show_excerpt,
            'show_all_btn_label' => $more_btn_label,
        ), array(
            'before_widget' => '<div class="widget lsvr-notices"><div class="widget-inner">',
            'after_widget'  => '</div></div>',
            'before_title'  => $before_title,
            'after_title'   => '</h3>'
        ));

        $output .= ob_get_contents();
        ob_end_clean();

        $output .= '</div></div></div>';

		return $output;

    }
    add_shortcode( 'lsvr_notices', 'lsvr_notices_shortcode' );

}
?>