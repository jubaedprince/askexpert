<?php

namespace App\Http\Controllers;

use App\Expert;
use App\Service;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $services_hits = Service::search($request->query_term, ['index' => 'services'])['hits'];
        $experts_hits = Expert::search($request->query_term, ['index' => 'experts'])['hits'];

        $experts = new Collection();

        foreach($experts_hits as $service)
        {
            $experts->push(Expert::find($service['id']));
        }

        $services = new Collection();

        foreach($services_hits as $service)
        {
            $services->push(Service::find($service['id']));
        }

        return view('search.search', compact('services', 'experts'));
    }
}
