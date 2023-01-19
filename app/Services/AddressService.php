<?php

namespace App\Services;

use App\Models\Address;
use App\Repositories\AddressRepository;

class AddressService
{
  public function __construct(private AddressRepository $addressRepository)
  {
  }

  public function create(array $data): Address
  {
    return $this->addressRepository->create($data);
  }

  public function createAndGetId(array $data): string
  {
    return $this->create($data)->id;
  }
}
