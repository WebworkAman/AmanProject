set term png size 800,600
set output "/var/lib/vnstat/vnstat.png"
set title "vnstat network traffic"
set xlabel "Time"
set ylabel "Traffic (MiB)"
set xdata time
set timefmt "%Y-%m-%d %H:%M:%S"
set format x "%m/%d\n%H:%M"
plot "/var/lib/vnstat/vnstat.db" using 1:3 with impulses title "tx", "" using 1:3 with impulses title "rx"

