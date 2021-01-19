  
  <?php foreach ($products as $product) { ?>

  
  <ul class="collection">
    <li class="collection-item avatar">
      <img src="/<?= $product ->picture1;?>" alt="Product" class="circle">
      <span class="title"><?= $product->productName;?></span>
      <p><?= $product->preis;?> Fr<br>
         <?= $product->beschriebungSmall;?><br>
         Qty. <?= $shoppingCartRepository->groupByProduct_id($product->id);?>
      </p>
      <a class="secondary-content" title="Delete" href="/shoppingcart/deleteProduct?productId=<?= $product->id ?>"><i class="material-icons">delete_forever</i></a>
    </li>
  </ul>
<?php }?>


