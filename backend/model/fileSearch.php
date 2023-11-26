<?php

## dev by madusha
## date - 2023/10/2

class FileSearch
{
     private $directory;
     private $fileName;
     private $fileExtension;

     public function __construct($directory, $fileName, $fileExtension)
     {
          $this->directory = $directory;
          $this->fileName = $fileName;
          $this->fileExtension = $fileExtension;
     }

     public function search()
     {
          $results = $this->searchFiles($this->directory, $this->fileName, $this->fileExtension);

          if (!empty($results)) {
               return $results;
          } else {
               $extensions = implode(', ', $this->fileExtension);
               return "No files found with the name '{$this->fileName}' and extensions [{$extensions}] in the directory '{$this->directory}'";
          }
     }


     private function searchFiles($directory, $fileName, $fileExtensions)
     {
          $results = [];
          $handle = opendir($directory);

          while (($entry = readdir($handle)) !== false) {
               if ($entry === '.' || $entry === '..') {
                    continue;
               }

               $fullPath = $directory . '/' . $entry;
               $pathInfo = pathinfo($fullPath);

               if (is_dir($fullPath)) {
                    $subResults = $this->searchFiles($fullPath, $fileName, $fileExtensions);
                    $results = array_merge($results, $subResults);
               } elseif (is_file($fullPath) && isset($pathInfo['filename'])) {
                    // Check if the filename matches, regardless of extension
                    if ($pathInfo['filename'] === $fileName) {
                         $extension = isset($pathInfo['extension']) ? $pathInfo['extension'] : '';
                         if (in_array(strtolower($extension), $fileExtensions)) {
                              $results[] = $fullPath;
                         }
                    }
               }
          }

          closedir($handle);

          return $results;
     }
     public function saveImages($imageDataUrls, $filePath, $fileExtension,$fileName) {
          if (!is_dir($filePath)) {
              mkdir($filePath, 0755, true); // Create the directory if it doesn't exist
          }
  
          foreach ($imageDataUrls as $index => $dataUrl) {
              // Generate a unique filename using a timestamp and index
              $imageName ="$fileName.$fileExtension";
              $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $dataUrl));
  
              // Save the image to the specified file path
              $imagePath = $filePath . '/' . $imageName;
              if (file_put_contents($imagePath, $imageData)) {
                  echo "Image saved: $imagePath\n";
              } else {
                  echo "Failed to save image: $imagePath\n";
              }
          }
      }
}
