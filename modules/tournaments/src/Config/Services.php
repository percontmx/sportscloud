<?php

namespace Percontmx\SportsCloud\Tournaments\Config;

use CodeIgniter\Config\BaseService;
use Percontmx\SportsCloud\Tournaments\Services\TournamentsService;

class Services extends BaseService
{
    public static function tournaments($getShared = true) : TournamentsService
    {
        if ($getShared) {
            return static::getSharedInstance('tournaments');
        }

        return new TournamentsService();
    }
}