<?php

namespace Tests\Unit;

use App\Models\Institution;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InstitutionTest extends TestCase
{
    /**
     * Checks that the institution has the address fields
     *
     * @return void
     */
    public function testInstitutionHasAddress()
    {
        $institution = factory(Institution::class)->make();
        
        $this->assertArrayHasKey('address1', $institution->getAttributes());
    }
}
