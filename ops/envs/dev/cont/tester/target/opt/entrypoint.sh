#!/usr/bin/env bash

set -e

# Now run .php and .sh scripts under folder /usr/local/boot in order.
boot_scripts=()
shopt -s nullglob
for f in /usr/local/boot/*.sh ; do
    boot_scripts+=("$f")
done
shopt -u nullglob
IFS=$'\n' boot_scripts=($(sort <<<"${boot_scripts[*]}"))
unset IFS
for f in "${boot_scripts[@]}" ; do
    . "$f"
done

tail -f /dev/null