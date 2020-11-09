<?php

add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types() {

  // Check function exists.
  if( function_exists('acf_register_block_type') ) {

    // register book blocks
    acf_register_block_type(array(
      'name'              => 'shelf',
      'title'             => __('Shelf'),
      'description'       => __('A readingroom shelf block.'),
      'render_template'   => 'partials/blocks/shelf.php',
      'category'          => 'formatting',
      'icon'              => 'book',
      'keywords'          => array( 'book', 'library' ),
    ));
  }
}

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5f842effa4983',
	'title' => 'Book Block',
	'fields' => array(
		array(
			'key' => 'field_5f842f319cbff',
			'label' => 'Title',
			'name' => 'title',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5f842f4e9cc02',
			'label' => 'ISBN',
			'name' => 'isbn',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
    array(
      'key' => 'field_5f842f639cc04',
      'label' => 'Link',
      'name' => 'link',
      'type' => 'text',
      'instructions' => 'Link to Waterstones',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
    ),
    array(
			'key' => 'field_5f843259b3816',
			'label' => 'Category',
			'name' => 'category',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'toddlers' => 'For toddlers',
				'under_five' => 'For under fives',
				'over_five' => 'For over fives',
			),
			'default_value' => false,
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'return_format' => 'array',
			'ajax' => 0,
			'placeholder' => '',
		),
		array(
			'key' => 'field_5f842f559cc03',
			'label' => 'Cover',
			'name' => 'cover',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
			'preview_size' => 'medium',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/book',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

endif;
