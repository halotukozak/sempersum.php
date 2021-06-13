<?php

use Illuminate\Support\Facades\Blade;

function current_user()
{
    return auth()->user();
}

function tip($category, $text, $header = null): string
{
    switch ($category) {
        case "error":
            $colour = 'red-500';
            $darkColour = 'red-400';
            $icon = '<i class="fas fa-times-circle"></i>';
            if (!$header) {
                $header = "Błąd";
            }
            break;
        case "warning":
            $colour = 'yellow-400';
            $darkColour = 'yellow-300';

            $icon = '<i class="fas fa-exclamation-triangle"></i>';
            if (!$header) {
                $header = "Uwaga";
            }
            break;
        case "info":
            $colour = 'blue-500';
            $darkColour = 'blue-400';
            $icon = '<i class="fas fa-info-circle"></i>';
            if (!$header) {
                $header = "Info";
            }
            break;
        case "success":
            $colour = 'green-500';
            $darkColour = 'green-400';

            $icon = '<i class="fas fa-check-circle"></i>';
            if (!$header) {
                $header = "Udało się!";
            }
            break;
        default:
            $colour = 'white';
            $darkColour = $colour;
            $icon = '<i class="fas fa-info-circle"></i>';
            if (!$header) {
                $header = "&nbsp;";
            }
            break;
    }
    return htmlentities("
            <div class='flex w-full mx-auto overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800'>
                <div class='flex items-center p-4 justify-center w-12 bg-" . $colour . "'>" . $icon . "</div>
                <div class='px-4 py-2 -mx-3'>
                    <div class='mx-3 p-0.5'>
                        <span class='font-semibold text-" . $colour . " dark:text-" . $darkColour . "'>" . $header . "</span>
                        <p class='text-sm text-gray-600 dark:text-gray-200'>" . $text . "</p>
                    </div>
                </div>
            </div>");
}

function youtube_id_from_url($url)
{
    $pattern =
        '%^             # Match any youtube URL
        (?:https?://)?  # Optional scheme. Either http or https
        (?:www\.)?      # Optional www subdomain
        (?:             # Group host alternatives
          youtu\.be/    # Either youtu.be,
        | youtube\.com  # or youtube.com
          (?:           # Group path alternatives
            /embed/     # Either /embed/
          | /v/         # or /v/
          | /watch\?v=  # or /watch\?v=
          )             # End path alternatives.
        )               # End host alternatives.
        ([\w-]{10,12})  # Allow 10-12 for 11 char youtube id.
        $%x';
    $result = preg_match($pattern, $url, $matches);
    if ($result) {
        return $matches[1];
    }
    return $url;
}
