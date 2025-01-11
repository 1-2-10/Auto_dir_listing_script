<?php
$DocPath = rtrim($_SERVER['PHP_SELF'], basename($_SERVER['PHP_SELF']));
$noDir = "no folder";
include_once $_SERVER['DOCUMENT_ROOT'] . '/index/pg_prts/head.inc.html'; 
// Start the unordered list
echo '<div id="brdcrmbs"><ul>';
// Get the URI relative to the document root
$relativePath = trim($_SERVER['REQUEST_URI'], '/');
// Break it into parts
$pathParts = explode('/', $relativePath);
// Add the "Home" link as the first breadcrumb
echo '<li><a href="/">DocRoot</a></li>';
// Build the breadcrumb trail
$currentPath = '';
$lastPart = end($pathParts); // Get the last part for comparison
foreach ($pathParts as $part) {
    $currentPath .= '/' . $part;
// If it's the last part, display as plain text
    if ($part === $lastPart) {
        echo '/ <li>' . htmlspecialchars($part) . '</li>';
    } else {
        // Otherwise, display as a link
        echo '<li> / <a href="' . htmlspecialchars($currentPath) . '">' . htmlspecialchars($part) . '</a></li>';
    }
}
// Close the unordered list
echo '</ul></div>';
?>
<div id="form-wrap"> <!--   form-wrap in head include -->
 <div id="form-body">
		<table border="0" cellspacing="2" cellpadding="0" align="center">
			<?php
			$rep = opendir('.');
			$folders = array();
			$files = array();
			while ($file = readdir($rep)) {
				if ($file != '..' && $file != '.' && $file != '') { 
					if (is_dir($file)) {
						$folders[] = $file; // Collect folder names
					} else {
						$files[] = $file; // Collect file names
					}
				}
			}
			closedir($rep);
			
  // Print file links first
			foreach ($files as $file) {
				echo "<tr><td nowrap class='text2'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
				echo "<td width='100%' class='text2'>";
				echo "<a href='" . htmlspecialchars($file) . "' class='text2'>" . htmlspecialchars($file) . "</a>"; // File links
				echo "</td></tr>";
			}
			
  // Print folder links next
			foreach ($folders as $folder) {
				echo "<tr><td nowrap class='text1'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
				echo "<td width='100%' class='text1'>";
				echo "<a href='" . htmlspecialchars($folder) . "' class='text1'>" . htmlspecialchars($folder) . "</a>"; // Folder links
				echo "</td></tr>";
			}
			
			if (empty($files) && empty($folders)) {
				echo "<tr><td nowrap class='text1'><div align='center'>-&nbsp; " . htmlspecialchars($noDir) . " &nbsp;-</div></td></tr>";
			}
			?>
		</table>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/index/pg_prts/ftr.inc.html'; ?>
