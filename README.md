# CMB Field Type: Gallery

## Description

Gallery field type for [Custom Metaboxes and Fields for WordPress](https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress).

## Usage

`pw_gallery` - Save a list of attachment IDs. Example:

```php
array(
	'name' => 'Gallery Images',
	'desc' => 'Upload and manage gallery images',
	'button' => 'Manage gallery', // Optionally set button label
	'id'   => $prefix . 'gallery_images',
	'type' => 'pw_gallery',
),
```

## Screenshot

![Image](screenshot-1.png?raw=true)

![Image](screenshot-2.png?raw=true)

## To-do
* Add a clear gallery button

## Example front-end output

```php
<?php $gallery_images = get_post_meta( get_the_ID(), '_cmb_gallery_images', true ); ?>
<?php if ( ! empty( $gallery_images ) ) : ?>
	<ul>
		<?php foreach ( $gallery_images as $gallery_image ) : ?>
			<li><?php echo wp_get_attachment_image( $gallery_image, 'thumbnail' ); ?></li>
		<?php endforeach; ?>
	</ul>
<?php endif; ?>
```