<?php 
namespace App\Couchdb;


use Illuminate\Support\Facades\Facade;

class CouchdbFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'couchdb';
    }
}