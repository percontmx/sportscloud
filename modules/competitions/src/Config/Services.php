<?php

namespace Percontmx\SportsVibe\Competitions\Config;

use CodeIgniter\Config\BaseService;
use Percontmx\SportsVibe\Competitions\Services\EditionsService;
use Percontmx\SportsVibe\Competitions\Services\CompetitionsService;

class Services extends BaseService
{
    public static function competitions($getShared = true): CompetitionsService
    {
        if ($getShared) {
            return static::getSharedInstance('competitions');
        }

        return new CompetitionsService();
    }

    public static function editions($getShared = true): EditionsService
    {
        if ($getShared) {
            return static::getSharedInstance('editions');
        }

        return new EditionsService();
    }
}




