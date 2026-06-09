<?php namespace Pauldro\Minicli\v2\Spreadsheet\OpenSpout\Util;
// Open Spout
use OpenSpout\Common\Entity\Style\Color;
use OpenSpout\Common\Entity\Style\Border;
use OpenSpout\Common\Entity\Style\BorderPart;
use OpenSpout\Common\Entity\Style\Style;


class Styles {
    public static function generateColumnHeaderStyles() : Style
    {
        $border = new Border(
            new BorderPart(Border::BOTTOM, Color::BLACK, Border::WIDTH_THICK, Border::STYLE_SOLID)
        );

        $style = new Style();
        $style->setBorder($border);
        $style->setFontBold();
        $style->setFontSize(14);
        return $style;
    }
}