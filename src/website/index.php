<!DOCTYPE HTML>
<html>

<head>
    <title>FIUS Aushang</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            width: 100%;
            overflow-x: hidden;
            box-sizing: border-box;
        }

        * {
            box-sizing: border-box;
        }

        nav {
            background-color: #006ab0;
            color: white;
            padding: 1rem 2rem;
            margin: 0;
            text-align: center;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        h1 {
            color: #ffffff;
            text-align: center;
            padding: 1rem;
            margin: 0px;
        }

        h2 {
            text-align: left;
            padding: 1rem;
            padding-left: 0;
            margin: 0px;
        }

        .logo {
            height: 2rem;
            vertical-align: middle;
            margin-right: 10px;
            color: white;
        }

        .menu {
            margin: 0px;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 1.5rem;
        }

        .menubutton {
            color: white;
            text-decoration: none;
            text-align: center;
            position: relative;
            padding: 0.5rem;
            border-radius: 4px;
            transition: background-color 0.2s ease;
            min-height: 44px;
            display: flex;
            align-items: center;
        }

        .menubutton:hover {
            color: white;
            text-decoration: underline;
            background-color: rgba(255, 255, 255, 0.1);
        }

        .hover-label {
            position: absolute;
            background-color: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 0.3rem 0.6rem;
            border-radius: 4px;
            font-size: 1rem;
            white-space: nowrap;
            bottom: -2.5rem;
            left: 50%;
            transform: translateX(-50%);
            opacity: 0;
            transition: opacity 0.2s ease-in-out;
            pointer-events: none;
            z-index: 100;
        }

        .menu-hover-label:hover .hover-label {
            opacity: 1;
            display: block !important;
        }

        .contentbox {
            width: 100%;
            max-width: 1200px;
            padding: 1rem 2rem;
            margin: 0 auto;
            background-color: white;
            flex: 1;
            box-sizing: border-box;
        }

        footer {
            width: 100%;
            background-color: #f8f9fa;
            border-top: 1px solid #e0e0e0;
            margin-top: 2rem;
            padding: 2rem 0;
        }

        .footer-menu-outer {
            display: flex;
            justify-content: center;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .footer-menu {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
            gap: 2rem;
            align-items: center;
        }

        .footer-entry {
            margin: 0;
            padding: 0;
        }

        .footer-link {
            color: #666;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: color 0.3s ease;
            position: relative;
        }

        .footer-link:hover {
            color: #006ab0;
        }

        .footer-link:hover::after {
            content: "";
            position: absolute;
            bottom: -2px;
            left: 0;
            right: 0;
            height: 2px;
            background-color: #006ab0;
            border-radius: 1px;
        }

        footer hr {
            display: none;
        }

        /* File cards styling */
        .file-grid {
            width: 100%;
            max-width: 100%;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
            padding: 1rem 0;
            box-sizing: border-box;
        }

        .file-card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
            transition: box-shadow 0.3s ease, transform 0.2s ease;
            border: 1px solid #e0e0e0;
        }

        .file-card:hover {
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.15);
            transform: translateY(-2px);
        }

        .file-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
        }

        .file-title {
            font-size: 1.1rem;
            font-weight: bold;
            color: #333;
            margin: 0;
            line-height: 1.3;
            flex: 1;
        }

        .external-link-icon {
            width: 20px;
            height: 20px;
            color: #006ab0;
            margin-left: 0.5rem;
            flex-shrink: 0;
        }

        .file-info {
            margin-bottom: 0.75rem;
        }

        .file-date {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 0.5rem;
        }

        .file-company {
            font-size: 0.95rem;
            color: #444;
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .file-description {
            font-size: 0.9rem;
            color: #555;
            line-height: 1.4;
        }

        .file-link {
            text-decoration: none;
            color: inherit;
            display: block;
        }

        .file-link:hover {
            text-decoration: none;
            color: inherit;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            nav {
                padding: 1rem;
                flex-direction: column;
                gap: 1rem;
            }

            .heading {
                font-size: 1.5rem;
            }

            .contentbox {
                padding: 1rem;
                max-width: 100%;
            }

            .file-grid {
                grid-template-columns: 1fr;
                gap: 1rem;
                max-width: 100%;
            }

            .file-card {
                padding: 1rem;
            }

            .footer-menu-outer {
                padding: 0 1rem;
            }

            .footer-menu {
                gap: 1.5rem;
            }
        }

        @media (max-width: 480px) {
            nav {
                padding: 0.75rem;
            }

            .heading {
                font-size: 1.25rem;
                padding: 0.5rem;
            }

            .contentbox {
                padding: 0.75rem;
                max-width: 100%;
            }

            .file-grid {
                grid-template-columns: 1fr;
                gap: 0.75rem;
            }

            .file-card {
                padding: 0.75rem;
            }

            .file-header {
                flex-direction: column;
                gap: 0.5rem;
                align-items: flex-start;
            }

            .external-link-icon {
                align-self: flex-end;
            }

            .footer-menu {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            footer {
                padding: 1.5rem 0;
            }

            .menu {
                gap: 1rem;
            }
        }

        /* Additional responsive adjustments */
        @media (max-width: 360px) {
            .contentbox {
                padding: 0.5rem;
            }

            .file-grid {
                gap: 0.5rem;
            }

            .file-card {
                padding: 0.5rem;
            }

            .file-title {
                font-size: 1rem;
            }
        }
    </style>
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
                    if (!is_file($file) || strtolower(substr($files[$i], -4)) !== '.pdf')
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