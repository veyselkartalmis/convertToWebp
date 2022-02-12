<?php
    $directory = "/kaynak_klasor"; //Kaynak klasör 
    $images = glob($directory . "/*png"); //Değiştirilecek dosya uzantısı

    foreach ($images as $image){
        $name = basename($image,".png");
        $imageCreate = imagecreatefromstring(file_get_contents($image));
        ob_start();
        imagejpeg($imageCreate,NULL,100);
        $cont  = ob_get_contents();
        ob_end_clean();
        imagedestroy($imageCreate);
        $content = imagecreatefromstring($cont);
        $output = "hedef_klasor/".$name.".webp"; //Değiştirilen dosyanın yeni konumu
        imagewebp($content, $output, 100);
        imagedestroy($content);
        echo("BAŞARILI");
    }
?>