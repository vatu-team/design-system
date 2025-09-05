# Design System Plugin

[![Commit](https://github.com/vatu-team/design-system/actions/workflows/commit.yml/badge.svg)](https://github.com/vatu-team/design-system/actions/workflows/commit.yml)

## Introduction


## [Documentation](https://github.com/vatu-team/design-system/blob/trunk/docs/readme.md)

### Directory Structure

The aim of the directory structure for this plugin is to keep everything well-organized.

```bash
├── .github
├── assets
│   ├── css
│   ├── fonts
│   │── js
│   └── svg
├── build
├── src
│   ├── Application
│   ├── Domain
│   ├── Infrastructure
│   │── Plugin.php
│   └── PluginFactory.php
├── tests
├── tools
├── vendor
├── package.json
└── composer.json
```

- `/.github/`
- `/assets/` Compiled assets such as CSS, Fonts, JavaScript, and SVG.
- `/build/` Compiled block assets.
- `/src/`
  - `/src/Application/` Exposes the functionality of the domain to other application layers as hooks and filters (an API).
  - `/src/Domain/` Modules of code based upon the business needs
    - `/src/Domain/Service` A layer which aims to organize the services ito a set of logical layers. Services within a layer share a smilar set of activities.
      - `/src/Domain/Service/Prover.php`
      - `/src/Domain/Service/Service.php`
  - `/src/Infrastructure/`
  - `/src/Plugin.php` This file is respobnsible for loading and instantiating one or more `ServiceProvider` objects.
  - `/src/PluginFactory.php`
- `/tests/` Project tests and configutation related to testing the projects.
- `/tools/` Development tools not specific to the project.
- `/design-system.php` Bootstrap file for WordPress to load.
- `/composer.json` Configuration for our PHP dependencies.
- `/package.json` Configuration for our Node/NPM dependencies.

### Install

```sh
composer require vatu/design-system --dev
```

### Development

- `npm run wp-env start` – Start the development environment
- `npm run wp-env start -- --xdebug` – Start the development environment with xDebug configured
- `npm run wp-env stop` – Stop the development environment
- `npm run wp-env distroy` – Distroy the development environment
- `npm run wp-env run {env} wp shell` -

## Reporting Issues

If you spot any issues please create a ticket via the project's Issue Tracker. Including the issue, the browser and operating system, and how to replicate it. If the issue is security related please use the contact information below.

## Coordinated Disclosure

Keeping user information safe and secure is a top priority, and we welcome the
contribution of external security researchers. If you believe you've found a
security issue in software that is maintained in this repository, please read
[SECURITY](https://github.com/vatu-team/design-system/blob/trunk/security.md) for instructions on submitting a vulnerability report.

## Contact

Vatu - [hello@vatu.dev](hello@vatu.dev)

## Copyright

© 2025 Vatu Limited and licensed for use under the terms of the
GPL-3.0 License. Please see [LICENSE](https://github.com/vatu-team/design-system/blob/trunk/license.txt) for more information.
