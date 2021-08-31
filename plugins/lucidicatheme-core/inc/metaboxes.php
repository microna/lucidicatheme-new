<?php


//register metaboxes
function lucidicatheme_add_metabox(){
    add_meta_box('car_metabox', esc_html__('Cars Settings', 'lucidicatheme'), 'lucidicatheme_cars_metabox_html', 'car', 'normal', 'high');

}
add_action('add_meta_boxes', 'lucidicatheme_add_metabox');

//creatwe html for metabox 
function lucidicatheme_cars_metabox_html($post){
    $car_price = get_post_meta($post->ID, 'car_price', true);
    $car_engine = get_post_meta($post->ID, 'car_engine', true);

    //security mesures
    wp_nonce_field('lucidicathemeuserrandomstring', '_carmetabox');

   ?>
<p>
    <label for="car_price"><?php esc_html_e('Car Price','lucidicatheme')?></label>
    <input type="text" id="car_price" name='car_price' value="<?php echo esc_attr__($car_price); ?>">
    </p>
    <p>
    <label for="car_engine"><?php esc_html_e('Car Engine','lucidicatheme')?></label> 
    <select name="car_engine" id="car_engine">
        <option value="">Select Engine</option>
        <option value="manual" <?php if($car_engine == 'manual'){
            echo 'selected';} ?>>Manual</option>
        <option value="auto" <?php if($car_engine == 'auto'){
            echo 'selected'; }?>>Auto</option>
    </select> 
    </p>
   <?php
}

//saving metaboxes
function lucidicatheme_save_metabox($post_id, $post){
    //check if nonce is match
    if(isset($_POST['_carmetabox']) || !wp_verify_nonce($_POST['_carmetabox'], 'lucidicathemeuserrandomstring')){
        return $post_id;
    }

    //if something doing something???
    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
        return $post_id;
    }

    //if current post is that post
    if($post->$post_type != 'car'){
        return $post_id;
    }

    //if current user can edit post
    $post_type = get_post_type_object($post->$post_type );
    if(!current_user_can($post_type->cap->edit_post, $post_id)){
        return $post_id;
    }


    //cheackin is values set for price
   if(isset($_POST['car_price'])){
       update_post_meta($post_id, 'car_price', sanitize_text_field($_POST['car_price']));
   } else{
       delete_post_meta($post_id, 'car_price');
   }
   //checking is values set for engine
   if(isset($_POST['car_engine'])){
       update_post_meta($post_id, 'car_engine', sanitize_text_field($_POST['car_engine']));
   } else{
       delete_post_meta($post_id, 'car_engine');
   }

   return $post_id;
}
add_action('save_post','lucidicatheme_save_metabox', 10, 2);