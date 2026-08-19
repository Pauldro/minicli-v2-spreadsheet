<?php namespace Pauldro\Minicli\v2\Spreadsheet\OpenSpout\Util;

// Open Spout
use OpenSpout\Common\Entity\Style\Color;
use OpenSpout\Common\Entity\Style\Border;
use OpenSpout\Common\Entity\Style\BorderName;
use OpenSpout\Common\Entity\Style\BorderPart;
use OpenSpout\Common\Entity\Style\BorderStyle;
use OpenSpout\Common\Entity\Style\BorderWidth;
use OpenSpout\Common\Entity\Style\Style;

class Styles
{
    public static function generateColumnHeaderStyles(): Style
    {
        $border = new Border(
            new BorderPart(BorderName::BOTTOM, Color::BLACK, BorderWidth::THICK, BorderStyle::SOLID)
        );

        $style = new Style();
        $style->withBorder($border);
        $style->withFontBold(true);
        $style->withFontSize(14);
        return $style;
    }

    public static function generateRecordHeaderStyles(): Style
    {
        $border = new Border(
            new BorderPart(BorderName::TOP, Color::BLACK, BorderWidth::THIN, BorderStyle::SOLID)
        );

        $style = new Style();
        $style->withBorder($border);
        $style->withFontBold(true);
        $style->withFontSize(12);
        $style->withBackgroundColor(Color::toARGB('E6E6EA'));
        return $style;
    }
}
