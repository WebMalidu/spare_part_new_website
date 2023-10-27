<?php
## dev by madusha
## date - 2023/10/2

class ImageSearch
{

     public function searchImage($directory, $productId, $categoryItemId)
     {
          $directory = __DIR__ . "/" . $directory; // Change this to the path of the folder you want to scan

          // Get all file and directory names in the specified folder
          $files = scandir($directory);
          $imagesResults = [];

          // Loop through the files and print the file names
          foreach ($files as $file) {
               $productIdOfImage = substr($file, 8, 9);
               $categoryIdOfImage = substr($file, 33, 10);
               if (is_file($directory . '/' . $file)  && ($productIdOfImage === $productId && $categoryIdOfImage === $categoryItemId)) {
                    array_push($imagesResults, $file);
               }
          }

          return $imagesResults;
     }
}
