<?


function tabs_shortcode( $atts) {

    global $add_my_script;
    $add_my_script = true;
    
	// shortcode id attribute
	$atts = shortcode_atts(
		array(
			'id' => '',
		),
		$atts,
		'link-to-post'
	);

	// return if id has attribute
	if ( isset( $atts['id'] ) ) {
		  $custom_fields = get_post_meta( $atts['id'] );

	}

    return '<div class="tb_tabarea">

    <div class="tb_tabs">
        <ul>
            <li class="tab1">' . $custom_fields["_tabs_name1"][0] . '</li><li class="tab2">' . $custom_fields["_tabs_name2"][0] . '</li><li class="tab3">' . $custom_fields["_tabs_name3"][0]. '</li>
        </ul>
    </div>
    <div class="tb_tabcontent">

        <div class="tb_innercontent tab1">' . $custom_fields["_tabs_content1"][0] . '</div><div class="tb_innercontent tab2">' . $custom_fields["_tabs_content2"][0] . '</div><div class="tb_innercontent tab3">' . $custom_fields["_tabs_content3"][0] . '</div>
    
    </div>
</div>';

}
?>