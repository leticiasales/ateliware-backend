<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository;
use GuzzleHttp\Client;

class RepositoriesController extends Controller
{
    public function search() {
        if (sizeof(Repository::all()) > 15)  return $this->error();

        $repo = new Repository;
        $client = new Client;

        $result = $client->request('GET', 'https://api.github.com/search/repositories', [
            'auth' => ['leticiasales', ''],
            'query' => ['q' => 'language:javascript'],
            'sort' => 'stars'
        ]);

       $items = json_decode($result->getBody()->getContents())->items;

       for ($i = 0; $i < 5; $i++) {
           $repo->addToTable($items[$i]);
       }

        $result = $client->request('GET', 'https://api.github.com/search/repositories', [
            'auth' => ['leticiasales', ''],
            'query' => ['q' => 'language:php'],
            'sort' => 'stars'
        ]);

        $items = json_decode($result->getBody()->getContents())->items;

        for ($i = 0; $i < 5; $i++) {
            $repo->addToTable($items[$i]);
        }

        $result = $client->request('GET', 'https://api.github.com/search/repositories', [
            'auth' => ['leticiasales', ''],
            'query' => ['q' => 'language:assembly'],
            'sort' => 'stars'
        ]);

        $items = json_decode($result->getBody()->getContents())->items;

        for ($i = 0; $i < 5; $i++) {
            $repo->addToTable($items[$i]);
        }

        $result = $client->request('GET', 'https://api.github.com/search/repositories', [
            'auth' => ['leticiasales', ''],
            'query' => ['q' => 'language:clojure'],
            'sort' => 'stars'
        ]);

        $items = json_decode($result->getBody()->getContents())->items;

        for ($i = 0; $i < 5; $i++) {
            $repo->addToTable($items[$i]);
        }

        $result = $client->request('GET', 'https://api.github.com/search/repositories', [
            'auth' => ['leticiasales', ''],
            'query' => ['q' => 'language:swift'],
            'sort' => 'stars'
        ]);

        $items = json_decode($result->getBody()->getContents())->items;

        for ($i = 0; $i < 5; $i++) {
            $repo->addToTable($items[$i]);
        }

        return view('home')->withTitle('ready');
    }

    public function index(Request $request)
    {
        if ($request && $request->has('language') && $request['language']!="all"){
            $repos = Repository::where('language', $request['language'])->get();
        }
        else {
            $repos = Repository::all();
        }
        return view('repositories.repositories')->withRepos($repos->all())->withLanguage($request['language']);
    }

    public function error() {
        return view('home')->with('title', 'full list');
    }
}
