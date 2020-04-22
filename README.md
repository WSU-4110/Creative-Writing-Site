# Automate PHP Build with Apache Ant

This is an example PHP project using Apache Ant for automating the build process.
It orchestrates the execution of several software quality and metric tools defined in 
the `build.xml` build script like:
 
- Perform syntax check of PHP sourcecode files using php's lint-mode
- Measure project size using [PHPLOC][PhpLoc]
- Calculate software metrics using [PHP_Depend][PhpDepend]
- Perform project mess detection using [PHPMD][PhpMd]
- Find coding standard violations using [PHP_CodeSniffer][PhpCodeSniffer]
- Find duplicate code using [PHPCPD][PhpCpd]
- Run unit tests with [PHPUnit][PhpUnit]
- Generate project documentation using [phpDox][PhpDox]
- Log results in several formats for later use with [Jenkins CI][jenkins] 

This project is also part of a proof of concept called "Continuous Integration and Deployement for
PHP projects" which uses Jenkins as CI server.

You can find more information about this project at <https://github.com/code-smell/php-automate-build-ant>.

## Requirements

In order to work the following requirements have to be installed properly.

- [Git][git] - a distributed version control system 
- [Apache Ant][ant] - a command-line build tool

Please refer to the appropriate documention which guides you through the installation process.

## Ant Targets

Here is an overview of the tasks defined in the above build.xml (download) script that are intended to be directly invoked:

- `full-build` is the default build target. It invokes all the tools in such a way that XML logfiles are written to default locations. Running the full build may take a considerable amount of time and might only be useful to perform nightly.
- `full-build-parallel` is the same as full-build (see above) except that it executes the static analysis tools in parallel. Even when leveraging multiple CPUs, running the full build may take a considerable amount of time and might only be useful to perform nightly.
- `quick-build` is a build target intended to be run by jobs that are triggered for every push to a repository. It performs a lint check and runs the tests (without generating code coverage reports).
- `clean` can be used to clean up (delete) all build artifacts (logfiles, etc. that are produced during the build).
- `lint` can be used to perform a syntax check of the project sources using php -l. This task can be used before committing.
- `phpcs` can be used to find coding standard violations and print human readable output. This task can be used before committing.
- `phpcpd` can be used to find duplicate code and print human readable output. This task can be used before committing.
- `phpmd` can be used to perform project mess detection and print human readable output. This task can be used before committing.
- `phpunit` can be used to run unit tests. This task can be used before committing.
- `phpdox` can be used to generate project documentation.
- `phploc` can be used to measure the project size.

The other tasks can also be invoked directly but this isn't the intended purpose. They are invoked by the tasks listed above.

## How to

Please use the following commands to clone the project and start the default target. 

    $ git clone https://github.com/code-smell/php-automate-build-ant.git
    $ cd example-project
    $ ant

## Build Artifacts

Executing the build.xml script will produce the following build artifacts:

    build
    |-- api ...
    |-- coverage ...
    |-- logs
    |   |-- checkstyle.xml
    |   |-- clover.xml
    |   |-- crap4j.xml
    |   |-- jdepend.xml
    |   |-- junit.xml
    |   |-- phploc.csv
    |   |-- phploc.xml
    |   |-- pmd-cpd.xml
    |   `-- pmd.xml
    |-- pdepend ...
    `-- phpdox ...

These artifacts can be read by human or could be processed by Jenkins CI.


[git]: https://git-scm.com
[ant]: http://ant.apache.org
[jenkins]: https://jenkins.io
[composer]: https://getcomposer.org
[PhpCodeSniffer]: https://github.com/squizlabs/PHP_CodeSniffer
[PhpUnit]: https://phpunit.de
[PhpCpd]: https://github.com/sebastianbergmann/phpcpd
[PhpDox]: http://phpdox.de
[PhpDepend]: https://pdepend.org
[PhpLoc]: https://github.com/sebastianbergmann/phploc
[PhpMd]: https://phpmd.org
