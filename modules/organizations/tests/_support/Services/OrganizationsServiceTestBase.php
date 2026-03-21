<?php

namespace Percontmx\SportsVibe\Organizations\Tests\Support\Services;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use Percontmx\SportsVibe\Organizations\Tests\Support\Database\Seeds\OrganizationsSeeder;

abstract class OrganizationsServiceTestBase extends CIUnitTestCase
{
    use DatabaseTestTrait;

    protected $refresh = true;
    protected $namespace = 'Percontmx\SportsVibe\Organizations';
    protected $migrate = true;
    protected $migrateOnce = false;
    protected $seed = OrganizationsSeeder::class;
    protected $seedOnce = false;

}

