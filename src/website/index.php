<!DOCTYPE HTML>
<html>

<head>
    <title>FIUS Aushang</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet.css" />
</head>

<body>
    <nav>
        <h1 class="heading"> FIUS elektronischer Aushang </h1>
        <div class="menu">
            <a href="https://fius.informatik.uni-stuttgart.de" class="menubutton menu-hover-label"
                style="display: flex; align-items: center; text-decoration: none; position: relative;">
                <img src="./img/home.svg" alt="FIUS Logo" class="logo" style="margin-right: 0.5rem; filter: invert(1);">
                <span class="hover-label">FIUS Website</span>
            </a>

            <a class="menubutton menu-hover-label" href="https://www.informatik-forum.org/job-boerse"
                style="display: flex; align-items: center; text-decoration: none; position: relative;">
                <img src="./img/forum.png" alt="Jobbörse Logo" class="logo" style="margin-right: 0.5rem;">
                <span class="hover-label">Jobbörse</span>

            </a>
        </div>
    </nav>
    <div class="contentbox">
        <h2> Ausgehängte Dokumente </h2>
        <div class="content">
            <div class="file-grid">
                <?php
                $files = scandir(realpath("./data"));

                function parseFilename($filename)
                {
                    // Remove .pdf extension
                    $nameWithoutExt = pathinfo($filename, PATHINFO_FILENAME);

                    // Parse format: YYYY_MM_DD_CompanyName_JobDescription
                    $parts = explode('_', $nameWithoutExt);

                    $result = [
                        'date' => '',
                        'company' => '',
                        'description' => '',
                        'formatted_date' => ''
                    ];

                    if (count($parts) >= 5) {
                        // Extract date (first 3 parts)
                        $year = $parts[0];
                        $month = $parts[1];
                        $day = $parts[2];
                        $result['date'] = "$year-$month-$day";
                        $result['formatted_date'] = date('d.m.Y', strtotime($result['date']));

                        // Extract company (parts 3 and potentially 4 if it contains spaces)
                        $companyParts = [];
                        $descriptionStart = 3;

                        // Look for company parts (until we find job description indicators)
                        for ($i = 3; $i < count($parts); $i++) {
                            $part = $parts[$i];
                            // If part contains job-related keywords, start description from here
                            if (preg_match('/^(Praktikant|Werkstudent|Vollzeit|Teilzeit|Junior|Senior|Developer|Engineer|Manager|Analyst|Intern|Student|Assistant|Trainee|Specialist)/i', $part)) {
                                $descriptionStart = $i;
                                break;
                            } else {
                                $companyParts[] = $part;
                                $descriptionStart = $i + 1;
                            }
                        }

                        $result['company'] = implode(' ', $companyParts);

                        // Extract description (remaining parts)
                        if ($descriptionStart < count($parts)) {
                            $descriptionParts = array_slice($parts, $descriptionStart);
                            $result['description'] = implode(' ', $descriptionParts);
                            // Replace common abbreviations and improve formatting
                            $result['description'] = str_replace(['-', '_'], ['-', ' '], $result['description']);
                        }
                    }

                    return $result;
                }

                for ($i = 0; $i < count($files); $i++) {
                    $file = realpath("./data/" . $files[$i]);
                    $url = "data/" . $files[$i];
                    if (!is_file($file) || !str_ends_with($files[$i], '.pdf'))
                        continue;

                    $fileInfo = parseFilename($files[$i]);
                    $displayTitle = $fileInfo['description'] ?: pathinfo($files[$i], PATHINFO_FILENAME);

                    echo '<div class="file-card">';
                    echo '  <a href="' . $url . '" class="file-link" target="_blank">';
                    echo '    <div class="file-header">';
                    echo '      <h3 class="file-title">' . htmlspecialchars($displayTitle) . '</h3>';
                    echo '      <svg class="external-link-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">';
                    echo '        <path d="M18 13v6a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2h6"></path>';
                    echo '        <polyline points="15,3 21,3 21,9"></polyline>';
                    echo '        <line x1="10" y1="14" x2="21" y2="3"></line>';
                    echo '      </svg>';
                    echo '    </div>';
                    echo '    <div class="file-info">';
                    if ($fileInfo['formatted_date']) {
                        echo '      <div class="file-date">📅 ' . htmlspecialchars($fileInfo['formatted_date']) . '</div>';
                    }
                    if ($fileInfo['company']) {
                        echo '      <div class="file-company">🏢 ' . htmlspecialchars($fileInfo['company']) . '</div>';
                    }
                    echo '    </div>';
                    echo '  </a>';
                    echo '</div>';
                }

                ?>
            </div>
        </div>
    </div>
    <footer>
        <hr>
        <span class="footer-menu-outer">
            <ul class="footer-menu">
                <li class="footer-entry"><a class="footer-link"
                        href="https://fius.informatik.uni-stuttgart.de/index.php/fius/impressum/">Impressum</a></li>
                <li class="footer-entry"><a class="footer-link"
                        href="https://fius.informatik.uni-stuttgart.de/index.php/fius/datenschutzerklaerung/">Datenschutzerklärung</a>
                </li>
            </ul>
        </span>
    </footer>

</body>

</html>