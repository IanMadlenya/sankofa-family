#!/bin/sh
cd default/
rm -Rf ./*
git clone https://github.com/jasonkwh/sankofa-family/
cd sankofa-family/
mv ./* ..
cd ..
rm -Rf sankofa-family/
chmod 755 ./update.sh
echo "Fix completed"