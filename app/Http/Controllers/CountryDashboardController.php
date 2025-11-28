<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class CountryDashboardController extends Controller
{
    public function show(string $country_name): View 
    {
        $sql_quiery_categories = "
            SELECT Category_name
            FROM categories;
        ";
        $allCategories = DB::select($sql_quiery_categories);

        $sql_quiery_countries = "
            (
                (
                    SELECT DISTINCT country FROM migration_net WHERE country IS NOT NULL AND country != ''
                    UNION ALL
                    SELECT DISTINCT country FROM life_expentancy WHERE country IS NOT NULL AND country != ''
                    UNION ALL
                    SELECT DISTINCT country FROM global_mortality WHERE country IS NOT NULL AND country != ''
                    UNION ALL
                    SELECT DISTINCT country FROM adult_mortality_rate WHERE country IS NOT NULL AND country != ''
                    UNION ALL   
                    SELECT DISTINCT country FROM infant_mortality_rate WHERE country IS NOT NULL AND country != ''
                )
            )";
        $allCountries = DB::select($sql_quiery_countries);
            
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
        
        return view('country_dashboard.show', compact('country_name', 'allCategories', 'allCountries', 'allYears'));    
    }
}
