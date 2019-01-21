# IM Team Page Changelog
All notable changes to this project will be documented in this file.
This project adheres to [Semantic Versioning](http://semver.org/).

### To Do:
- Add a post-install prompt to select layout style
- Add setting to toggle default CSS on/off (/func/[option + shortcode].php)
- For the love of Christ, clean up (/assets/team.css). It's fugly.

_ _ _

## [1.1.1] - 2018-12-12
#### Fixed
- Fancybox loading spinner now actually spins instead of just shaking about

## [1.1] - 2018-12-12
#### Added
- Setting to upload default image to be used when there is no featured image selected

## [1.0] - 2018-7-12
#### Added
- Layout files can be overwritten via an 'im-teampage' directory in your theme

#### Fixed
- Traded Featherlight for Fancybox 3
- Default CSS is more generic / adaptable (affects Fancy layout)

## [0.2.1] - 2018-5-24
#### Fixed
- Wrapped [im-teampage] in output buffer so the_content()'s positioning will behave

## [0.2] - 2018-4-27
#### Added
- Modest Grid layout, basically an Isotope-less version of the Fancy layout

#### Fixed
- WP-Featherlight plugin detection (disables our Featherlight if present)
- Custom sort order now available for Fancy layout

## [0.1.3] - 2017-10-12
#### Added
- Prev/Next arrows on popup bios

#### Fixed
- Centralized version of Featherlight (no longer relies on theme)
- Now defaults to Modest layout if setting isn't changed after installation

## [0.1.2] - 2017-08-16
#### Added
- Sort order options for Modest layout [rand / custom]

#### Fixed
- team body class was applying to every page, much to my chagrin


## [0.1.1] - 2017-08-15
#### Added
- location parameter for Modest layout shortcode [im-teampage location='xxx']


## [0.1.0] - 2017-06-23
#### Added
- lightbox bios option
- single team member template (fancy layout popups)
- body class for easier targeting (.im_team_page)
- conditional booking button for popups w/ custom URL

#### Fixed
- settings page by, like, a lot
- some CSS here + there
- general loop logic


## [0.0.5] - 2017-06-07
#### Fixed
- JS Isotope methods (now correctly destroys layout before reloading)
- various CSS typography things


## [0.0.31] - 2017-05-09
#### Added
- Modest layout
- Advanced Custom Fields

#### Changed
- Assets load order


## [0.0.1] - 2017-02-23
#### Added
- The plugin. Hello world!
