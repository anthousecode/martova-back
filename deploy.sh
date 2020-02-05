#!/bin/bash

# RUN TESTS
php vendor/bin/codecept run tests/acceptance/*
php vendor/bin/codecept run tests/unit/*
php vendor/bin/codecept run tests/api/*

# GENERATE DOCS
php artisan l5-swagger:generate
