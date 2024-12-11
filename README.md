# Auto_dir_listing_script
PHP script / index.php file that auto generates a directory where ever it is placed


# Auto Directory Generator (index.php)

## Overview
The Auto Directory Generator is a PHP script (`index.php`) paired with a support directory (`index`) that automatically generates a styled and customizable HTML file displaying a list of files and folders in any specified directory. This solution is ideal for creating dynamic directory listings with breadcrumb navigation and simple file/folder organization.

## Structure
The script relies on the following:

1. **`index.php`**: The main script that handles the generation of the directory listing.
2. **`index` Directory**: A folder containing assets and components required by `index.php`. It has the following subdirectories:
   - **`/index/imgs`**: Contains images used in the generated output (e.g., icons, logos).
   - **`/index/pg_prts`**: Contains reusable page parts, such as headers (`head.inc.html`) and footers (`ftr.inc.html`).
   - **`/index/styles`**: Contains CSS stylesheets to define the appearance of the generated HTML.

## Installation
1. Copy the **`index`** directory to the document root of your server. Ensure it retains its structure and contents.
2. Place the **`index.php`** file in any directory where you want to enable automatic directory listing.

## Usage
- After installation, navigate to the directory where `index.php` is located via your web browser.
- The script will:
  1. Display a breadcrumb navigation path for the current directory.
  2. List all files and folders in the directory with clickable links.
  3. Style the output using the assets and styles in the `/index` directory.

### Example
If you place the `index.php` file in `/var/www/html/projects`, visiting `http://yourdomain.com/projects` will generate a dynamic listing of all files and folders in the `projects` directory.

## Customization
1. **Styling**:
   - Modify CSS files in `/index/styles` to change the look and feel of the directory listing.
2. **Headers and Footers**:
   - Edit the `head.inc.html` and `ftr.inc.html` files in `/index/pg_prts` to customize the header and footer sections.
3. **Breadcrumb Appearance**:
   - The breadcrumb navigation can be adjusted by modifying the relevant PHP code in `index.php`.

## Notes
- Ensure your web server has read permissions for the directories and files to be listed.
- To prevent unwanted directories from being listed, you can use `.htaccess` or file permissions to restrict access.

## Future Enhancements
- Add support for additional customization options through a configuration file.
- Include themes for easier style changes.

## License
This script is free to use and modify. Attribution is appreciated but not required.

