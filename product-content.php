<?php
$product_id = get_the_ID();

$product_price = carbon_get_post_meta($product_id, 'product_price');
$product_attributes = carbon_get_post_meta($product_id, 'product_attributes');
$product_img_src = get_the_post_thumbnail_url($product_id, 'product');
$product_img_src_webp = convertToWebpSrc($product_img_src);

$product_categories = get_the_terms($product_id, 'product_categories');
?>

<div class="product catalog__product">
	<?php
	echo '<pre>';
	print_r($product_categories);
	echo '</pre>';
	?>
	<picture>
		<source type="image/webp"
			srcset="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
			data-srcset="<?php echo $product_img_src_webp; ?>">
		<img class="product__img lazy"
			src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
			data-src="<?php echo $product_img_src; ?>" alt="">
	</picture>
	<div class="product__content">
		<h3 class="product__title">
			<?php the_title(); ?>
		</h3>
		<div class="product__description">
			<?php the_excerpt(); ?>
		</div>
	</div>
	<footer class="product__footer">
		<?php if ($product_attributes): ?>
			<div class="product__sizes">
				<?php $is_first_item = true; ?>
				<?php foreach ($product_attributes as $attribute): ?>
					<?php
					$attribute_active_class = $is_first_item ? ' is-active' : ''; ?>
					<button data-product-size-price="<?php echo $attribute['price']; ?>"
						class="product__size<?php echo $attribute_active_class; ?>" type="button"><?php echo $attribute['name']; ?></button>
					<?php
					$is_first_item = false;
				endforeach;
				?>
			</div>
		<?php endif; ?>

		<div class="product__bottom">
			<div class="product__price">
				<span class="product__price-value">
					<?php echo $product_price; ?>
				</span>
				<span class="product__currency">&#8381;</span>
			</div>
			<button class="btn product__btn" type="button" data-popup="popup-order">заказать</button>
		</div>
	</footer>
</div>