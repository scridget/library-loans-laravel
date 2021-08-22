<?php

namespace Tests\Unit;

use App\Traits\Locatable;
use Tests\TestCase;

class LocatableTest extends TestCase
{
    /**
     * Checks that we accurately return the formatted address
     * when all fields are populated
     *
     * @return void
     */
    public function testAddressFormatsWithAllFields()
    {
        $mock = $this->getMockForTrait(Locatable::class);
        $mock->address1 = 'Address1';
        $mock->address2 = 'Address2';
        $mock->city = 'City';
        $mock->state = 'State';
        $mock->zip = '123456';
        $mock->country = 'Country';

        $this->assertEquals(
            'Address1 Address2, City State, 123456, Country',
            $mock->getAddress()
        );

        $this->assertEquals(
            'Address1',
            $mock->getAddress('::add1')
        );

        $this->assertEquals(
            'Address1<br>Address2<br>City State, 123456<br>Country',
            $mock->getAddress('::add1<br>::add2<br>::city ::st, ::zip<br>::country')
        );
    }

    /**
     * Checks that we accurately return the formatted address
     * when not all fields are populated
     *
     * @return void
     */
    public function testAddressFormatsWithEmptyFields()
    {
        $mock = $this->getMockForTrait('App\Traits\Locatable');
        $mock->address1 = 'Address1';
        $mock->address2 = '';
        $mock->city = 'City';
        $mock->state = '';
        $mock->zip = '123456';
        $mock->country = '';

        $this->assertEquals(
            $mock->getAddress(),
            'Address1, City, 123456'
        );

        $this->assertEquals(
            $mock->getAddress('::add1'),
            'Address1'
        );

        $this->assertEquals(
            'Address1<br>City, 123456',
            $mock->getAddress('::add1<br>::add2<br>::city ::st, ::zip<br>::country')
        );

        $mock->city = '';

        $this->assertEquals(
            'Address1<br>123456',
            $mock->getAddress('::add1<br>::add2<br>::city ::st, ::zip<br>::country')
        );
    }
}
