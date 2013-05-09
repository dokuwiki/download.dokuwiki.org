#!/usr/bin/bash

DIR=`dirname "$1"`
cd "$DIR"

cd src/dokuwiki/master
pwd
git pull origin master
cd ../../../

for PLUGIN in `find src/plugins/ -mindepth 1 -maxdepth 1 -type d`
do
    cd $PLUGIN
    pwd
    git pull origin master
    cd ../../../
done