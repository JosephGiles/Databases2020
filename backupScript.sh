#!/bin/bash
#Back up the webpages

echo "Running backup script..."
sudo mysqldump  testDatabase > databaseBackup/theBackup.sql
