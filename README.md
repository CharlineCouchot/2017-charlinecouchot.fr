
<img src="wp-content/themes/cc2017/assets/img/cc2017-logo_final_bow.png" width="500"/>

**Version 1.0.0** (13.09.2017)

## Where am I ? / Où suis-je ?
You are currently browsing the repository for my personal portfolio, blog, and general private sandbox for all things WordPress, Git, Sass, Gulp, etc.
__Vous êtes actuellement en train de consulter le dépôt de mon portfolio, blog, et plus généralement mon bac à sable personnel pour toutes mes expérimentations WordPress, Git, Sass, Gulp, etc.__

## Requirements / Dépendances:
  * Node >= 0.12.x ([nodejs.org](https://nodejs.org/))
  * npm >=2.11.x (`npm install -g npm@latest`)
  * php >= 5.4.0

## Installation
#### Clone
Clone the repository in an empty folder that will contain the rest of the WordPress architecture.
__Cloner le dépôt dans un dossier vide qui contiendra ensuite l'architecture WordPress.__
  * `$ cd -your-wordpress-directory`.
  * `$ git clone git@gitlab.com:charlinecouchot/charlinecouchot-fr.git .`

#### WordPress
  * Download ([WordPress](https://wordpress.org/download/)) in you preferred language and place the files in your base directory
  * __Télécharger ([WordPress](https://wordpress.org/download/)) dans la langue de votre choix et le placer dans votre dossier de base__


#### Workflow
This project uses bower to manage vendors and [gulp](https://gulpjs.com) to compile assets. For details see `gulpfile.js`.
  * Install gulp and Bower globally with `npm install -g gulp bower`
  * in the theme directory run `npm install && bower install && gulp`
  * you can now use gulp (run `gulp` in your theme directory) to compile and optimize your asset files and run browserSync

__Ce projet utilise bower pour gérer les dépendances et [gulp](https://gulpjs.com) pour compiler les ressources. Pour plus de détails, consultez le fichier `gulpfile.js`.__
  * __Installer gulp et Bower globalement avec `npm install -g gulp bower`__
  * __Dans le répertoire du thème, lancer la commande `npm install && bower install && gulp`__
  * __Utiliser gulp (commande `gulp` dans le répertoire du thème) pour compiler les ressources et lancer browserSync__

<!---
## Usage

### General / Général
* All important files provide a description/version at the top. Make sure to read it first.

### Important Files/Folders

##### Functions
* `functions-access.php` (functions that control access to the site)
* `functions-backend.php` (backend related functions)
* `functions-dev.php` (functions used for development purposes)
* `functions-elements.php` (functions to output ACF flexible elements)
* `functions-wpsetup.php` (WordPress setup)

##### CSS
* `assets/styles/content.scss` (content related styles)
* `assets/styles/general.scss` (re-usable classes and settings)
* `assets/styles/main.scss` (gathers all .scss files for compiling with gulp)
* `assets/styles/nav.scss` (navigation)
* `assets/styles/essentials.scss` (required SASS functions and all presets for responsive, **this file is not meant to be changed**)
* `assets/styles/vars.scss` (manages scaling, all colors, fonts and other presets)



##### Templates
The Wordpress default templates (like page.php, single.php) receive their content from the associated file inside the template folder. This way all templates are grouped together. `index.php` is forwarded to `page.php`.

* `str-footer.php`      footer content that shows up at the bottom of the page (this is content, don't mix this up with `footer.php`)
* `str-elements.php`    template for ACF flexible elements
* `temp-home.php`       displays default content and a full width teaser image
* `temp-subsites.php`   displays default content and content of the respective child pages
* `wp-home.php`         WP blog default
* `wp-page.php`         WP page default
* `wp-single.php`       WP post default

All templates are seperate into three categories recognizable by their prefix:
* **`wp`**: wordpress default templates.
* **`temp`**: individual site templates.
* **`str`**: structure files that have to be included in other sites or the main structure.


### Responsive/Fluid presets

#### Scaling
By default, the layout will scale with the viewport-width as all units are `rem` based and `html` uses font-size as the root unit.
This scaling can be configured at the `SIZE/SCALING` section in `vars.scss`. It is also possible to stop the scaling at a certain viewport-width. See instructions inside `vars.scss`.

#### Mixins/Classes
**defined by variables**
* The width of the two available variables `mobile` and `desktop` are defined in vars.scss. Usage (with default values):
* min 800px `@include desktop {...}`
* max 799px`@include mobile {...}`

**defined by individual pixel widths**
* at least 750px: `@include vpw_min(750px)`
* at most 500px: `@include vpw_max(500px)`
* between 1000px and 1200px: `vpw(1000px, 1200px)`

**defined by ascepct-ratio**
* at least 16:9: `@include asr_min(16,9) { ... }`
* at most 4:3: `@include asr_max(4,3) { ... }`

**defined by css-class**
the two available classes `mobile` and `desktop` perform as followed (with default values):
```SCSS
.desktop {
	// hidden while < 800px;
}
.mobile {
	// hidden while > 799;
}
```


## About
Author: Flurin Dürst

Contact: [flurin@flurinduerst.ch](mailto:flurin@flurinduerst.ch)

Twitter: [@flurinduerst](https://twitter.com/flurinduerst)

### Contribution
* Fork it
* Create your feature branch
* Commit your changes
* Push to the branch
* Create new Pull Request

Feel free to contact me if you have questions or need any advice.

### License
WPDistillery is released under the MIT Public License.

Note: The "About" section in `README.md` and the author (`@author`) notice in the file-headers shall not be edited or deleted without permission. For Details see [License](LICENSE.md). Thank you. --W
