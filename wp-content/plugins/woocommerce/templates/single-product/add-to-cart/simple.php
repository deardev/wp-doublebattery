<?php
/**
 * Simple product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/simple.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

if ( ! $product->is_purchasable() ) {
	return;
}

echo wc_get_stock_html( $product );

if ( $product->is_in_stock() ) : ?>

	<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>
<!--***** added for modal popup ******* -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<!-- ******* end ***** -->
<div class="container">
	<form class="cart" id="thisform" action="<?php echo esc_url( get_permalink() ); ?>" method="post" enctype='multipart/form-data'>
		<?php
			/**
			 * @since 2.1.0.
			 */
			do_action( 'woocommerce_before_add_to_cart_button' );

			/**
			 * @since 3.0.0.
			 */
			do_action( 'woocommerce_before_add_to_cart_quantity' );

			woocommerce_quantity_input( array(
				'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
				'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
				'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( $_POST['quantity'] ) : $product->get_min_purchase_quantity(),
			) );


			$primary_product_id = esc_attr( $product->get_id() );
			//echo $primary_product_id;
			//echo $add_to_cart_url = esc_url_raw( add_query_arg( 'add-to-cart', $primary_product_id, wc_get_checkout_url() ) );
			$add_to_cart_url = esc_html( wc_get_cart_url() );
			//WC()->cart->add_to_cart( $primary_product_id );


			/**
			 * @since 3.0.0.
			 */
			do_action( 'woocommerce_after_add_to_cart_quantity' );
		?>
<style>
				/* The Modal (background) */
                                .modal {
                                    display: none; /* Hidden by default */
                                    position: fixed; /* Stay in place */
                                    z-index: 9999; /* Sit on top */
                                    padding-top: 150px; /* Location of the box */
                                    /*left: 0;
                                    top: 0;*/
                                    width: 100%; /* Full width */
                                    height: 100%; /* Full height */
                                    overflow: auto; /* Enable scroll if needed */
                                    background-color: rgb(0,0,0); /* Fallback color */
                                    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
                                    bottom: 0;
				    /*display: table;
				    table-layout: fixed;*/

                                }
                               /* Modal Content */
                                .modal-content {
                                    background-color: #fefefe;
                                    margin: auto;
                                    padding: 20px;
                                    border: 1px solid #888;
                                    width: 65%; 
                                    height: 95%;
                                    overflow-x:auto;
                                    overflow-y:auto;
                                }
                                /* Success Message */
                                .success_msg_class {
                                    display: none; /* Hidden by default */
                                }
                                
                                /* Success Message */
                                .view_cart_class {
                                    display: none; /* Hidden by default */
                                }

                                
                                /* end*/
