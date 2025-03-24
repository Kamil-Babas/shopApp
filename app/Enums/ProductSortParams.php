<?php

namespace App\Enums;

enum ProductSortParams: string
{
    case NAME = 'Name';
    case CATEGORY_ID = 'Category';
    case PRICE_ASC = 'Price: ascending';
    case PRICE_DESC = 'Price: descending';
    case AMOUNT_ASC = 'Amount: ascending';
    case AMOUNT_DESC = 'Amount: descending';


    const PARAMS = [
        self::NAME,
        self::CATEGORY_ID,
        self::PRICE_ASC,
        self::PRICE_DESC,
        self::AMOUNT_ASC,
        self::AMOUNT_DESC,
    ];

    // Method to get sorted params alphabetically based on the string value
    public static function getSortedParams(): array
    {
        // Extracting values (strings) from enum cases and sorting them
        $params = array_map(fn($param) => $param->value, self::PARAMS); // Extract the string values

        sort($params); // Sort alphabetically

        return $params;
    }

}

?>
