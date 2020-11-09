<?php

/**
 * Book Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Load values and assign defaults.
$title = get_field('title') ?: 'Book title...';
$isbn = get_field('ISBN') ?: 'ISBN';
$image = get_field('cover');
$url = get_field('link');
$cat = get_field('category');
?>

<?php do_action('_gw_dump', $cat); ?>
<div class="m-book">
    <a href="<?php echo $url; ?>">
        <?php echo wp_get_attachment_image( $image, 'thumbnail' ); ?>
        <h2><?php echo $title; ?></h2>
    </a>
</div>
