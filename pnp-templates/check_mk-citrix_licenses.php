<?php
# +------------------------------------------------------------------+
# |             ____ _               _        __  __ _  __           |
# |            / ___| |__   ___  ___| | __   |  \/  | |/ /           |
# |           | |   | '_ \ / _ \/ __| |/ /   | |\/| | ' /            |
# |           | |___| | | |  __/ (__|   <    | |  | | . \            |
# |            \____|_| |_|\___|\___|_|\_\___|_|  |_|_|\_\           |
# |                                                                  |
# | Copyright Mathias Kettner 2014             mk@mathias-kettner.de |
# +------------------------------------------------------------------+
#
# This file is part of Check_MK.
# The official homepage is at http://mathias-kettner.de/check_mk.
#
# check_mk is free software;  you can redistribute it and/or modify it
# under the  terms of the  GNU General Public License  as published by
# the Free Software Foundation in version 2.  check_mk is  distributed
# in the hope that it will be useful, but WITHOUT ANY WARRANTY;  with-
# out even the implied warranty of  MERCHANTABILITY  or  FITNESS FOR A
# PARTICULAR PURPOSE. See the  GNU General Public License for more de-
# tails. You should have  received  a copy of the  GNU  General Public
# License along with GNU Make; see the file  COPYING.  If  not,  write
# to the Free Software Foundation, Inc., 51 Franklin St,  Fifth Floor,
# Boston, MA 02110-1301 USA.

$license = substr($servicedesc, 16);
$opt[1] = "--vertical-label Licenses -l 0 -u $MAX[1] --title 'Used Citrix Licenses - $license'";

$def[1] = ""
          . "DEF:used=$RRDFILE[1]:$DS[1]:MAX "
          . "AREA:used#60d070:\"Used Licenses\: \" "
          . "GPRINT:used:LAST:\"last\: % 6.0lf\" "
          . "GPRINT:used:MAX:\"maximum\: % 6.0lf\" "
          . "GPRINT:used:AVERAGE:\"average\:% 6.0lf\\n\" "
          . "HRULE:$MAX[1]#000000:\"Installed Licences\" "
          . "LINE:used#008000 "
          . "";