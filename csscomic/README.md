# CakePHP Application Skeleton

## Installation

You can now either use your machine's webserver to view the default home page, or start
up the built-in webserver with:

```bash
bin/cake server -p 8765
```

Then visit `http://localhost:8765` to see the welcome page.

## Configuration

Read and edit the environment specific `config/app_local.php` and set up the
`'Datasources'` and any other configuration relevant for your application.
Other environment agnostic settings can be changed in `config/app.php`.

## Localization

To scan your source code for translatable strings and update your PO files, use:
```bash
bin/cake i18n extract
```

## Running tests

This project provides separate test suites for fast unit tests and for integration tests that
require the full application bootstrap (and may run migrations). Use the unit suite for
quick feedback and the integration suite when you need database-backed tests.

### Unit tests (fast, no DB / migrations)

```bash
composer run test:unit
```

### Integration tests (full bootstrap, runs migrations)

```bash
composer run test:integration
```
