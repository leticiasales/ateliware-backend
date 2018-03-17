<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class Repository extends Model
{
    public function addToTable($item)
    {
        $attributes = Schema::getColumnListing($this::getTable());
        if (($key = array_search('id', $attributes)) !== false) {
            unset($attributes[$key]);
        }
        if (($otherkey = array_search('owner_id', $attributes)) !== false) {
            unset($attributes[$otherkey]); //TODO: create owner on table
        }
        if (($otherkey = array_search('created_at', $attributes)) !== false) {
            unset($attributes[$otherkey]);
        }
        if (($otherkey = array_search('updated_at', $attributes)) !== false) {
            unset($attributes[$otherkey]);
        }

        $repo = new repository;

        foreach ($attributes as $attribute) {

            $repo->{$attribute} = $item->{$attribute=='git_id'?'id':$attribute};
        }
        $repo->save();
    }
}
