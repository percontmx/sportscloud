<?php

namespace Percontmx\SportsVibe\Tournaments\Config;

use CodeIgniter\Config\BaseService;
use Percontmx\SportsVibe\Tournaments\Services\EditionsService;
use Percontmx\SportsVibe\Tournaments\Services\TournamentsService;

class Services extends BaseService
{
    public static function tournaments($getShared = true): TournamentsService
    {
        if ($getShared) {
            return static::getSharedInstance('tournaments');
        }

        return new TournamentsService();
    }

    public static function editions($getShared = true): EditionsService
    {
        if ($getShared) {
            return static::getSharedInstance('editions');
        }

        return new EditionsService();
    }
}

