# [DEPRECATED] CMB Field Type: Gallery

## IMPORTANT - this project is no longer supported

CMB2's [`file_list`](https://github.com/CMB2/CMB2/wiki/Field-Types#file_list) provides similar functionality and is probably the way to go.

I've written a quick tool to [convert existing data from the `pw_gallery` to `file_list`](https://gist.github.com/mustardBees/fc4ffb920064d34f4f17) format.

## Description


Gallery field type for [CMB2](https://github.com/WebDevStudios/CMB2 "Custom Metaboxes and Fields for WordPress 2").

**Running an older version of CMB? Check the [previous releases](https://github.com/mustardBees/cmb-field-gallery/releases).**

## Installation

You can install this field type as you would a WordPress plugin:

1. Download the plugin
2. Place the plugin folder in your `/wp-content/plugins/` directory
3. Activate the plugin in the Plugin dashboard

Alternatively, you can place the plugin folder in with your theme/plugin. After you call CMB:

```php
require_once 'init.php';
```

Add another line to include the `cmb-field-gallery.php` file. Something like:

```php
require_once 'cmb-field-gallery/cmb-field-gallery.php';
```

## Usage

`pw_gallery` - Save a list of attachment IDs. Example:

```php
array(
	'name' => 'Gallery Images',
	'desc' => 'Upload and manage gallery images',
	'button' => 'Manage gallery', // Optionally set button label
	'id'   => $prefix . 'gallery_images',
	'type' => 'pw_gallery',
	'preview_size' => array( 150, 150 ),
	'sanitization_cb' => 'pw_gallery_field_sanitise',
),
```

## Screenshots

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