</style>


		<button type="button" name="add-to-cart" id="myBtn" value="<?php echo esc_attr( $product->get_id() ); ?>" class="single_add_to_cart_button button alt"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>
			<!-- The Modal -->
	                <div id="myModal" class="modal">
	                 
	                  <!-- Modal content -->
	                  <div class="modal-content" style="overflow-x:auto; overflow-y:auto;">
	                  	<div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <h4 class="modal-title">Please select atleast one</h4>
			        </div>
	                    <!-- <span class="close">&times;</span> -->
	                    <p> 
				<div style="overflow-x:auto;">
	                    	<table width="90%" >
	                    	 <tr>
				    <?php 
				    /*'posts_per_page' => 3, */
				        $args = array( 'post_type' => 'product',  'product_cat' => 'Lenses', 'orderby' => 'rand' );
				        $loop = new WP_Query( $args );
				        while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
				
				           
					<td align="left" valign="middle" style="border:none;">
				                <input type="radio" name="radiolenses" id="choices_<?php the_ID(); ?>" value = "<?php the_ID(); ?>" checked="checked"><?php the_content(); ?>&nbsp;&nbsp;&nbsp;</td>
				                <td align="left" valign="middle" style="border:none;">
				<?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" width="10px" height="10px" />'; ?>
				                </td>
				
				    <?php endwhile; ?>
				    <?php wp_reset_postdata(); ?>
				<!--/.products-->
				
				 </tr>
				 
				</table>
				</div>
				<div width="100%" style="text-align:right;">
					 <div align="right" valign="middle"  style="border:none; text-align:right;"><button type="submit" name="add-to-cart" id="myBtn2" value="<?php echo esc_attr( $product->get_id() ); ?>" class="single_add_to_cart_button button alt right"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button></div>&nbsp;&nbsp;
					 <div align="right" valign="middle" colspan="2" style="border:none; text-align:left;"><div id="success_msg_id" class="success_msg_class"><p>Both Your Products Added to Cart Successfully!</p></div></div>&nbsp;&nbsp;
					 <div align="right" valign="middle" colspan="2" style="border:none; text-align:left;"><div><a href="<?php echo $add_to_cart_url ?>" id="view_cart_id" class="view_cart_class">View Cart!</a></div></div>

				 </div>
	                    <?php
	                    /*
	                   	$category_detail=get_the_category('22');//$post->ID
				foreach($category_detail as $cd){
				echo " Test1";
				}
				*
				foreach((get_the_category()) as $category) {
				 echo $category->cat_name . ' ';
				 echo "test". " ";
				} */
				// echo get_cat_name(46);
	                    ?>
	                    
	                    </p>
                                
                                <script>
					console.log('Beginning Script..........');
					// Get the modal
					var modal = document.getElementById('myModal');
					
					// Get the button that opens the modal
					var btn = document.getElementById("myBtn");
					
					// Get the button of the modal
					var btn2 = document.getElementById("myBtn2");
					
					// Get the success message div
					var success_msg_div = document.getElementById("success_msg_id");
					
					// Get the view_cart link div
					var view_cart_div = document.getElementById("view_cart_id");

					// Get the <span> element that closes the modal
					var span = document.getElementsByClassName("close")[0];
					
					// When the user clicks the button, open the modal 
					btn.onclick = function() {
					    modal.style.display = "block";
					    success_msg_div.style.display = "none";
					    view_cart_div.style.display = "none";
					    btn2.disabled = false;
					    btn2.innerHTML("Add to Cart");
					    btn2.text("Add to Cart");
					    btn2.html("Add to Cart");
					    btn2.value("Add to Cart");
					}
					
					// When the user clicks on <span> (x), close the modal
					span.onclick = function() {
					    modal.style.display = "none";
					}
					
					// When the user clicks anywhere outside of the modal, do not close it
					window.onclick = function(event) {
					    if (event.target == modal) {
					        modal.style.display = "block";
					    }
					}
                                </script>
			        <script type="text/javascript">
					console.log('Second Script..........');
					var primary_prod_id = '<?php echo $primary_product_id ?>';
					//var add_primary_to_cart_uri = '<?php /*echo $add_to_cart_url*/ ?>';
					var add_to_cart_uri = '<?php echo $add_to_cart_url ?>';
					var theme_path = '<?php echo get_template_directory_uri() ?>';
					var support_file_path = theme_path + '/woocommerce/single-product/simple_support.php';
					console.log(support_file_path);

					(function($){
						$('#myBtn2').click(function() {
						    $('#myBtn2').text('Please Wait...');
						    var secondary_prod_id = $('input[name=radiolenses]:checked', '#thisform').val();
						    
						    $.get(add_to_cart_uri + '?add-to-cart=' + primary_prod_id, function(){
							$.get(add_to_cart_uri + '?add-to-cart=' + secondary_prod_id, function(){
							    $('#myBtn2').text('Add to Cart!');
							    $('#myBtn2').prop('disabled', true);
							    view_cart_div.style.display = "block";
							    success_msg_div.style.display = "block";
							});
						    });
						
						    return false;
						});
					})(jQuery);
					console.log('Script Ends..........');
			        </script>
                             </div>   
			</div>
		<?php
			/**
			 * @since 2.1.0.
			 */
			do_action( 'woocommerce_after_add_to_cart_button' );
		?>
	</form>
</div>
	<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

<?php endif; ?>
