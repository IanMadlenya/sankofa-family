#!/bin/sh
rm -Rf css/
rm -Rf fonts/
rm -Rf images/
rm -Rf index.html
rm -Rf js/
rm -Rf overlays/
rm -Rf README.md
rm -Rf services.html
rm -Rf update.sh
git clone https://github.com/jasonkwh/sankofa-family/
cd sankofa-family/
mv ./* ..
cd ..
rm -Rf sankofa-family/
chmod 755 ./update.sh
echo "Update completed"