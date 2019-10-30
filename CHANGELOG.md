# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/en/1.0.0/) and this project adheres to [Semantic Versioning](http://semver.org/spec/v2.0.0.html).

## [Unreleased]

## [2.0.0] - 2019-10-30
### Changed
* Removed Laravel 5 support, added Laravel 6 support ([#15](https://github.com/sixlive/laravel-json-schema-assertions/pull/15))

## [1.2.0] - 2019-10-30
### Added
* Added support for PHPUnit 8 ([#14](https://github.com/sixlive/laravel-json-schema-assertions/pull/14))

## [1.1.0] - 2019-02-27
### Added
* Larave 5.8 to the CI process ([#13](https://github.com/sixlive/laravel-json-schema-assertions/pull/13))

### Changed
* Added a return type hint to `setUp` required by phpunit 8 and Laravel's test case ([#13](https://github.com/sixlive/laravel-json-schema-assertions/pull/13))


## [1.0.0] - 2019-02-24
### Changed
* Updated to use [sixlive/json-schema-assertions](https://github.com/sixlive/json-schema-assertions) under the hood ([#11](https://github.com/sixlive/laravel-json-schema-assertions/pull/11)]

## [0.4.0] - 2018-09-04
### Added
* Support for chainable assertions ([#6](https://github.com/sixlive/laravel-json-schema-assertions/pull/6))

## [0.3.0] - 2018-07-22
### Added
* Support for resolving schemas using a config base path

## [0.2.0] - 2018-07-17
### Changed
* Changed method name from `assertMatchesJsonSchema` to `assertJsonSchema`
* Moved PHPUnit to a required dependency rather than a dev dependency

### Added
* Added support for loading schemas from an array
* Added support for loading schemas from a file as a path
* Added support for loading schemas as JSON

## [0.1.0] - 2018-07-04
Initial Release
