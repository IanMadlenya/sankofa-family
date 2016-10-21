#!/bin/sh
shopt -s extglob
cd wp-content/
rm -Rf !(uploads)
cd ..
rm -Rf !(wp-content)
git clone https://github.com/jasonkwh/sankofa-family/
cd sankofa-family/
cp -Rf ./* ..
cd ..
rm -Rf sankofa-family/
rm -Rf localhost.sql
chmod 755 ./update.sh
chmod 755 ./fix_install.sh
chmod 755 ./fix_owncloud.sh
cp -f ./fix_install.sh ..
echo "Update completed"