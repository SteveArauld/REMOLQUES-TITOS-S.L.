@extends('layouts.wp')

@section('content')
@verbatim

				



<form
	id="yith-wcwl-form"
	action="/favoritos/"
	method="post"
	class="woocommerce yith-wcwl-form wishlist-fragment"
	data-fragment-options="{&quot;per_page&quot;:5,&quot;current_page&quot;:1,&quot;pagination&quot;:&quot;no&quot;,&quot;wishlist_id&quot;:false,&quot;action_params&quot;:&quot;&quot;,&quot;no_interactions&quot;:false,&quot;layout&quot;:&quot;&quot;,&quot;wishlist&quot;:false,&quot;is_default&quot;:true,&quot;is_custom_list&quot;:false,&quot;wishlist_token&quot;:&quot;&quot;,&quot;is_private&quot;:false,&quot;count&quot;:0,&quot;page_title&quot;:&quot;&quot;,&quot;default_wishlsit_title&quot;:&quot;&quot;,&quot;page_links&quot;:false,&quot;is_user_logged_in&quot;:false,&quot;is_user_owner&quot;:true,&quot;can_user_edit_title&quot;:false,&quot;show_price&quot;:true,&quot;show_dateadded&quot;:false,&quot;show_stock_status&quot;:true,&quot;show_add_to_cart&quot;:true,&quot;show_remove_product&quot;:false,&quot;add_to_cart_text&quot;:&quot;Ajouter au panier&quot;,&quot;show_ask_estimate_button&quot;:false,&quot;ask_estimate_url&quot;:&quot;&quot;,&quot;price_excl_tax&quot;:false,&quot;show_cb&quot;:false,&quot;show_quantity&quot;:false,&quot;show_variation&quot;:false,&quot;show_price_variations&quot;:false,&quot;show_update&quot;:false,&quot;enable_drag_n_drop&quot;:false,&quot;enable_add_all_to_cart&quot;:false,&quot;move_to_another_wishlist&quot;:false,&quot;repeat_remove_button&quot;:true,&quot;show_last_column&quot;:true,&quot;heading_icon&quot;:&quot;&lt;i class=\&quot;fa heart-outline\&quot;&gt;&lt;\/i&gt;&quot;,&quot;share_enabled&quot;:false,&quot;template_part&quot;:&quot;view&quot;,&quot;additional_info&quot;:false,&quot;available_multi_wishlist&quot;:false,&quot;form_action&quot;:&quot;\/favoritos\/&quot;,&quot;item&quot;:&quot;wishlist&quot;}"
>

	<!-- TITLE -->
	

<!-- WISHLIST TABLE -->
<table class="shop_table cart wishlist_table wishlist_view traditional responsive" data-pagination="no" data-per-page="5" data-page="1" data-id="" data-token="">

    
    <thead>
    <tr>
        
        
        <th class="product-thumbnail"></th>

        <th class="product-name">
            <span class="nobr">
                Product name            </span>
        </th>

                    <th class="product-price">
                <span class="nobr">
                    Unit price                </span>
            </th>
        
        
                    <th class="product-stock-status">
                <span class="nobr">
                    Stock status                </span>
            </th>
        
                    <th class="product-add-to-cart"></th>
        
            </tr>
    </thead>

    <tbody class="wishlist-items-wrapper">
            <tr class="no-products">
            <td colspan="5" class="wishlist-empty">No products added to the wishlist</td>
        </tr>
        </tbody>

</table>
<div class="yith_wcwl_wishlist_footer">
	

	

	
	</div>

<input type="hidden" id="yith_wcwl_edit_wishlist" name="yith_wcwl_edit_wishlist" value="07b1a41fcb" /><input type="hidden" name="_wp_http_referer" value="/favoritos/" /><input type="hidden" value="" name="wishlist_id" id="wishlist_id">


</form>




			
@endverbatim
@endsection
