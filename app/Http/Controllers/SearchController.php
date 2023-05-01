<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Opportunity;
use App\Models\Company;

class SearchController extends Controller
{
    
    public function searchGlobal (Request $request)
    {
        $search = trim($request->input('q'));
        $result = array();

        $result[] = self::searchOpportunitiesByName($search);
        $result[] = self::searchUsersByName($search);
        $result[] = self::searchCompaniesByName($search);

        return response()->json($result);
    }

    public static function searchUsersByName ($request, $limit = null)
    {
        if (!empty($limit)) {
            $users = User::where("name", "ilike", "%{$request}%")->limit($limit)->get();
        } else {
            $users = User::where("name", "ilike", "%{$request}%")->get();
        }

        return $users;
    }

    public static function searchOpportunitiesByName ($request, $limit = null)
    {
        if (!empty($limit)) {
            $opportunities = Opportunity::where("name", "ilike", "%{$request}%")->limit($limit)->get();
        } else {
            $opportunities = Opportunity::where("name", "ilike", "%{$request}%")->get();
        }

        return $opportunities;
    }

    public static function searchCompaniesByName ($request, $limit = null)
    {
        if (!empty($limit)) {
            $companies = Company::where("name", "ilike", "%{$request}%")->limit($limit)->get();
        } else {
            $companies = Company::where("name", "ilike", "%{$request}%")->get();
        }

        return $companies;
    }

}
