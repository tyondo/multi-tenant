<?php

namespace Laraflock\MultiTenant\Tests;

use HynMe\Framework\Testing\TestCase;
use Laraflock\MultiTenant\Models\Hostname;
use Laraflock\MultiTenant\Models\Tenant;
use Laraflock\MultiTenant\Models\Website;

/**
 * Class TenantModeltest
 * @package Laraflock\MultiTenant\Tests
 * @coversDefaultClass \Laraflock\MultiTenant\Models\Tenant
 */
class TenantModeltest extends TestCase
{
    /**
     * @return Tenant
     * @coversNothing
     */
    public function testCreate()
    {
        $tenant = new Tenant;
        $tenant->name = 'example';
        $tenant->email = 'foo@baz.com';

        return $tenant;
    }

    /**
     * Tests hostnames
     *
     * @param Tenant $tenant
     * @depends testCreate
     * @covers ::hostnames
     */
    public function testHostnames($tenant)
    {
        $this->assertEquals(0, $tenant->hostnames->count());

        $this->assertEquals(new Hostname, $tenant->hostnames()->create());
    }

    /**
     * Tests websites
     *
     * @param Tenant $tenant
     * @depends testCreate
     * @covers ::websites
     */
    public function testWebsites($tenant)
    {
        $this->assertEquals(0, $tenant->websites->count());

        $this->assertEquals(new Website, $tenant->websites()->create());
    }
}