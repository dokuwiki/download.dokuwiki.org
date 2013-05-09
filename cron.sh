#!/bin/bash

DIR=`dirname "$1"`
cd "$DIR"

# pull dokuwiki core
cd src/dokuwiki/master
pwd
git pull origin master
cd ../../../

# pull plugins
for PLUGIN in `find src/plugins/ -mindepth 1 -maxdepth 1 -type d`
do
    cd $PLUGIN
    pwd
    git pull origin master
    cd ../../../
done

# clear cache
find out/*.tgz -name '*.tgz' -delete