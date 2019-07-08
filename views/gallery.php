<h2>Изображения</h2>

<? foreach ($pictures as $img): ?>

   <a href="/picture/?id=<?=$img['id']?>">

       <img src="<?= GALLERY_DIR . 'small/' . $img['name']?>" alt="">
   </a>

<?endforeach;?>