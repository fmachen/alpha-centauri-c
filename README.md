# alpha-centauri-c
Spatial management video games on the web

# Install

## Composer

`composer install/update`

## Public Directory

Configure your web server's document / web root to be the public directory

## Configuration Files

All of the configuration files are stored in the config directory.

## Directory Permissions

Directories within the storage and the bootstrap/cache directories should be writable by your web server.

## Application Key

Set your application key to a random string with `php artisan key:generate` command.
The key can be set in the .env environment file.
