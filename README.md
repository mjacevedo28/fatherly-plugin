# Fatherly Plugin

## Description
This plugin creates a shortcode that can be used by the user to add srcset attributes along with all other image attributes to an image tag. 

## Installation
### Manual Installation
**1.** Download the .zip file
**2.** Unarchive the .zip file in the wp-content/plugins folder of your Wordpress directory
**3.** Log in to the backend of your Wordpress site
**4.** Navigate to the plugins page and find the "Fatherly Srcet Plugin"
**5.** Click "Activate" and you're all set!

### Automated Installation
**1.** Download the .zip file
**2.** Log in to the backend of your Wordpress site
**3.** Navigate to the plugins page and click "Add New"
**4.** Click "Upload Plugin"
**5.** Click "Choose File" and upload the .zip file you downloaded
**6.** After installation completes, click "Activate," and you're all set!

## Instructions 
You can place this in place of wherever you would want your image tag in your page/post. The shortcode will accept any of the normal attributes that you would normally add to an image tag. 

The shortcode works with the following format:
````html
[fatherlyplugin attribute="attribute-value" attribute2="attribute2-value" etc...]
````
Specifically for your srcset attribute: you can add the widths you want available to the browser in the following format: ```` width="100, 200, 300, etc..."````

This plugin assumes all your images are full-width, and that you use an image resizing service that can change the widths of images by adding a "?w=" parameter to the source URL. 

For example:
````html
[fatherlyplugin url="http://www.example.com/original-image.jpg" width="200,300,480" class="class1 class2 class3" alt="Example Image" title="Example"]
````
 
Will output:

````html
	<img src="http://www.example.com/original-image.jpg" 
	srcset="http://www.example.com/original-image.jpg?w=200 200w,
	http://www.example.com/original-image.jpg?w=300 300w,
	http://www.example.com/original-image.jpg?w=480 480w" 
	sizes="100vw" class="class1 class2 class3" 
	alt="Example Image" title="Example" />
````