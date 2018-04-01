#!/bin/bash

set -ex

# Download Composer dependencies
composer install --prefer-dist --no-suggest --optimize-autoloader -q

# install WordPress test suite
if [[ -z $WP_VERSION ]]; then
    WP_VERSION="latest"
fi

bin/install-wp-tests.sh wordpress_test root '' localhost $WP_VERSION
