<?php

namespace App\Traits;

trait Locatable
{
    /**
     * This method is called upon instantiation of the Eloquent Model.
     * It adds the address fields to the "$fillable" array of the model.
     *
     * @return void
     */
    public function initializeLocatable()
    {
        $this->fillable = array_merge($this->fillable, [
            'address1',
            'address2',
            'city',
            'state',
            'zip',
            'country',
        ]);
    }

    /**
     * Returns the address of the model in the given format
     *
     * @return string
     */
    public function getAddress($format = "::add1 ::add2, ::city ::st, ::zip, ::country"): string
    {
        $address = trim(str_replace(
            ['::add1', '::add2', '::city', '::st', '::zip', '::country'],
            [
                $this->address1,
                $this->address2,
                $this->city,
                $this->state,
                $this->zip,
                $this->country
            ],
            $format
        ));

        // Remove spaces before commas
        $address = preg_replace('/\s*,/', ',', $address);

        // Removes excessive break tags
        $address = preg_replace('/(<br>)+$/', '', preg_replace("/(<br>\s*){2,}/i", '<br>', $address));

        // Removes excess commas
        $address = rtrim($address, ',');
        $address = preg_replace('/(<br>,)/', '<br>', $address);

        // Removes excess whitespace
        $address = preg_replace('/(\s+<br>|<br>\s+)/', '<br>', $address);
        return trim(preg_replace('/\s+/',' ', $address));
    }
}
