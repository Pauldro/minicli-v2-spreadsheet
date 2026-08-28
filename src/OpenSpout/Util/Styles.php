<?php namespace Pauldro\Minicli\v2\Spreadsheet\OpenSpout\Util;

// OpenSpout
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
        return new Style(border: $border, fontBold: true, fontSize: 14);
    }

    public static function generateRecordHeaderStyles(): Style
    {
        $border = new Border(
            new BorderPart(BorderName::TOP, Color::BLACK, BorderWidth::THIN, BorderStyle::SOLID)
        );
        return new Style(border: $border, fontBold: true, fontSize: 12, backgroundColor: Color::toARGB('E6E6EA'));
    }
}
