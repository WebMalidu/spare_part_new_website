<?php
## dev by madusha
## date - 2023/10/2

class ImageSearch
{
     private $directory;
     private $productId;
     private $weightId;
     private $fileExtensions;

     public function __construct($directory, $productId, $weightId, $fileExtensions)
     {
          $this->directory = $directory;
          $this->productId = $productId;
          $this->weightId = $weightId;
          $this->fileExtensions = $fileExtensions;
     }

     public function search()
     {
          $results = $this->searchImage($this->directory, $this->productId, $this->weightId, $this->fileExtensions);

          if (!empty($results)) {
               return $results;
          } else {
               return "No files found with the specified criteria in the directory '{$this->directory}'";
          }
     }

     private function searchImage($directory, $productId, $weightId, $fileExtensions)
     {
          $results = [];
          $handle = opendir($directory);

          while (($entry = readdir($handle)) !== false) {
               if ($entry === '.' || $entry === '..') {
                    continue;
               }

               $fullPath = $directory . '/' . $entry;

               if (is_dir($fullPath)) {
                    $subResults = $this->searchImage($fullPath, $productId, $weightId, $fileExtensions);
                    $results = array_merge($results, $subResults);
               } elseif (is_file($fullPath)) {
                    // Check if the file name contains productId, weightId, and has a valid extension
                    $filename = pathinfo($fullPath, PATHINFO_FILENAME);
                    $extension = pathinfo($fullPath, PATHINFO_EXTENSION);
                    $parts = explode('_', $filename);
                    $foundProductId = false;
                    $foundWeightId = false;
                    $validExtension = in_array(strtolower($extension), $fileExtensions);

                    foreach ($parts as $part) {
                         if (strpos($part, 'partsId=') !== false) {
                              $partProductId = substr($part, strpos($part, 'partsId=') + strlen('partsId='));
                              if ($partProductId == $productId) {
                                   $foundProductId = true;
                              }
                         }

                         if (strpos($part, 'categoryItemId=') !== false) {
                              $partWeightId = substr($part, strpos($part, 'categoryItemId=') + strlen('categoryItemId='));
                              if ($partWeightId == $weightId) {
                                   $foundWeightId = true;
                              }
                         }
                    }

                    if ($foundProductId && $foundWeightId && $validExtension) {
                         $results[] = $fullPath;
                    }
               }
          }

          closedir($handle);

          return $results;
     }
}
