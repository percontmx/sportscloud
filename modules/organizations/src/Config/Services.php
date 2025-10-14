<?php

namespace Percontmx\SportsCloud\Organizations\Config;

use CodeIgniter\Config\BaseService;
use Percontmx\SportsCloud\Organizations\Services\OrganizationsService;

class Services extends BaseService
{
    public static function organizations($getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('organizations');
        }

        return new OrganizationsService();
    }
}