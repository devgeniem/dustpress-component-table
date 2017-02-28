# DustPress component table

# Installation

We recommend that you install DustPress component with Composer, but it is also possible to do it manually.

# Composer

```$ git clone devgeniem/dustpress-component-boilerplate```

Or add it into your composer.json

```
{
	"require": {
		"devgeniem/dustpress-component-boilerplate": "*"
	}
}
```


# Component details
description: describe plugin main functionalities

# Usage
- activate parent plugin devgeniem/dustpress-components plugin
- create advanced custom fields clone field
  -- clone field "dpc_flexible_field"
- add your own component plugin

## File structure
```
├── assets/
│   ├── scripts/
│   │   ├── main.js
│   │   └── plugin.js
│   └── styles/
│       ├── main.scss
│       ├── _defaults.scss
│       ├── _colors.scss
│       ├── _utils.scss
│       └── _gc-component-name.scss
├── dist/
│   ├── plugin.js
│   └── plugin.css
├── languages/
│   ├── component-textdomain.pot
│   ├── fi.po
│   └── fi.mo
├── node_modules/
│   └── ...
├── component-componentname.dust
├── composer.json
├── package.json
├── plugin.php
├── readme.md
└── webpack.config.js
```

## Overriding component dust templates
Create same name dust template in project folder

## Assets
run npm
`npm install`
run webpack to compile assets
`webpack`
Develope component specific sass files


## Translations
1. set component text domain in plugin header `Text Domain: dpc-component-name`
2. translate component labels
3. Scan component for translatable strings
4. Name files likewise
```
pot-file: component-textdomain.pot
po-file: fi.po
mo-file: fi.mo
```
