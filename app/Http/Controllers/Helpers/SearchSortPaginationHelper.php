<?php

namespace App\Http\Controllers\Helpers;
use Response;
class SearchSortPaginationHelper
{

    /**
     * @param $request
     * @param $query
     * @return \Illuminate\Http\JsonResponse|string
     */
    public static function applySortSearchPagination($request,$query,$searchCols)
    {
        $query = new $query;
        $query = $query::query();
        $searchChars = $request->get('search') ?? null;
        if ($searchChars) {
            for ($i = 0; $i < count($searchCols); $i++) {
                if($i>0)
                    $query->orWhere($searchCols[$i], 'like', '%' . $searchChars . '%');
                else
                    $query->where($searchCols[$i], 'like', '%' . $searchChars . '%');
            }
        }
        $take = $request->get('take') ?? 5;
        $pageNumber = $request->get('page_number') ?? 1;
        $sort = explode(',', $request->get('sort') ?? 'id,asc');
        $sortByColumn = $sort[0];
        $sortByDirection = array_key_exists(1, $sort) ? $sort[1] : 'asc';
        $query->orderBy($sortByColumn, $sortByDirection);
        $records = $query->paginate($take, ['*'], 'page', $pageNumber);
        $total = $records->total();
        return [
            'data' => $records->values()->all(),
            'total_record' => $total];
    }
}
