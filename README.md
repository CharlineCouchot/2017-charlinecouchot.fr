
<img src="wp-content/themes/editions-triades-2017/assets/images/logo.svg" width="300"/>

**Version 1.0.0** (13.09.2017)

## Où suis-je ?
Vous êtes sur le dépôt de la refonte 2017 du site des Editions Triades.

## Dépendances:
  * Node >= 0.12.x ([nodejs.org](https://nodejs.org/))
  * npm >=2.11.x (`npm install -g npm@latest`)
  * php >= 5.4.0

## Installation
Les projets WordPress devraient de manière générale, versionner le moins de choses possibles. Les fichiers de coeur et les médias devront être télécharger, respectivement depuis le site officiel de WordPress et depuis le serveur de preprod/prod du site, et ne doivent pas être versionnés, car ces fichiers évoluent et sont mis à jour fréquemment.
À des fins de développement, les extensions ont été incluses dans le versionnage, mais c'est une pratique controversée. **Il est préférable de vérifier sur le serveur de prod et/ou preprod si de nouvelles extensions sont installées car elles sont susceptibles de l'avoir été uniquement sur serveur distant, et non en local, et donc, ne seront pas versionnées.** Cela pourrait donc naturellement impacter négativement votre environnement local.

#### Vhost
Pour le développement en local, le fichier gulpfile.js (voir plus bas) utilise un vhost `local.editions-triades.com`. Il vous faudra donc le mettre en place chez vous.

#### Clone
Cloner le dépôt dans un dossier vide qui contiendra ensuite l'architecture WordPress.
  * `$ cd -your-wordpress-directory`.
  * `$ git clone git@gitlab.sdv.fr:wordpress/editions-triades.git .`

#### WordPress
  * Télécharger ([WordPress](https://wordpress.org/download/)) dans la langue de votre choix et le placer dans votre dossier de base.

#### Base de données
  * Pensez à récupérer une copie de la base de données du site de production et éventuellement adapter les informations contenues dans le fichier `wp-config.php` en fonction de votre installation. Il est préférable de conserver la même configuration locale afin de ne pas modifier le fichier wp-config.php pour chaque intervenant dans le projet.

#### Médias
  * Pensez également à récupérer une copie du dossier `wp-content/uploads/` sur le serveur de production pour avoir les images.

## Workflow

### Gulp

Ce projet utilise [gulp](https://gulpjs.com) pour compiler les ressources. Pour plus de détails, consultez le fichier `gulpfile.js`.
  * Installer gulp globalement avec `npm install -g gulp`
  * Dans le répertoire du thème, lancer la commande `npm install && gulp`
  * Utiliser gulp (commande `gulp` dans le répertoire du thème) pour compiler les ressources et lancer browserSync
  * **ÉVITEZ DE MODIFIER LA CONFIGURATION GULP**. Pour une meilleure continuité de développement, le fichier est pensé pour éffectuer des tâches simples. Ce fichier étant versionné, votre intervention sur celui-ci pourrait impacter le développement d'un autre intervenant.

### git-flow

Le projet est équipé d'un workflow de type git-flow. Cela signifie que dans la mesure du possible, il est préférable d'utiliser cette méthodologie pour les développements de fonctionnalités. Si vous n'êtes pas familiers avec la méthodologie git-flow, voici un exellent guide pour débuter : [cliquez ici](https://www.git-tower.com/learn/git/ebook/en/command-line/advanced-topics/git-flow). Pour le projet initial l'intégralité du développement sera fait sur la branche `develop`, sauf si deux intervenants doivent travailler en même temps. En quel cas, répartissez le travail et ouvrez des features.


## Usage

### Général
* La plupart des fichiers sont décrits en début de fichier. N'hésitez pas à lire et fournir de nouveaux renseignements en cas d'édition.

### Fichiers importants

##### Fonctions
* `functions-fronted.php` (fonctions et tags liés au frontend)
* `functions-backend.php` (fonctions et tags liés au backend)
* `functions-dev.php` (fonctions de développement)
* `functions-wpsetup.php` (préréglages de WordPress)
* `functions-posttypes.php` (instanciation des types de contenus personnalisés)
* `functions-widgets.php` (instanciation des zones de widgets et des widgets customisés)
* `functions-woocommerce.php` (fonctions et hooks de customisation pour les templates woocommerce qui ne peuvent pas être surchargés dans le dossier woocommerce)

##### CSS
* `style.css` (le fichier est OBLIGATOIRE à cet endroit pour le bon fonctionnement du thème. Cependant pour une organisation plus claire, il ne contient que les informations de thème, le reste des styles étant rangé dans styles-main.css)
* `assets/styles/styles-main.css` (styles principaux utilisés sur le front)
* `assets/styles/styles-admin.css` (styles de correction dans l'administration (cacher les pubs des plugins, etc.))
* `assets/styles/styles-editor.css` (styles de l'éditeur WYSIWYG)
* `assets/styles/styles-woocommerce.css` (styles WooCommerce. Voué à disparaître pour être intégré dans styles-main.css)

L'arborescence des fichiers SCSS est établie comme suit :
* Fichiers de compilation en racine du dossier `assets/styles/scss/`, compilés vers `assets/styles/`
* Chaque dossier de partiels contient un fichier `_all.scss` qui réunit tous les partiels dans ce dossier. C'est dans la plupart des cas ce fichier qui sera importé dans le fichier d'importation.
* `assets/styles/scss/vendor` contient les éléments de styles fabriqués par de tierces personnes (plugins, frameworks, etc)
* `assets/styles/scss/config` contient les fichiers de base pour Sass (variables, mixins) et pour le style en général (structure, textes basiques, icon-fonts)
* `assets/styles/scss/components` contient les composants réutilisables
* `assets/styles/scss/pages` contient une feuille de style par type de page et ses styles propres. Attention à éviter d'y mettre des composants réutilisables
* `assets/styles/scss/fixes` contient les feuilles de correction Print et IE.


##### Templates
* `template-home.php`   affiche la page d'accueil

Les templates WooCommerce, lorsqu'ils peuvent être surchargés, respectent obligatoirement l'aborescence du dossier `plugins/woocommerce/templates/` mais dans le dossier `woocommerce/` de ce thème.


### Responsive

#### Mixins/Classes
**mixins**
La maquette prévoit deux breakpoints (`$large:1195px` et `$small:683px`) qui sont appelés dans les fichiers scss avec les mixins suivants :
* max 683px `@include respond-to(small) {...}`
* max 1195px `@include respond-to(large) {...}`
* min 684px `@include respond-to(small-up) {...}`
* min 1196px `@include respond-to(large-up) {...}`

**classes**
Deux classes `hide_small` et `hide_large` sont disponibles et réalisent les actions suivantes :
```SCSS
.hide_large {
	// masqué en dessus de 684px;
}
.hide_small {
	// masqué au dessous de 683px
}
```
