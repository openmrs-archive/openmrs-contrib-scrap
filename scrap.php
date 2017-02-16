<?php

# Basic JIRA information
$host = "issues.openmrs.org";
$pid = 10186;
$issuetype = 6;

# Trim the summary
$summary = substr(urlencode(trim($_POST["errorMessage"])), 0, 254);

# Debug and get version
$version = explode(" ", $_POST["openmrs_version"]);

# Clean the description
$description = "Version: ".$_POST["openmrs_version"]."%0D%0AImplementation ID: ".$_POST["implementationId"]."%0D%0AUser ID: ".$_POST["username"]."%0D%0AStarted Modules: ".$_POST["startedModules"]."%0D%0A%0D%0ASummary:%0D%0A".$summary."%0D%0A%0D%0ADescription:%0D%0A".urlencode($_POST["stackTrace"]);

# Translate the Version reported into the JIRA version ID
if ($version[0] == "1.7.0") $jiraVersion = 13078;
if ($version[0] == "1.6.1") $jiraVersion = 13077;
if ($version[0] == "1.8.0") $jiraVersion = 13080;
if ($version[0] == "1.9.4") $jiraVersion = 16301;
if ($version[0] == "1.9.5") $jiraVersion = 16316;
if ($version[0] == "1.9.7") $jiraVersion = 16323;
if ($version[0] == "1.9.8") $jiraVersion = 16322;
if ($version[0] == "1.10.0") $jiraVersion = 12565;
if ($version[0] == "1.10.2") $jiraVersion = 17005;
if ($version[0] == "1.11.0") $jiraVersion = 16321;
if ($version[0] == "1.11.1") $jiraVersion = 17301;
if ($version[0] == "1.11.2") $jiraVersion = 17321;
if ($version[0] == "1.11.3") $jiraVersion = 17405;
if ($version[0] == "1.11.4") $jiraVersion = 17601;


else $jiraVersion = 13079;

# Create desitnation
$url = "https://".$host."/secure/CreateIssueDetails!init.jspa?pid=".$pid."&issuetype=".$issuetype."&summary=".$summary."&versions=".$jiraVersion."&customfield_10000=3&environment=".$_POST["server_info"]."&description=".$description;

# Redirect the client
header("Location: ".$url);
#echo "<p><a href=\"".$url."\">".$url."</a></p>";
?>
