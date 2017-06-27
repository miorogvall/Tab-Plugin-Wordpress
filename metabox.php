
<!--<div class="addtab"><div class="addbox"><span>add new tab</span><i class="fa fa-plus addnew" aria-hidden="true"></i></div></div>-->

<!-- i started making so that you could dynamically add new tabs, which is the logical next step but i did not have time to complete it.-->

<div class="tb_shortcodearea"><span class="tb_shortcodetext">Shortcode to display this post: </span><span class="tb_shortcode">[it_tabs id="<? echo  $_GET["post"];?>"]</span></div>
<div class="tb_metabox-holder">
<?

    
 // retrieve saved metadata if exists
    $tabs_name1 = get_post_meta( $post->ID, '_tabs_name1', true );
    $tabs_content1 = get_post_meta( $post->ID, '_tabs_content1', true );
 
    // create a nonce field for verify
    wp_nonce_field( 'it_submit_tabs', 'it_tabs_check' );
 
    // HTML for form
    echo '<div class="tb_fieldleft">
                <label for="tabs1_name" class="tb_label">Tab 1 Name</label>
                <input type="text" class="tb_input_small" name="tabs_name1" size="30" value="' . esc_attr( $tabs_name1 ) . '"> 
            </div>
            <div class="tb_fieldright">
                <label for="tabs1_content" class="tb_label">Tab 1 Content</label>
                <textarea class="tb_input_big" name="tabs_content1" size="50">' . esc_attr( $tabs_content1) . '</textarea></div>';
 ?>
<!--<i class="fa fa-times remove" aria-hidden="true"></i>-->
</div>
<div class="tb_metabox-holder">
<?
 // retrieve saved metadata if  exists
    $tabs_name2 = get_post_meta( $post->ID, '_tabs_name2', true );
    $tabs_content2 = get_post_meta( $post->ID, '_tabs_content2', true );
 
 
     // HTML for form
    echo '<div class="tb_fieldleft">
                <label for="tabs1_name" class="tb_label">Tab 2 Name</label>
                <input type="text" class="tb_input_small" name="tabs_name2" size="30" value="' . esc_attr( $tabs_name2 ) . '"> 
            </div>
            <div class="tb_fieldright">
                <label for="tabs1_content" class="tb_label">Tab 2 Content</label>
                <textarea class="tb_input_big" name="tabs_content2" size="50">' . esc_attr( $tabs_content2) . '</textarea></div>';
 ?>
<!--<i class="fa fa-times remove" aria-hidden="true"></i>-->
</div>

<div class="tb_metabox-holder">
<?
 // retrieve saved metadata if exists
    $tabs_name3 = get_post_meta( $post->ID, '_tabs_name3', true );
    $tabs_content3 = get_post_meta( $post->ID, '_tabs_content3', true );
 

 
     // HTML for form
    echo '<div class="tb_fieldleft">
                <label for="tabs1_name" class="tb_label">Tab 3 Name</label>
                <input type="text" class="tb_input_small" name="tabs_name3" size="30" value="' . esc_attr( $tabs_name3 ) . '"> 
            </div>
            <div class="tb_fieldright">
                <label for="tabs1_content" class="tb_label">Tab 3 Content</label>
                <textarea class="tb_input_big" name="tabs_content3" size="50">' . esc_attr( $tabs_content3) . '</textarea></div>';
 ?>
<!--<i class="fa fa-times remove" aria-hidden="true"></i>-->
</div>

<? $post_id = $_GET["post"];
 $custom_fields = get_post_custom($post_id);

  ?>




