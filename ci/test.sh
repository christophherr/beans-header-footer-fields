#!/bin/bash

set -ex

# Coding standards
composer run-phpcs

# Unit tests, maybe integration tests
composer run-tests
