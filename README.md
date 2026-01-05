![GitHub License](https://img.shields.io/github/license/MarcoConsiglio/phprimes-generator)
![GitHub Release](https://img.shields.io/github/v/release/MarcoConsiglio/phprimes-generator)
![Static Badge](https://img.shields.io/badge/current_version-v1.1.0-white)
<br>
![Static Badge](https://img.shields.io/badge/6%25-rgb(166%2C%2038%2C%2051)?label=Line%20coverage&labelColor=rgb(255%2C255%2C255))
![Static Badge](https://img.shields.io/badge/10%25-rgb(166%2C%2038%2C%2051)?label=Branch%20coverage&labelColor=rgb(255%2C255%2C255))
![Static Badge](https://img.shields.io/badge/6%25-rgb(166%2C%2038%2C%2051)?label=Path%20coverage&labelColor=rgb(255%2C255%2C255))

# PHPrimes Generator
A PHP primes number generator originally created by [*Pol Dellaiera*](https://github.com/drupol) in its [drupol/primes-bench](https://github.com/drupol/primes-bench) repo.

# Installation
```
composer require marcoconsiglio/phprimes-generator
```

# Usage
`OptimusPrime` is the library endpoint to use the [`Prime3` class](https://github.com/drupol/primes-bench/blob/master/src/Primes3.php) which is the best performing prime number generator written by *Pol Dellaiera*.

Keep in mind that:
- the generator in question continues forever, so it is highly recommended to set a limit (by default it is the first 500 prime numbers);
- random access is not possible, like in `$primes[$i]`;
- you cannot rewind the generator, so you must instatiate it again in order to start over.

```php
use MarcoConsiglio\PHPrimesGenerator\OptimusPrime;

// Generate the first 5 prime numbers.
$primes = new OptimusPrime(5)->generate();
// For older PHP versions use this
// $primes = (new OptimusPrime(5))->generate();
foreach($primes as $number) {
    echo $number.PHP_EOL;
}
```
```
2
3
5
7
11

```
## Generate to file
Do you rapidly need primes number on a text file? Uncomment the test method `OptimusPrimeTest::test_record_primes_numbers_to_file()`, set a `$limit` of your preference and launch the same test method with:
```bash
vendor/bin/phpunit --filter=test_record_primes_numbers_to_file
```
You will find your file in [`prime_numbers.txt`](prime_numbers.txt);

# API documentation
You can find API documentation in [`docs/html`](docs/html/index.html).
