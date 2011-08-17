## Before using this helper

1. Make sure lighttpd and php installed

2. Create `tmp/log` directory

    mkdir -p tmp/log

3. Set `PHP_CGI` environment variable to the path of preferred php interpreter, e.g.:

    export PHP_CGI="/usr/bin/php-cgi"

## Usage

    lighttpd -f etc/lighttpd.conf -D
