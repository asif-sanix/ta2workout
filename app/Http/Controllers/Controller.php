<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function getChildCategories($parents,$mainId=true){
        if ($mainId==true) {$this->categories[] = $parents = (is_array($parents))?$parents:[$parents]; }
        $category = DB::table('categories')->select('id')->whereIn('parent',$parents)->get();
        if ($category->count()) {
            $this->categories[] = $category->pluck('id');
            return $this->getChildCategories($category->pluck('id'),false);
        }
        $this->categories = collect($this->categories);
        return $this->categories = $this->categories->collapse();
    }
}
