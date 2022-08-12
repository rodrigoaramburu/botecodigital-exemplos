<?php

namespace App\Theme;

use Minicli\Output\CLIColors;
use Minicli\Output\Theme\DefaultTheme;

class DraculaTheme extends DefaultTheme
{
    public function getThemeColors(): array
    {
        return [
            'default' => ["38;2;248;248;242"],
            'alt' => ["38;2;40;42;54", "48;2;248;248;242"],
            'info' => ["38;2;98;114;164"],
            'info_alt' => ["38;2;248;248;242", "48;2;98;114;164"],
            'success' => ["38;2;80;250;123"],
            'success_alt' => ["38;2;40;42;54", "48;2;80;250;123"],
            'error' => ["38;2;255;85;85"],
            'error_alt' => ["38;2;248;248;242", "48;2;255;85;85"],

            'cyan' => ["38;2;139;233;253"],
            'orange' => ["38;2;255;184;108"],
            'pink' => ["38;2;255;121;198"],
            'purple' => ["38;2;189;147;249"],
            'yellow' => ["38;2;241;250;140"],
        ];
    }
}
