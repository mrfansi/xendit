<?php

namespace Mrfansi\Xendit\Data\Invoice;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class AddressData extends Data
{
    public function __construct(
        public string|Optional $city,
        public string|Optional $country,
        public string|Optional $state,
        public string|Optional $street_line1,
        public string|Optional $street_line2,
        public string|Optional $postal_code,
    ) {
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): void
    {
        $this->country = $country;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(?string $state): void
    {
        $this->state = $state;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): void
    {
        $this->city = $city;
    }

    public function getStreetLine1(): Optional|string
    {
        return $this->street_line1;
    }

    public function setStreetLine1(Optional|string $street_line1): void
    {
        $this->street_line1 = $street_line1;
    }

    public function getStreetLine2(): Optional|string
    {
        return $this->street_line2;
    }

    public function setStreetLine2(Optional|string $street_line2): void
    {
        $this->street_line2 = $street_line2;
    }

    public function getPostalCode(): Optional|string
    {
        return $this->postal_code;
    }

    public function setPostalCode(Optional|string $postal_code): void
    {
        $this->postal_code = $postal_code;
    }
}
