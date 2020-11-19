#!/usr/bin/sh

rm villat.db
sqlite3 villat.db < villat.sql
