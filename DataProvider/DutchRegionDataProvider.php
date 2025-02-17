<?php declare(strict_types=1);

namespace Yireo\LokiCheckoutNl\DataProvider;

class DutchRegionDataProvider
{
    public function getCountry(): string
    {
        return 'NL';
    }

    public function getRegions(): array
    {
        return [
            ['NL', 'Drenthe', 'Drenthe'],
            ['NL', 'Flevoland', 'Flevoland'],
            ['NL', 'Friesland', 'Friesland'],
            ['NL', 'Gelderland', 'Gelderland'],
            ['NL', 'Groningen', 'Groningen'],
            ['NL', 'Limburg', 'Limburg'],
            ['NL', 'Noord-Brabant', 'Noord-Brabant'],
            ['NL', 'Noord-Holland', 'Noord-Holland'],
            ['NL', 'Overijssel', 'Overijssel'],
            ['NL', 'Utrecht', 'Utrecht'],
            ['NL', 'Zeeland', 'Zeeland'],
            ['NL', 'Zuid-Holland', 'Zuid-Holland'],
        ];
    }
}
