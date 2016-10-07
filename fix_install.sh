#!/bin/sh
cd default/
rm -Rf ./*
git clone https://github.com/jasonkwh/sankofa-family/
cd sankofa-family/
mv ./* ..
cd ..
rm -Rf sankofa-family/
chmod 755 ./update.sh
chmod 755 ./fix_install.sh
chmod 717 wp-content/uploads/
cp -f ./fix_install.sh ..
echo "Fix completed"