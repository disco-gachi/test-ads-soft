<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecordListRequest;
use App\Models\Record;

class RecordController extends Controller
{
    public function getList (RecordListRequest $request) {
        $keysAndValues = $request->validated()['data'];

        $result = Record::where(function($query) use($keysAndValues) {
            foreach ($keysAndValues as $pair) {
                $query->orWhereJsonContains('data', [$pair[0] => $pair[1]]);
            }
        });

        return $result->get();
    }
}
