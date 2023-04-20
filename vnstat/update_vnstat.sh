#!/bin/bash
vnstat -i enp2s0 --days --oneline | awk -F ';' '{print $1","$2","$3","$4","$5","$6","$7}' >> /home/oshima_admin/vnstat_update.csv

