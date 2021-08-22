<?php

namespace Tests\Unit;

use App\Models\Institution;
use Tests\TestCase;

class InstitutionTest extends TestCase
{
    public function testInstitutionHasAddress(): void
    {
        $institution = Institution::factory()->make();
        
        $this->assertArrayHasKey('address1', $institution->getAttributes());
    }
}
