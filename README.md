# WP Boilerplate

This repository contains some tools you need to start building a modern WordPress theme.

```
                            _  _
Maintained by              | || |
 _ __    __ _   ___    ___ | || |__       ___   ___   _ __ ___
| '_ \  / _` | / _ \  / __|| || '_ \     / __| / _ \ | '_ ` _ \
| | | || (_| || (_) || (__ | || |_) | _ | (__ | (_) || | | | | |
|_| |_| \__, | \___/  \___||_||_.__/ (_) \___| \___/ |_| |_| |_|
         __/ |
        |___/    Feel free to touch me at contact@ngoclb.com

```

## Requirements

- [Node.js](http://nodejs.org/)
- [NPM](https://www.npmjs.com/) or [Yarn](https://yarnpkg.com/lang/en/)
- [Docker](https://www.docker.com/) and [Docker Compose](https://docs.docker.com/compose/install/)
- [WP-CLI](https://wp-cli.org) (optional)
- [Deployer](https://deployer.org) (optional)

## Usage Demo

- [Setup a stand-alone project](https://youtu.be/X26GtB1r5NU)
- [Deploy a local website to host with Deployer](https://youtu.be/HNai59M4DsQ)

## Get Started

First, install `create-project` if you don't have it

```
$ npm install -g create-project
```

### Create new project

```
$ create-project your-project-name lbngoc/wp-boilerplate
$ cd your-project-name
```

### Install development dependencies

```
$ npm install
```

### Setup Wordpress site and theme

>>> If you want to run this project as stand alone project, run this command first
>>>
>>> ```
>>> $ mv docker-compose.standalone.yml docker-compose.override.yml
>>> ```
>>>
>>> Either you need to make sure your current [**devbox**](https://github.com/lbngoc/devbox) network has already started

Open your `.env` file and change your project details, after that run this command to start setup process

```
$ npm run setup
```

## Development

>>> We use **Docker4WordPresss** to init development environment.
>>>
>>> For more informations, you can find [at here](#references)

To start development

```
$npm run serve
```

To build theme

```
$ npm run build
```

## Deployment

Edit your host details inside `hosts.yml`

For deploy a new release to your host

```
dep deploy
```

If you only need update wp-content folder

```
dep deploy:update_code

```

Some useful deploy tasks to synchronize between local and host

```
 pull
  pull:db             Download database from host and import to local
  pull:media          Download media files from host
  pull:plugins        Download plugins from host
  pull:theme          Download only activate theme from host
  pull:themes         Download themes from host
 push
  push:db             Upload and import local database to host
  push:media          Upload media files to host
  push:plugins        Upload plugins to host
  push:theme          Upload only activate theme to host
  push:themes         Upload themes to host
```

## References

- [docker4wordpress - Docker-based WordPress stack](https://github.com/wodby/docker4wordpress)
- [Sage - WordPress starter theme with a modern development workflow](https://github.com/roots/sage)
- [sage-8-webpack](https://github.com/drdogbot7/sage-8-webpack)
- [Deployer — Deployment Tool for PHP](https://deployer.org/)

Insert this to `wp-config.php`
```
/** If project use deployer **/
define('DEPLOYER_DIR', ABSPATH.'../current');
if (is_link(DEPLOYER_DIR)) {
    define('WPMU_PLUGIN_DIR', realpath(DEPLOYER_DIR) . '/mu-plugins');
}
```