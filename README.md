=== KISS Show Post ID Admin ===
Contributors: yourname  
Tags: post id, admin column, post type, sortable, custom post type, admin UI  
Requires at least: 5.0  
Tested up to: 6.5  
Requires PHP: 7.0  
Stable tag: 1.1.1  
License: GPLv2 or later  
License URI: https://www.gnu.org/licenses/gpl-2.0.html  

A lightweight plugin that adds a sortable post ID column to the far right of the admin post/page/custom post type lists. Clean and simple.

== Description ==

**KISS (Keep It Simple, Stupid)** Show Post ID Admin adds a clean and sortable "ID" column to the WordPress admin post list tables—works for all post types including custom ones like `machine_specs`.

= Features =

- Adds a new **sortable Post ID column** to the admin list tables
- Works with all post types (posts, pages, and any UI-visible CPT)
- Lightweight: No settings, no UI clutter
- Skips activation if **Admin Columns Pro** is active (to avoid duplication)

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/kiss-show-post-id-admin/` directory, or install through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress.
3. That’s it! You’ll see a new sortable “ID” column on the far right.

== Frequently Asked Questions ==

= Will it work with my custom post type? =  
Yes! It works with all post types that are visible in the admin (i.e. registered with `show_ui => true`).

= Is the ID column sortable? =  
Yes. You can click the "ID" column to sort ascending/descending.

= What if I use Admin Columns Pro? =  
This plugin will deactivate itself on activation if Admin Columns Pro is already active.

== Changelog ==

= 1.1.1 =
* Fixed: Post ID column wasn’t appearing for some CPTs like `machine_specs` due to late hook timing.
* Now hooks into `admin_init` for reliable registration.

= 1.1.0 =
* Added support for sorting by Post ID column.

= 1.0.0 =
* Initial release. Adds Post ID column to admin for all UI-visible post types.

== Upgrade Notice ==

= 1.1.1 =
Fixed compatibility with custom post types (CPTs) like `machine_specs`.

== License ==

This plugin is free software licensed under the GPL v2 or later.
