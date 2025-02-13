<?php
// Function to create and display breadcrumbs
function createBreadcrumbs() {
    echo '<div id="brdcrmbs"><ul><li><a href="/">DocRoot</a></li>'; // Start with a link to the Document Root
    $relativePath = trim($_SERVER['REQUEST_URI'], '/');
    $pathParts = explode('/', $relativePath);
    $currentPath = '';

    if (!empty($relativePath)) { // Check if there are any subdirectories
        echo '<li>/</li>'; // Add the leading slash right after "DocRoot"
    }

    for ($i = 0; $i < count($pathParts); $i++) {
        if ($pathParts[$i] == '') continue; // Skip empty parts to avoid erroneous links
        $currentPath .= '/' . $pathParts[$i];
        if ($i == count($pathParts) - 1) {
            echo '<li>' . htmlspecialchars($pathParts[$i]) . '</li>'; // Last part: current directory, not a link
        } else {
            echo '<li><a href="' . htmlspecialchars($currentPath) . '">' . htmlspecialchars($pathParts[$i]) . '</a></li>';
        }
        if ($i < count($pathParts) - 1) { // Add slashes between items, not part of the link
            echo '<li>/</li>';
        }
    }
    echo '</ul></div>'; // Close the list and div
}

// Call to generate breadcrumbs
createBreadcrumbs();

// Directory and file listing section
echo '<div id="form-wrap">';
echo '<ul class="directory-listing">';

// Attempt to open the current directory
$dirHandle = opendir('.');
if ($dirHandle) {
    $folders = array();
    $files = array();

    // Read all entries in the directory
    while (($file = readdir($dirHandle)) !== false) {
        if ($file != '..' && $file != '.' && $file != '') { 
            if (is_dir($file)) {
                $folders[] = $file; // Collect folders
            } else {
                $files[] = $file; // Collect files
            }
        }
    }
    closedir($dirHandle);

    // Then output files
    foreach ($files as $file) {
        echo "<li class='text-common text2'><a href='" . htmlspecialchars($file) . "'>" . htmlspecialchars($file) . "</a></li>";
    }

    // Output folders first
    foreach ($folders as $folder) {
        echo "<li class='text-common text1'><a href='" . htmlspecialchars($folder) . "'>" . htmlspecialchars($folder) . "</a></li>";
    }

    // Check if directory is empty
    if (empty($files) && empty($folders)) {
        echo "<li class='text1'>-&nbsp; No files or directories &nbsp;-</li>";
    }
} else {
    echo "<li class='text1'>Error: Could not open directory.</li>";
}

echo '</ul>';
echo '</div>'; // Close form-wrap
?>
