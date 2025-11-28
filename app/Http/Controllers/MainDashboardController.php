<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class MainDashboardController extends Controller
{
    public function index(): View
    {
       
        $sql_union_base = "
            (
                (
                    SELECT country FROM migration_net WHERE country IS NOT NULL AND country != ''
                    UNION
                    SELECT country FROM life_expentancy WHERE country IS NOT NULL AND country != ''
                    UNION
                    SELECT country FROM global_mortality WHERE country IS NOT NULL AND country != ''
                    UNION
                    SELECT country FROM adult_mortality_rate WHERE country IS NOT NULL AND country != ''
                    UNION
                    SELECT country FROM infant_mortality_rate WHERE country IS NOT NULL AND country != ''
                )
            ) AS T
        ";

        $sql_query_grouped = "
            SELECT
                UPPER(LEFT(T.country, 1)) AS letra,
                COUNT(*) AS numero_elementos
            FROM
                {$sql_union_base}
            GROUP BY
                letra
            ORDER BY
                letra;
        ";

        $groupedData = DB::select($sql_query_grouped);

        $sql_query_countries = "
            SELECT DISTINCT
                T.country AS country_name,
                UPPER(LEFT(T.country, 1)) AS letra
            FROM
                {$sql_union_base}
            ORDER BY
                letra, country_name;
        ";

        $allCountries = DB::select($sql_query_countries);

        $paisesData = [];

        foreach ($groupedData as $group) {
            $paisesData[$group->letra] = [
                'count' => $group->numero_elementos,
                'countries' => []
            ];
        }

        foreach ($allCountries as $country) {
            $letra = $country->letra;
            if (isset($paisesData[$letra])) {
                $paisesData[$letra]['countries'][] = $country->country_name;
            }
        }

        $sql_quiery_categories = "
            SELECT Category_name
            FROM categories;
        ";

        $allCategories = DB::select($sql_quiery_categories);

        $sql_quiery_years = "
            (
                (
                    SELECT DISTINCT year FROM migration_net WHERE year IS NOT NULL AND year != ''
                    UNION ALL
                    SELECT DISTINCT year FROM life_expentancy WHERE year IS NOT NULL AND year != ''
                    UNION ALL
                    SELECT DISTINCT year FROM global_mortality WHERE year IS NOT NULL AND year != ''
                    UNION ALL
                    SELECT DISTINCT year FROM adult_mortality_rate WHERE year IS NOT NULL AND year != ''
                    UNION ALL
                    SELECT DISTINCT year FROM infant_mortality_rate WHERE year IS NOT NULL AND year != ''

                )
            )";

        $allYears = DB::select($sql_quiery_years);

        return view('main_dashboard.index', compact('paisesData', 'allCategories', 'allYears'));

    }
}