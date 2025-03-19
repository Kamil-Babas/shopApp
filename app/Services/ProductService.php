<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;

class ProductService
{


    /**
     * Handle image upload and resizing logic.
     *
     * @param array $data
     * @param Product|null $product
     * @return string|null
     */
    private function handleImageUpload(array $data, Product $product = null): ?string
    {
        if (isset($data['product_image']) && $data['product_image'] instanceof UploadedFile) {
            return $this->resizeUploadedImage($data['product_image'], $product, 300, 300);
        }

        if($product)
        {   // return old imagePath if product has image
            return $product->image_path ?? null;
        }

        // return null when product is being created for the very first time and didnt have image uploaded
        return null;

    }


    /**
     * Handle image resizing
     *
     * @param UploadedFile $image
     * @param Product|null $product
     * @param int $resizeToWidth
     * @param int $resizeToHeight
     * @return string The file path of the saved image
     */
    public function resizeUploadedImage(UploadedFile $image, Product $product = null, $resizeToWidth = 300, $resizeToHeight = 300): string
    {
        // Generate unique filename
        $fileName = $image->hashName();

        // Process image (resize and encode -> gives image original extension
        $manager = ImageManager::gd()->read($image);
        $resizedImage = $manager->resizeDown($resizeToWidth, $resizeToHeight)->encode();

        // Store the image
        $filePath = 'products/' . $fileName;
        Storage::put($filePath, $resizedImage);

        // If product has an old image, delete it
        if ($product && $product->image_path)
        {
            Storage::delete($product->image_path);
        }

        return $filePath;

    }

    /**
     * Create a new product and handle image upload
     *
     * @param array $data
     * @return Product
     */
    public function createProduct(array $data): Product
    {
        $product = new Product();
        $product->fill($data);

        // Handle image upload (if any) and set image path, handleImageUpload returns null if image was not sent
        $product->image_path = $this->handleImageUpload($data);

        $product->save();

        return $product;
    }

    /**
     * Update an existing product and handle image upload
     *
     * @param Product $product
     * @param array $data
     * @return Product
     */
    public function updateProduct(Product $product, array $data): Product
    {
        $product->fill($data);

        // Handle image upload (if any) and set image path, handleImageUpload returns null if image was not sent
        $product->image_path = $this->handleImageUpload($data, $product);

        $product->save();

        return $product;
    }


}

