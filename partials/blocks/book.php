<?php

/**
 * Book Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'book-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'book';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$title = get_field('title') ?: 'Book title...';
$isbn = get_field('ISBN') ?: 'ISBN';
$author = get_field('author') ?: 'Author name';
$summary = get_field('summary') ?: 'Book summary';
$desc = get_field('description') ?: 'Book description';
$image = get_field('cover') ?: 295;
$url = get_field('link') ?: 'https://www.waterstones.com/';
$cat = get_field('catergory') ?: 'toddlers';


?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
  <h1><?php echo $title; ?></h1>
  <span class="book-author"><?php echo $author; ?></span>
  <span class="book-isbn"><?php echo $isbn; ?></span>
  <span class="book-url"><?php echo $url; ?></span>
  <span class="book-category"><?php echo $cat; ?></span>

  <div class="book-summary">
    <?php echo $summary; ?>
  </div>

  <div class="book-description">
    <?php echo $desc; ?>
  </div>

    <div class="cover-image">
        <?php echo wp_get_attachment_image( $image, 'full' ); ?>
    </div>
</div>
