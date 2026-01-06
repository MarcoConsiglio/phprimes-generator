# Changelog
## Unreleased v1.2.0 - 2026-01-06
### Added
- `IntegerListIterator` to process a list of safe integers to be stored in an `int` type variable.
- `MaximumIntegerIteratorValueReached` exception, thrown when `IntegerListIterator` tries to go beyond `PHP_INT_MAX`.
### Changed
- README documentation.
- API documentation.
### Fixed
- bug-#4 using `IntegerListIterator` instead of `ListIterator`.

## v1.1.0 - 2026-01-05
### Added
- Several classes from [drupol/primes-bench](https://github.com/drupol/primes-bench) repo.
### Changed
- API Documentation
### Fixed
- [#2](https://github.com/MarcoConsiglio/phprimes-generator/issues/2): Can't install v1.0.0 as a stable dependency.

## v1.0.0 - 2026-01-05
### Added
- `OptimusPrime` endpoint to generate primes number.
- README documentation.
- API documentation.