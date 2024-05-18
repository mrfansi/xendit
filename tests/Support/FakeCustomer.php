<?php

namespace Mrfansi\Xendit\Tests\Support;

use Faker\Provider\id_ID\Address;
use Faker\Provider\id_ID\Company;
use Faker\Provider\id_ID\Internet;
use Faker\Provider\id_ID\Person;
use Faker\Provider\id_ID\PhoneNumber;

class FakeCustomer
{
    private \Faker\Generator $faker;

    public function __construct()
    {
        $this->faker = new \Faker\Generator();
        $this->faker->addProvider(new Person($this->faker));
        $this->faker->addProvider(new Address($this->faker));
        $this->faker->addProvider(new PhoneNumber($this->faker));
        $this->faker->addProvider(new Company($this->faker));
        $this->faker->addProvider(new Internet($this->faker));
    }

    public function given_names(): string
    {
        return $this->faker->firstName;
    }

    public function surname(): string
    {
        return $this->faker->lastName;
    }

    public function email(): string
    {
        return $this->faker->freeEmail;
    }

    public function mobile_number(): string
    {
        return $this->faker->e164PhoneNumber;
    }

    public function addresses(): array
    {
        return [
            'city' => $this->faker->city,
            'country' => $this->faker->country,
            'postal_code' => $this->faker->postcode,
        ];
    }

    public function success_redirect_url(): string
    {
        return 'https://yourcompany.com/example_item/10/success_page';
    }

    public function failure_redirect_url(): string
    {
        return 'https://yourcompany.com/example_item/10/failed_checkout';
    }
}
