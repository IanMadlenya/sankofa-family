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
rm -Rf 0.conf
rm -Rf httpd.conf
rm -Rf ssl.zip
chmod 755 ./update.sh
chmod 755 ./fix_install.sh
cp -f ./fix_install.sh ..
echo "Update completed"