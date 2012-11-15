# Integrate Composer in existing php application

Install [Composer] [1] in your existing application.
Tested on Ubuntu 11.x and 12.x
Follow the official [getting started] [2] guide for a more thorough and up to date introduction

## Install specific PHPUnit version through composer

Example 01:  
``` sh
cd composer-prototype/example_01_phpunit
```
In this example we want to use a specific version of PHPUnit: 3.7.7
The version currently installed with PEAR is running PHPUnit 3.7.9 

`tests\mytest.php` contains a simple assertion of the phpunit version
``` php
$this->assertEquals('3.7.7', PHPUnit_Runner_Version::id());
```
``` sh
phpunit tests/mytest.php
```
fails
``` 
1) MyTest::testEmpty
Failed asserting that two strings are equal.
--- Expected
+++ Actual
@@ @@
-'3.7.7'
+'3.7.9'
```

In `composer.json` we require that PHPUnit 3.7.7 is installed
``` json
{
    "require": {
        "phpunit/phpunit": "3.7.7"
    }
}
```

Then we run composer install
``` sh
composer install
```
Which downloads the specific version of PHPUnit in folder `vendor\phpunit`
Composer additionally adds a symlink file on phpunit executable at `vendor\bin\phpunit`

``` sh
vendor/bin/phpunit tests/mytest.php
```
now succeeds
```
PHPUnit 3.7.7 by Sebastian Bergmann.

.

Time: 0 seconds, Memory: 5.25Mb

OK (1 test, 1 assertion)
```

*NOTE:* Composer will also generate a composer.lock file that holds the version of packages that has been installed. It also holds the version of thoes packages dependencies packages
composer.lock is meant to be under version control so that next time anyone runs `composer install` is assured to have exactly the same version of each package


[1]: http://getcomposer.org "Composer Official Site"
[2]: http://getcomposer.org/doc/00-intro.md "Composer Getting Started"
