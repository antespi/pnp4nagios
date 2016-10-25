<?php

  $ds_name[1] = "TCP traffic";
  $opt[1] = "--vertical-label \"bytes/s\" -l0 --title \"Traffic for $hostname / $servicedesc\" ";

  # In & Out
  $def[1] = rrd::def("in", $RRDFILE[1], $DS[2], "AVERAGE");
  $def[1] .= rrd::def("out", $RRDFILE[1], $DS[3], "AVERAGE");

  # Thresholds
  $def[1] .= "HRULE:$WARN[1]#FFFF00 ";
  $def[1] .= "HRULE:$CRIT[1]#FF0000 ";

  # In
  $def[1] .= rrd::area("in", "#00FF00", "In");
  $def[1] .= "GPRINT:in:LAST:\"%6.2lf last\" " ;
  $def[1] .= "GPRINT:in:AVERAGE:\"%6.2lf avg\" " ;
  $def[1] .= "GPRINT:in:MAX:\"%6.2lf max\\n\" ";

  # Out
  $def[1] .= rrd::line1("out", "#0000FF", "Out");
  $def[1] .= "GPRINT:out:LAST:\"%6.2lf last\" " ;
  $def[1] .= "GPRINT:out:AVERAGE:\"%6.2lf avg\" " ;
  $def[1] .= "GPRINT:out:MAX:\"%6.2lf max\\n\" ";
?>
