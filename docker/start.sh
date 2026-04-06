#!/usr/bin/env bash
set -e

PORT="${PORT:-10000}"

sed -ri "s/Listen [0-9]+/Listen ${PORT}/" /etc/apache2/ports.conf
sed -ri "s/:([0-9]+)>/:${PORT}>/" /etc/apache2/sites-available/000-default.conf

exec apache2-foreground
