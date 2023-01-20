<?php

namespace App\Services;

use App\Models\Product;
use App\Repositories\ProductRepository;
use App\Utils\Mask;
use Illuminate\Http\UploadedFile;
use Illuminate\Validation\ValidationException;

class ProductService
{
  public function __construct(private ProductRepository $productRepository)
  {
  }

  public function create(array $data): Product
  {
    $this->sanitazePrice($data)->sanitazeImage($data, true);
    return $this->productRepository->create($data);
  }

  private function sanitazePrice(array &$data, $last = false): array | object
  {
    $data['price'] = Mask::removeMoneyMask($data['price']);
    if ($data['price'] < 1) throw ValidationException::withMessages(['price' => 'O preço precisa ser maior que zero.']);
    return $last ? $data : $this;
  }

  private function sanitazeImage(array &$data, $last = false): array | object
  {
    $data['img'] = $this->uploadAndGetPath($data['image']);
    unset($data['image']);
    return $last ? $data : $this;
  }

  private function uploadAndGetPath(UploadedFile $file): string
  {
    return str_replace('public', asset('storage'), $file->store('public/products'));
  }
}
