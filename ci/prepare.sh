#!/bin/bash

set -ex

# Download Composer dependencies
composer install --prefer-dist --no-suggest --optimize-autoloader -q
