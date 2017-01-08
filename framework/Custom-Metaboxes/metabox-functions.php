<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
 */

add_filter( 'cmb_meta_boxes', 'cmb_sample_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb_sample_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_cmb_';

	$meta_boxes[] = array(
		'id'         => 'options',
		'title'      => 'Page, Post Options',
		'pages'      => array( 'page','post'), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
            array(
                'name'    => 'Show title:',
                'desc'    => 'Show Page, Post title area',
                'id'      => $prefix . 'page_title',
                'type'    => 'select',
                'options' => array(
                    array( 'name' => 'Yes', 'value' => 'yes', ),
                    array( 'name' => 'No', 'value' => 'no', ),
                ),
            ),
            array(
                'name'    => 'Page title align:',
                'desc'    => 'Select Page title align',
                'id'      => $prefix . 'title_align',
                'type'    => 'select',
                'options' => array(
                    array( 'name' => 'Left', 'value' => 'left', ),
                    array( 'name' => 'Center', 'value' => 'center', ),
                    
                ),
            ),
            array(
                'name'=>'Intro Title',
                'desc'=>'Page Intro title (Showing if Show page title is "no" )',
                'id'=>$prefix . 'page_intro_title',
                'type'=>'text'
            ),
            array(
                'name'=>'Sub Title',
                'desc'=>'Page sub title',
                'id'=>$prefix . 'page_sub_title',
                'type'=>'textarea_small'
            ),
            array(
                'name' => 'Show slideshow',
                'desc' => 'Show Page slideshow',
                'id'   => $prefix . 'show_slide',
                'type' => 'checkbox',
            ),
            array(
                'name' => 'Page Full Width',
                'desc' => 'Page Full Width',
                'id'   => $prefix . 'page_fullwidth',
                'type'    => 'select',
                'options' => array(
                    array( 'name' => 'Yes', 'value' => 'yes', ),
                    array( 'name' => 'No', 'value' => 'no', ),
                ),
            ),
            array(
                'name' => 'Page Banner',
                'desc' => 'Upload Page banner image.',
                'id'   => $prefix . 'page_banner',
                'type' => 'file',
            ),
            array(
                'name'    => 'Sidebar Position:',
                'desc'    => 'Select Page,post  sidebar position',
                'id'      => $prefix . 'sidebar_position',
                'type'    => 'select',
                'options' => array(
                    array( 'name' => 'Right', 'value' => 'right', ),
                    array( 'name' => 'Left', 'value' => 'left', ),
                ),
            ),

		),
	);
    
    $meta_boxes[] = array(
        'id'         => 'project_fields',
        'title'      => 'Project Fields',
        'pages'      => array('portfolio'), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        //'show_on'    => array( 'key' => 'id', 'value' => array( 2, ), ), // Specific post IDs to display this metabox
        'fields' => array(
            array(
                'name' => 'Sub title',
                'desc' => 'Sub title project',
                'id'   => $prefix . 'sub_title',
                'type' => 'text',
            ),
            array(
                'name' => 'Project URL',
                'desc' => 'Enter your project detai URL',
                'id'   => $prefix . 'project_url',
                'type' => 'text',
            ),
            array(
                'name' => 'Begin Date',
                'desc' => 'Chose your project Client',
                'id'   => $prefix . 'project_begin',
                'type' => 'text_date_timestamp',
            ),
            array(
                'name' => 'Final Date',
                'desc' => 'Chose your project final date',
                'id'   => $prefix . 'project_final',
                'type' => 'text_date_timestamp',
            ),
           
        )
    );
    
    $meta_boxes[] = array(
        'id'         => 'project_marsonry',
        'title'      => 'Project Marsonry Settings',
        'pages'      => array('portfolio'), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        //'show_on'    => array( 'key' => 'id', 'value' => array( 2, ), ), // Specific post IDs to display this metabox
        'fields' => array(
            array(
                'name' => 'columns',
                'desc' => 'Colums of one portfolio',
                'id'   => $prefix . 'columns',
                'type'    => 'select',
                'options' => array(
                    array( 'name' => '1/3', 'value' => 'four', ),
                    array( 'name' => '2/3', 'value' => 'eight', ),
                    )
            ),
            array(
                'name' => 'Marsonry Image',
                'desc' => 'Project Marsonry image.',
                'id'   => $prefix . 'marsonry_image',
                'type' => 'file',
            ),
        )
    );
    
	$meta_boxes[] = array(
		'id'         => 'seo_fields',
		'title'      => 'SEO Fields',
		'pages'      => array( 'page', 'post','portfolio'), // Post type
		'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
		//'show_on'    => array( 'key' => 'id', 'value' => array( 2, ), ), // Specific post IDs to display this metabox
		'fields' => array(
			array(
				'name' => 'SEO title',
				'desc' => 'Title for SEO (optional)',
				'id'   => $prefix . 'seo_title',
				'type' => 'text',
			),
            array(
                'name' => 'SEO Keywords',
                'desc' => 'SEO keywords (optional)',
                'id'   => $prefix . 'seo_keywords',
                'type' => 'text',
            ),
            array(
                'name' => 'SEO Description',
                'desc' => 'SEO description (optional)',
                'id'   => $prefix . 'seo_description',
                'type' => 'text',
            ),
		)
	);
    
    
	// Add other metaboxes as needed

	return $meta_boxes;
}

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once 'init.php';

}
