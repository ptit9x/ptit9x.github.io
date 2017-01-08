<?php
//Flickr widget: 
class MyFlickrWidget extends WP_Widget {

    function MyFlickrWidget() {
        // Instantiate the parent object
        parent::__construct( false, 'Flickr Widget' );
    }

    function widget( $args, $instance ) {
        // Widget output
         extract( $args );
        $title = apply_filters('widget_title', $instance['title'] );
        $flickruser = $instance['name'];
        $numpic = $instance['num'];
        echo $before_widget;
        // Display the widget title 
            
        ?>
             <?php echo $before_title . $title . $after_title; ?>
         <div id="flickrs"></div>
         
         
    <?php
         echo $after_widget;
    }

    function update( $new_instance, $old_instance ) {
        // Save widget options
         $instance = $old_instance;
         $instance['title'] = strip_tags( $new_instance['title'] );
        $instance['name'] = strip_tags( $new_instance['name'] );
        $instance['num'] = strip_tags( $new_instance['num'] );
        return $instance;
    }

    function form( $instance ) {
        // Output admin widget options form
         //Set up some default widget settings.
        $defaults = array( 'title' => __('Photo stream.', 'mint'), 'name' => __('52617155@N08', 'mint'),'num' => __(6, 'mint'), 'show_info' => true );
        $instance = wp_parse_args( (array) $instance, $defaults ); ?>

        
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'mint'); ?></label>
            <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
        </p>

        
        <!--<p>
            <label for="<?php echo $this->get_field_id( 'name' ); ?>"><?php _e('Flickr User ID:', 'mint'); ?></label>
            <input id="<?php echo $this->get_field_id( 'name' ); ?>" name="<?php echo $this->get_field_name( 'name' ); ?>" value="<?php echo $instance['name']; ?>" style="width:100%;" />
        </p>-->
       <!--<p>
            <label for="<?php echo $this->get_field_id( 'num' ); ?>"><?php _e('Count:', 'mint'); ?></label>
            <input id="<?php echo $this->get_field_id( 'num' ); ?>" name="<?php echo $this->get_field_name( 'num' ); ?>" value="<?php echo $instance['num']; ?>" style="width:100%;" />
        </p>-->
        <?php
    }
}
function register_widgets() {
    register_widget( 'MyFlickrWidget' );
}

add_action( 'widgets_init', 'register_widgets' );
?>