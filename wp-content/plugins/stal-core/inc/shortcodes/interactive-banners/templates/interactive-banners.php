<?php $i = 0; ?>
<?php $j = 0; ?>
<?php $f = $number_of_items_numeric; ?>

<div class="qodef-interactive-banners <?php echo esc_attr($holder_classes); ?>">
    <div class="qodef-ib-images-holder">
        <?php foreach ($items as $item) { ?>
            <div class="qodef-ib-image-holder <?php if($i == 0) echo esc_attr('qodef-active'); ?>" style="background-image: url(<?php echo wp_get_attachment_url($item['item_image']); ?>)" data-index="<?php echo esc_attr($i);?>">

            </div>
            <?php 
                $i++; 
            ?>
            <?php if($i == $number_of_items_numeric){
                break;
            } ?>
        <?php } ?>
    </div>
    <?php 
        if ($i == 5) {
    ?>
    <!--INGLES-->
    <div class="qodef-ib-content-holder">
        <?php foreach ($items as $item) { ?>
            <div class="qodef-ib-item <?php if($j == 0) echo esc_attr('qodef-active'); ?>" data-index="<?php echo esc_attr($j);?>" id="qodef-ib-image-holder-<?php echo esc_attr($j);?>">
                <div class="qodef-ib-image-holder-responsive" style="background-image: url(<?php echo wp_get_attachment_url($item['item_image']); ?>)">

                </div>
                <span class="qodef-ib-item-tag"><?php echo wp_kses_post($item['tag']); ?></span>
                <div class="qodef-ib-item-inner">
                    <?php if(!empty($item['small_image'])) : ?>
                    <div class="qodef-ib-item-small-image">
                        <?php echo wp_get_attachment_image($item['small_image'], 'full'); ?>
                    </div>
                    <?php endif; ?>
                    <div class="qodef-ib-item-title" id="qodef-ib-item-title">
                        <?php
                        switch ($j) {
                            case 0:
                        ?>
                                <div style="margin-bottom: 42%;">
                                    <button style="color: #fff; font-size: 24px; border-top: none !important; border-left: none !important; border-right: none !important; border-bottom: 2px #00acec solid; width: 90%; background: none; text-align: left; padding-bottom: 5px; margin-bottom: 20px; cursor: pointer;" onclick="location.href='http://cemarin.org/our-mission-and-vision/'">
                                        OUR MISSION AND VISION
                                    </button>
                                    <button style="color: #fff; font-size: 24px; border-top: none !important; border-left: none !important; border-right: none !important; border-bottom: 2px #00acec solid; width: 90%; background: none; text-align: left; padding-bottom: 5px; margin-bottom: 20px; cursor: pointer;" onclick="location.href='http://cemarin.org/networks/'">
                                        CEMARIN NETWORKS
                                    </button>
                                    <button style="color: #fff; font-size: 24px; border-top: none !important; border-left: none !important; border-right: none !important; border-bottom: 2px #00acec solid; width: 90%; background: none; text-align: left; padding-bottom: 5px; margin-bottom: 20px; cursor: pointer;" onclick="location.href='http://cemarin.org/upcoming-events/'">
                                        UPCOMING EVENTS
                                    </button>
                                    <button style="color: #fff; font-size: 24px; border-top: none !important; border-left: none !important; border-right: none !important; border-bottom: 2px #00acec solid; width: 90%; background: none; text-align: left; padding-bottom: 5px; margin-bottom: 20px; cursor: pointer;" onclick="location.href='http://cemarin.org/icms/'">
                                        ICMS
                                    </button>
                                </div>
                        <?php
                                break;
                            case 1:
                        ?>
                                <div style="margin-bottom: 50%;">
                                    <button style="color: #fff; font-size: 24px; border-top: none !important; border-left: none !important; border-right: none !important; border-bottom: 2px #00acec solid; width: 90%; background: none; text-align: left; padding-bottom: 5px; margin-bottom: 20px; cursor: pointer;" onclick="location.href='http://cemarin.org/open-calls/'">
                                        CALLS
                                    </button>
                                    <button style="color: #fff; font-size: 24px; border-top: none !important; border-left: none !important; border-right: none !important; border-bottom: 2px #00acec solid; width: 90%; background: none; text-align: left; padding-bottom: 5px; margin-bottom: 20px; cursor: pointer;" onclick="location.href='http://cemarin.org/training/'">
                                        TRAINING
                                    </button>
                                </div>
                        <?php
                                break;
                            case 2:
                        ?>
                                <div style="margin-bottom: 50%;">
                                    <button style="color: #fff; font-size: 24px; border-top: none !important; border-left: none !important; border-right: none !important; border-bottom: 2px #00acec solid; width: 90%; background: none; text-align: left; padding-bottom: 5px; margin-bottom: 20px; cursor: pointer;" onclick="location.href='http://cemarin.org/strategic-research-plan/'">
                                        STRATEGIC RESEARCH PLAN
                                    </button>
                                    <button style="color: #fff; font-size: 24px; border-top: none !important; border-left: none !important; border-right: none !important; border-bottom: 2px #00acec solid; width: 90%; background: none; text-align: left; padding-bottom: 5px; margin-bottom: 20px; cursor: pointer;" onclick="location.href='http://cemarin.org/our-researchers/'">
                                        OUR RESEARCHERS
                                    </button>
                                    <button style="color: #fff; font-size: 24px; border-top: none !important; border-left: none !important; border-right: none !important; border-bottom: 2px #00acec solid; width: 90%; background: none; text-align: left; padding-bottom: 5px; margin-bottom: 20px; cursor: pointer;" onclick="location.href='http://cemarin.org/projects/'">
                                        PROJECTS
                                    </button>
                                    <button style="color: #fff; font-size: 24px; border-top: none !important; border-left: none !important; border-right: none !important; border-bottom: 2px #00acec solid; width: 90%; background: none; text-align: left; padding-bottom: 5px; margin-bottom: 20px; cursor: pointer;" onclick="location.href='http://cemarin.org/innovation/'">
                                        INNOVATION
                                    </button>
                                </div>
                        <?php
                                break;
                            case 3:
                        ?>
                                <div style="margin-bottom: 50%;">
                                    <button style="color: #fff; font-size: 24px; border-top: none !important; border-left: none !important; border-right: none !important; border-bottom: 2px #00acec solid; width: 90%; background: none; text-align: left; padding-bottom: 5px; margin-bottom: 20px; cursor: pointer;" onclick="location.href='http://cemarin.org/manifesto/'">
                                        MANIFESTO
                                    </button>
                                    <button style="color: #fff; font-size: 24px; border-top: none !important; border-left: none !important; border-right: none !important; border-bottom: 2px #00acec solid; width: 90%; background: none; text-align: left; padding-bottom: 5px; margin-bottom: 20px; cursor: pointer;" onclick="location.href='http://cemarin.org/sonar-magazine/'">
                                        SONAR MAGAZINE
                                    </button>
                                    <button style="color: #fff; font-size: 24px; border-top: none !important; border-left: none !important; border-right: none !important; border-bottom: 2px #00acec solid; width: 90%; background: none; text-align: left; padding-bottom: 5px; margin-bottom: 20px; cursor: pointer;" onclick="location.href='http://cemarin.org/podcast/'">
                                        PODCAST
                                    </button>
                                    <button style="color: #fff; font-size: 24px; border-top: none !important; border-left: none !important; border-right: none !important; border-bottom: 2px #00acec solid; width: 90%; background: none; text-align: left; padding-bottom: 5px; margin-bottom: 20px; cursor: pointer;" onclick="location.href='http://cemarin.org/video-library/'">
                                        VIDEO LIBRARY
                                    </button>
                                </div>
                        <?php
                                break;
                            case 4:
                        ?>
                                <div style="margin-bottom: 50%;">
                                    <button style="color: #fff; font-size: 24px; border-top: none !important; border-left: none !important; border-right: none !important; border-bottom: 2px #00acec solid; width: 90%; background: none; text-align: left; padding-bottom: 5px; margin-bottom: 20px; cursor: pointer;" onclick="location.href='http://cemarin.org/management-bodies/'">
                                        MANAGEMENT BODIES
                                    </button>
                                    <button style="color: #fff; font-size: 24px; border-top: none !important; border-left: none !important; border-right: none !important; border-bottom: 2px #00acec solid; width: 90%; background: none; text-align: left; padding-bottom: 5px; margin-bottom: 20px; cursor: pointer;" onclick="location.href='http://cemarin.org/staff/'">
                                        STAFF
                                    </button>
                                    <button style="color: #fff; font-size: 24px; border-top: none !important; border-left: none !important; border-right: none !important; border-bottom: 2px #00acec solid; width: 90%; background: none; text-align: left; padding-bottom: 5px; margin-bottom: 20px; cursor: pointer;" onclick="location.href='http://cemarin.org/work-with-us/'">
                                        WORK WITH US
                                    </button>
                                    <button style="color: #fff; font-size: 24px; border-top: none !important; border-left: none !important; border-right: none !important; border-bottom: 2px #00acec solid; width: 90%; background: none; text-align: left; padding-bottom: 5px; margin-bottom: 20px; cursor: pointer;" onclick="location.href='http://cemarin.org/legal/'">
                                        LEGAL
                                    </button>
                                </div>
                        <?php
                                break;
                        }
                        ?>    
                        
                        <h3> <?php echo wp_kses_post($item['title']); ?> </h3>
                    </div>
                    <div class="qodef-ib-item-subtitle">
                        <p> <?php echo esc_html($item['subtitle']); ?> </p>
                    </div>
                    <?php if(!empty($item['link'])){?>
                        <div class="qodef-ib-item-btn-holder">
                                <?php

                                    if(empty($item['link_text'])){
                                        $item['link_text'] = esc_html__('Subscribe', 'stal-core');
                                    }

                                    if(empty($item['link_target'])){
                                        $item['link_target'] = '_blank';
                                    }

                                    $button_params = array(
                                            'text' =>  $item['link_text'],
                                            'link' => $item['link'],
                                            'target' => $item['link_target'],
                                            'button_layout' => 'textual',
                                            'size'          => 'small',
                                    );

                                    echo StalCoreButtonShortcode::call_shortcode( $button_params );
                                ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <?php $j++; ?>
            <?php if($j == $number_of_items_numeric){
                break;
            } ?>
        <?php } ?>
    </div>
    <!--INGLES-->
    <?php
        } else {
    ?>
    <!--ESPA??OL-->
    <div class="qodef-ib-content-holder">
        <?php foreach ($items as $item) { ?>
            <div class="qodef-ib-item <?php if($j == 0) echo esc_attr('qodef-active'); ?>" data-index="<?php echo esc_attr($j);?>" id="qodef-ib-image-holder-<?php echo esc_attr($j);?>">
                <div class="qodef-ib-image-holder-responsive" style="background-image: url(<?php echo wp_get_attachment_url($item['item_image']); ?>)">

                </div>
                <span class="qodef-ib-item-tag"><?php echo wp_kses_post($item['tag']); ?></span>
                <div class="qodef-ib-item-inner">
                    <?php if(!empty($item['small_image'])) : ?>
                    <div class="qodef-ib-item-small-image">
                        <?php echo wp_get_attachment_image($item['small_image'], 'full'); ?>
                    </div>
                    <?php endif; ?>
                    <div class="qodef-ib-item-title" id="qodef-ib-item-title">
                        <?php
                        switch ($j) {
                            case 0:
                        ?>
                                <div style="margin-bottom: 42%;">
                                    <button style="color: #fff; font-size: 24px; border-top: none !important; border-left: none !important; border-right: none !important; border-bottom: 2px #00acec solid; width: 90%; background: none; text-align: left; padding-bottom: 5px; margin-bottom: 20px; cursor: pointer;" onclick="location.href='http://cemarin.org/es/mision-y-vision/'">
                                        NUESTRA MISI??N Y VISI??N
                                    </button>
                                    <button style="color: #fff; font-size: 24px; border-top: none !important; border-left: none !important; border-right: none !important; border-bottom: 2px #00acec solid; width: 90%; background: none; text-align: left; padding-bottom: 5px; margin-bottom: 20px; cursor: pointer;" onclick="location.href='http://cemarin.org/es/redes/'">
                                        REDES CEMARIN
                                    </button>
                                    <button style="color: #fff; font-size: 24px; border-top: none !important; border-left: none !important; border-right: none !important; border-bottom: 2px #00acec solid; width: 90%; background: none; text-align: left; padding-bottom: 5px; margin-bottom: 20px; cursor: pointer;" onclick="location.href='http://cemarin.org/es/proximos-eventos/'">
                                        EVENTOS
                                    </button>
                                    <button style="color: #fff; font-size: 24px; border-top: none !important; border-left: none !important; border-right: none !important; border-bottom: 2px #00acec solid; width: 90%; background: none; text-align: left; padding-bottom: 5px; margin-bottom: 20px; cursor: pointer;" onclick="location.href='http://cemarin.org/es/icms-2/'">
                                        ICMS
                                    </button>
                                </div>
                        <?php
                                break;
                            case 1:
                        ?>
                                <div style="margin-bottom: 50%;">
                                    <button style="color: #fff; font-size: 24px; border-top: none !important; border-left: none !important; border-right: none !important; border-bottom: 2px #00acec solid; width: 90%; background: none; text-align: left; padding-bottom: 5px; margin-bottom: 20px; cursor: pointer;" onclick="location.href='http://cemarin.org/es/convocatorias/'">
                                        CONVOCATORIAS
                                    </button>
                                    <button style="color: #fff; font-size: 24px; border-top: none !important; border-left: none !important; border-right: none !important; border-bottom: 2px #00acec solid; width: 90%; background: none; text-align: left; padding-bottom: 5px; margin-bottom: 20px; cursor: pointer;" onclick="location.href='http://cemarin.org/es/capacitacion/'">
                                        FORMACI??N
                                    </button>
                                </div>
                        <?php
                                break;
                            case 2:
                        ?>
                                <div style="margin-bottom: 50%;">
                                    <button style="color: #fff; font-size: 24px; border-top: none !important; border-left: none !important; border-right: none !important; border-bottom: 2px #00acec solid; width: 90%; background: none; text-align: left; padding-bottom: 5px; margin-bottom: 20px; cursor: pointer;" onclick="location.href='http://cemarin.org/es/plan-estrategico-de-investigacion/'">
                                        PLAN ESTRAT??GICO DE INVESTIGACI??N
                                    </button>
                                    <button style="color: #fff; font-size: 24px; border-top: none !important; border-left: none !important; border-right: none !important; border-bottom: 2px #00acec solid; width: 90%; background: none; text-align: left; padding-bottom: 5px; margin-bottom: 20px; cursor: pointer;" onclick="location.href='http://cemarin.org/es/investigadores/'">
                                        NUESTROS INVESTIGADORES
                                    </button>
                                    <button style="color: #fff; font-size: 24px; border-top: none !important; border-left: none !important; border-right: none !important; border-bottom: 2px #00acec solid; width: 90%; background: none; text-align: left; padding-bottom: 5px; margin-bottom: 20px; cursor: pointer;" onclick="location.href='http://cemarin.org/es/proyectos/'">
                                        PROYECTOS
                                    </button>
                                    <button style="color: #fff; font-size: 24px; border-top: none !important; border-left: none !important; border-right: none !important; border-bottom: 2px #00acec solid; width: 90%; background: none; text-align: left; padding-bottom: 5px; margin-bottom: 20px; cursor: pointer;" onclick="location.href='http://cemarin.org/es/innovacion/'">
                                        INNOVACI??N
                                    </button>
                                </div>
                        <?php
                                break;
                            case 3:
                        ?>
                                <div style="margin-bottom: 50%;">
                                    <button style="color: #fff; font-size: 24px; border-top: none !important; border-left: none !important; border-right: none !important; border-bottom: 2px #00acec solid; width: 90%; background: none; text-align: left; padding-bottom: 5px; margin-bottom: 20px; cursor: pointer;" onclick="location.href='http://cemarin.org/es/manifiesto/'">
                                        MANIFIESTO
                                    </button>
                                    <button style="color: #fff; font-size: 24px; border-top: none !important; border-left: none !important; border-right: none !important; border-bottom: 2px #00acec solid; width: 90%; background: none; text-align: left; padding-bottom: 5px; margin-bottom: 20px; cursor: pointer;" onclick="location.href='http://cemarin.org/es/revista-sonar/'">
                                        REVISTA SONAR
                                    </button>
                                    <button style="color: #fff; font-size: 24px; border-top: none !important; border-left: none !important; border-right: none !important; border-bottom: 2px #00acec solid; width: 90%; background: none; text-align: left; padding-bottom: 5px; margin-bottom: 20px; cursor: pointer;" onclick="location.href='http://cemarin.org/es/podcast-2/'">
                                        PODCAST
                                    </button>
                                    <button style="color: #fff; font-size: 24px; border-top: none !important; border-left: none !important; border-right: none !important; border-bottom: 2px #00acec solid; width: 90%; background: none; text-align: left; padding-bottom: 5px; margin-bottom: 20px; cursor: pointer;" onclick="location.href='http://cemarin.org/es/libreria-de-videos/'">
                                        VIDEO
                                    </button>
                                </div>
                        <?php
                                break;
                            case 4:
                        ?>
                                <div style="margin-bottom: 50%;">
                                    <button style="color: #fff; font-size: 24px; border-top: none !important; border-left: none !important; border-right: none !important; border-bottom: 2px #00acec solid; width: 90%; background: none; text-align: left; padding-bottom: 5px; margin-bottom: 20px; cursor: pointer;" onclick="location.href='http://cemarin.org/es/organos-de-direccion/'">
                                        ??RGANOS DE ADMINISTRACI??N
                                    </button>
                                    <button style="color: #fff; font-size: 24px; border-top: none !important; border-left: none !important; border-right: none !important; border-bottom: 2px #00acec solid; width: 90%; background: none; text-align: left; padding-bottom: 5px; margin-bottom: 20px; cursor: pointer;" onclick="location.href='http://cemarin.org/es/staff-2/'">
                                        EQUIPO
                                    </button>
                                    <button style="color: #fff; font-size: 24px; border-top: none !important; border-left: none !important; border-right: none !important; border-bottom: 2px #00acec solid; width: 90%; background: none; text-align: left; padding-bottom: 5px; margin-bottom: 20px; cursor: pointer;" onclick="location.href='http://cemarin.org/es/trabaja-con-nosotros/'">
                                        TRABAJE CON NOSOTROS
                                    </button>
                                    <button style="color: #fff; font-size: 24px; border-top: none !important; border-left: none !important; border-right: none !important; border-bottom: 2px #00acec solid; width: 90%; background: none; text-align: left; padding-bottom: 5px; margin-bottom: 20px; cursor: pointer;" onclick="location.href='http://cemarin.org/es/legal-2/'">
                                        LEGAL
                                    </button>
                                </div>
                        <?php
                                break;
                        }
                        ?>    
                        
                        <h3> <?php echo wp_kses_post($item['title']); ?> </h3>
                    </div>
                    <div class="qodef-ib-item-subtitle">
                        <p> <?php echo esc_html($item['subtitle']); ?> </p>
                    </div>
                    <?php if(!empty($item['link'])){?>
                        <div class="qodef-ib-item-btn-holder">
                                <?php

                                    if(empty($item['link_text'])){
                                        $item['link_text'] = esc_html__('Subscribe', 'stal-core');
                                    }

                                    if(empty($item['link_target'])){
                                        $item['link_target'] = '_blank';
                                    }

                                    $button_params = array(
                                            'text' =>  $item['link_text'],
                                            'link' => $item['link'],
                                            'target' => $item['link_target'],
                                            'button_layout' => 'textual',
                                            'size'          => 'small',
                                    );

                                    echo StalCoreButtonShortcode::call_shortcode( $button_params );
                                ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <?php $j++; ?>
            <?php if($j == 5){
                break;
            } ?>
        <?php } ?>
    </div>
    <!--ESPA??OL-->
    <?php
        }
    ?>
    
    <div class="qodef-ib-grid">
        <?php for( $k = 0; $k < 5; $k++ ) { ?>
            <div class="qodef-ib-grid-line">
                <div class="qodef-ib-grid-vertical-line"></div>
            </div>
        <?php } ?>
    </div>
</div>