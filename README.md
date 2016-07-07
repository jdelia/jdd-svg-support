# [JDD SVG Support Plugin](https://jackiedelia.com/) 

[JDD SVG Support Plugin](https://github.com/jdelia/jdd-svg-support) is a simple plugin that embeds SVG code into your WordPress content via a shortcode. 

##UNDER DEVELOPMENT - NOT READY FOR USE

## Getting Started

To begin using this plugin, choose one of the following options to get started:
* [Download the latest release on Github](https://github.com/jdelia/jdd-svg-support)
* Clone the repo: `git clone https://github.com/jdelia/jdd-svg-support.git`
* Fork the repo

## How to Use

Upload your SVG file(s) to your child theme `images` folder. If you don't have an images folder, just create one and copy the files into the folder. The shortcode has 3 attributes; the filename, the class (optional) and the path to the folder (optional). 

In your content, use the shortcode:

Format:  

[insert-svg-code file="name of file without extension" class="classname"]

The only required attribute is the filename. 

If you do not specify a class="" attribute, a default class of `inline-svg` is added to a `<div>` tag. You can add more than one class if desired.

If you do not specify a path, the default is used which is the images folder in the child theme root. 

Example:
[insert-svg-code file="svg-logo" class="logo svg-file"]

You can use the `shortcode_atts_{$shortcode}` filter to programmatically change the defaults.

Example: 

```
add_filter( 'shortcode_atts_insert-svg-code', 'update_svg_defaults', 10, 4);
function update_svg_defaults( $merge_attributes, $defaults, $attributes, $shortcode ) {
   
   $attributes['path'] = '  << insert your absolute path to folder with trailing slash >>  ';

   $merge_attributes = array_merge( $defaults, $attributes );
 
   return $merge_attributes;
}
```
 

## Bugs and Issues

Have a bug or an issue with this template? [Open a new issue](https://github.com/jdelia/jdd-svg-support) here on GitHub.

## Creator

This plugin was created by [Jackie D'Elia](https://jackiedelia.com). 

* https://twitter.com/jdelia
* https://github.com/jdelia

## Copyright and License

Copyright 2016 Jackie D'Elia. Code released under the [GPLv2](https://github.com/jdelia/jdd-svg-support/blob/master/LICENSE) license.

