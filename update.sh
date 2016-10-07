#!/bin/sh
rm -Rf ./*
git clone https://github.com/jasonkwh/sankofa-family/
cd sankofa-family/
mv ./* ..
cd ..
rm -Rf sankofa-family/
chmod 755 ./update.sh
chmod 717 ./wp-content/uploads
echo "Update completed"