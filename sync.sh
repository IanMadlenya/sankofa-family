#!/bin/sh
ssh root@47.52.114.11 "find /data/wwwroot/default/wp-content/uploads/pdfs -type f -exec rm {} \;"
scp -r ~/Desktop/pdf/* root@47.52.114.11:/data/wwwroot/default/wp-content/uploads/pdfs
ssh root@47.52.114.11 "chmod -R 755 /data/wwwroot/default/wp-content/uploads/pdfs"