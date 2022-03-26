<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="qodef-on-side-search-form" method="get">
    <div class="qodef-form-holder">
        <div class="qodef-form-holder-inner">
            <div class="qodef-field-holder">
                <input type="text" placeholder="<?php esc_attr_e( 'Type here', 'stal-core' ); ?>" name="s" class="qodef-search-field" autocomplete="off" required/>
            </div>
            <button class="qodef-onside-btn" type="submit">
                <span class="qodef-onside-btn-icon"></span>
            </button>
        </div>
    </div>
</form>