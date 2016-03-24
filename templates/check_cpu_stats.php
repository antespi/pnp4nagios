<?php

  $ds_name[1] = "CPU Usage";
  $opt[1] = "--vertical-label \"% usage\" -l0 --title \"CPU usage for $hostname\" ";

  $colors = array(
     'cpu_user' => '#45DD99',
     'cpu_system' => '#DD457C',
     'cpu_iowait' => '#D0DD45',

     'cpu_idle' => '#45DD99',
     'cpu_nice' => '#DD457C',
     'cpu_steal' => '#D0DD45',
  );

  # CPU User
  $def[1] = rrd::def("cpu_user", $RRDFILE[1], $DS[1], "AVERAGE");
  # CPU System
  $def[1] .= rrd::def("cpu_system", $RRDFILE[1], $DS[2], "AVERAGE");
  # CPU IO wait
  $def[1] .= rrd::def("cpu_iowait", $RRDFILE[1], $DS[3], "AVERAGE");
  # CPU Total
  # $def[1] .= rrd::def("cpu_total", $RRDFILE[1], 100, "AVERAGE");

  # CPU Total
  $def[1] .= rrd::line1(100, "#000000", "Max");

  # CPU User
  $def[1] .= rrd::cdef("cpu_user_tmp", "cpu_user,cpu_system,+,cpu_iowait,+");
  $def[1] .= rrd::area("cpu_user_tmp", $colors["cpu_user"], "User");

  $def[1] .= rrd::gprint('cpu_user', array('MIN', 'MAX', 'AVERAGE'), '%3.2lf %s' );

  # CPU System
  $def[1] .= rrd::cdef("cpu_system_tmp", "cpu_system,cpu_iowait,+");
  $def[1] .= rrd::area("cpu_system_tmp", $colors["cpu_system"], "System");

  $def[1] .= rrd::gprint('cpu_system', array('MIN', 'MAX', 'AVERAGE'), '%3.2lf %s' );

  # CPU IO wait
  $def[1] .= rrd::area("cpu_iowait", $colors["cpu_iowait"], "IO wait");

  $def[1] .= rrd::gprint('cpu_iowait', array('MIN', 'MAX', 'AVERAGE'), '%3.2lf %s' );

  $ds_name[5] = "CPU stats";
        $opt[2] = "--vertical-label \"%\" -l0 --title \"CPU stats for $hostname\" ";

  # CPU Idle
  $def[2] = rrd::def("cpu_idle", $RRDFILE[1], $DS[4], "AVERAGE");
  # CPU Nice
  $def[2] .= rrd::def("cpu_nice", $RRDFILE[1], $DS[5], "AVERAGE");
  # CPU Steal
  $def[2] .= rrd::def("cpu_steal", $RRDFILE[1], $DS[6], "AVERAGE");

  # CPU Total
  $def[2] .= rrd::line1(100, "#000000", "Max");

  # CPU Idle
  $def[2] .= rrd::line1("cpu_idle", $colors["cpu_idle"], "Idle");
  $def[2] .= rrd::gprint('cpu_idle', array('MIN', 'MAX', 'AVERAGE'), '%3.2lf %s' );

  # CPU Nice
  $def[2] .= rrd::line1("cpu_nice", $colors["cpu_nice"], "Nice");
  $def[2] .= rrd::gprint('cpu_nice', array('MIN', 'MAX', 'AVERAGE'), '%3.2lf %s' );

  # CPU Steal
  $def[2] .= rrd::line1("cpu_steal", $colors["cpu_steal"], "Steal");
  $def[2] .= rrd::gprint('cpu_steal', array('MIN', 'MAX', 'AVERAGE'), '%3.2lf %s' );

?>
