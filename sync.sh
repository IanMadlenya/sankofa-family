#!/bin/sh
ssh root@47.90.81.198 "find /data/wwwroot/default/wp-content/uploads/pdfs -type f -exec rm {} \;"
scp -r ~/Desktop/pdf/* root@47.90.81.198:/data/wwwroot/default/wp-content/uploads/pdfs
ssh root@47.90.81.198 "chmod -R 755 /data/wwwroot/default/wp-content/uploads/pdfs"