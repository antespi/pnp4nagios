<?php

  $ds_name[1] = "Backup duration";
  $opt[1] = "--vertical-label \"Minutes\" -l0 --title \"Backup duration for $hostname / $servicedesc\" ";

  # Duration
  $def[1] = rrd::def("duration", $RRDFILE[1], $DS[1], "AVERAGE");

  # Memory Buffer
  $def[1] .= rrd::area("duration", "#006333", "Duration");

?>
