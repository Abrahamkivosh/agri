<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
global $post, $product;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>

<?php
	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked woocommerce_show_messages - 10
	 */
	 do_action( 'woocommerce_before_single_product' );
?>

<div itemscope itemtype="http://schema.org/Product" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	
	<!-- left -->
	<div class="left">
	<?php
		/**
		 * woocommerce_show_product_images hook
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		do_action( 'woocommerce_before_single_product_summary' );
	?>

	<?php
		/**
		 * woocommerce_after_single_product_summary hook
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action( 'woocommerce_after_single_product_summary' );
	?>
	</div>
	<!-- end left -->
	
	<!-- mid -->
	<div class="mid">
		<div class="summary entry-summary">
			<!-- header -->
		<div class="product-name">
			<h1><?php the_title(); ?></h1>
			
			<!-- price -->
			<div class="price">
				<?php echo $product->get_price_html(); ?>
			</div>
		</div> 
		<!-- end header -->
		
		<!-- addthis social share btns -->
		<div class="addthis_toolbox addthis_default_style ">
			<a class="addthis_button_preferred_1"></a>
			<a class="addthis_button_preferred_2"></a>
			<a class="addthis_button_preferred_3"></a>
			<a class="addthis_button_preferred_4"></a>
			<a class="addthis_button_compact"></a>
			<a class="addthis_counter addthis_bubble_style"></a>
		</div>
		<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
		<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-527b7e157068cd4f"></script>
		<!-- end addthis social share btns -->
		
			<?php the_content(); ?>
			<?php
				/**
				* woocommerce_single_product_summary hook
				*
				* @hooked woocommerce_template_single_title - 5
				* @hooked woocommerce_template_single_price - 10
				* @hooked woocommerce_template_single_excerpt - 20
				* @hooked woocommerce_template_single_add_to_cart - 30
				* @hooked woocommerce_template_single_meta - 40
				* @hooked woocommerce_template_single_sharing - 50
				*/
				do_action( 'woocommerce_single_product_summary' );
			?>
		</div>
	</div>
	<!-- end mid -->
	
	<!-- right -->
	<div class="right">
		<?php
		/**
		 * woocommerce_sidebar hook
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action('woocommerce_sidebar');
	?>
	
	
	</div>
	<!-- end right -->

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>