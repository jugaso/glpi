<?php
/*
 
  ----------------------------------------------------------------------
GLPI - Gestionnaire Libre de Parc Informatique
 Copyright (C) 2004 by the INDEPNET Development Team.
 
 http://indepnet.net/   http://glpi.indepnet.org
 ----------------------------------------------------------------------
 Based on:
IRMA, Information Resource-Management and Administration
Christian Bauer 

 ----------------------------------------------------------------------
 LICENSE

This file is part of GLPI.

    GLPI is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    GLPI is distributed in the hope that it will be useful,    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with GLPI; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 ----------------------------------------------------------------------
 Original Author of file:
 Purpose of file:
 ----------------------------------------------------------------------
*/
 

include ("_relpos.php");
include ($phproot . "/glpi/includes.php");
include ($phproot . "/glpi/includes_tracking.php");
include ($phproot . "/glpi/includes_computers.php");
include ($phproot . "/glpi/includes_printers.php");
include ($phproot . "/glpi/includes_peripherals.php");
include ($phproot . "/glpi/includes_monitors.php");
include ($phproot . "/glpi/includes_networking.php");
checkAuthentication("normal");

commonHeader("Reports",$_SERVER["PHP_SELF"]);




if(!isset($_GET["start"])) $_GET["start"] = 0;
if (!isset($_GET["order"])) $_GET["order"] = "ASC";
if (!isset($_GET["contains"])) $_GET["contains"] = "";
if (!isset($_GET["contains2"])) $_GET["contains2"] = "";
if (!isset($_GET["contains3"])) $_GET["contains3"] = "";
if(!isset($_GET["attrib"])) $_GET["attrib"] = "";
if(!isset($_GET["author"])) $_GET["author"] = "";
if(!isset($_GET["date1"])) $_GET["date1"] = "";
if(!isset($_GET["date2"])) $_GET["date2"] = "";
if ($_GET["date1"]!=""&&$_GET["date2"]!=""&&strcmp($_GET["date2"],$_GET["date1"])<0){
$tmp=$_GET["date1"];
$_GET["date1"]=$_GET["date2"];
$_GET["date2"]=$tmp;
}

if(!isset($_GET["only_computers"])) $_GET["only_computers"] = "";

searchFormTrackingReport();
//print_r($_GET);
if (isset($_GET["field"]))
showTrackingListReport($_SERVER["PHP_SELF"],$_SESSION["glpiname"],$_GET["field"],$_GET["phrasetype"],$_GET["contains"],$_GET["start"],$_GET["date1"],$_GET["date2"],$_GET["only_computers"],$_GET["field2"],$_GET["phrasetype2"],$_GET["contains2"],$_GET["author"],$_GET["attrib"]);


commonFooter();
?>
