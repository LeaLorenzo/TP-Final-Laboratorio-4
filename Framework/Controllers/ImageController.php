<?php
    namespace Controllers;

    use \Exception as Exception;
    use DAO\ImageDAO as ImageDAO;
    use Models\Image as Image;

    class ImageController
    {
        private $imageDAO;

        public function __construct()
        {
            $this->imageDAO = new ImageDAO();
        }
    
        public function ShowUploadView()
        {
            require_once(VIEWS_PATH."subir-imagen.php");
        }

        public function Upload($file)
        {
            try
            {
                $fileName = $file["name"];
                $tempFileName = $file["tmp_name"];
                $type = $file["type"];
                
                $filePath = UPLOADS_PATH.basename($fileName);            

                $fileType = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));

                $imageSize = getimagesize($tempFileName);

                if($imageSize !== false)
                {
                    if (move_uploaded_file($tempFileName, $filePath))
                    {
                        $image = new Image();
                        $image->setName($fileName);
                        $this->imageDAO->Add($image);

                        $message = "Imagen subida correctamente";
                    }
                    else
                        $message = "Ocurrió un error al intentar subir la imagen";
                }
                else   
                    $message = "El archivo no corresponde a una imágen";
            }
            catch(Exception $ex)
            {
                $message = $ex->getMessage();
            }
        }    
    }
?>