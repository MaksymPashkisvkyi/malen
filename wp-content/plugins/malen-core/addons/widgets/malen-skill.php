<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Border;
use \Elementor\Repeater;
/**
 *
 * Skill Widget .
 *
 */
class Malen_Skill extends Widget_Base {

	public function get_name() {
		return 'malenskill';
	}

	public function get_title() {
		return __( 'Skill Bar', 'malen' );
	}


	public function get_icon() {
		return 'th-icon';
    }


	public function get_categories() {
		return [ 'malen' ];
	}


	protected function register_controls() {

    $this->start_controls_section(
			'skill_bar_section',
				[
					'label' 	=> __( 'Skill Bar', 'malen' ),
					'tab' 		=> Controls_Manager::TAB_CONTENT,
				]
    );

    $this->add_control(
            'layout_style',
            [
                'label' 	=> __( 'Layout Style', 'malen' ),
                'type' 		=> Controls_Manager::SELECT,
                'default' 	=> '1',
                'options' 	=> [
                    '1'  		=> __( 'Style One', 'malen' ),
                ],
            ]
    );

    // $this->add_control(
    //     'title',
    //         [
    //         'label'         => __( 'Title', 'malen' ),
    //         'type'          => Controls_Manager::TEXT,
    //         'default'       => __( 'Skill' , 'malen' ),
    //         'label_block'   => true,
    //         ]
    // );

	$repeater = new Repeater();

	$repeater->add_control(
        'skill_title',
            [
            'label'         => __( 'Title', 'malen' ),
            'type'          => Controls_Manager::TEXT,
            'default'       => __( 'Skill' , 'malen' ),
            'label_block'   => true,
            ]
    );

    $repeater->add_control(
        'skill_num',
            [
            'label'         => __( 'Number', 'malen' ),
            'type'          => Controls_Manager::TEXT,
            'default'       => __( '90' , 'malen' ),
            'label_block'   => true,
            ]
    );

	$this->add_control(
        'skill_lists',
        [
            'label' 		=> __( 'Skill Lists', 'malen' ),
            'type' 			=> Controls_Manager::REPEATER,
            'fields' 		=> $repeater->get_controls(),
            'default' 		=> [
                    [
                        'skill_title' 		=> __( 'Title', 'malen' ),
                    ],
            ],
        ]
	);

    $this->end_controls_section();

    //---------------------------------------
        //Style Section Start
    //---------------------------------------

	//-------------------------------------General styling-------------------------------------//

    $this->start_controls_section(
        'general_section',
        [
            'label' => __( 'General Style', 'malen' ),
            'tab' 	=> Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_control(
        'general_color',
        [
            'label' 	=> __( 'Background', 'malen' ),
            'type' 		=> Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .skill-card' => 'background-color: {{VALUE}}!important;',
            ],
        ]
    );

    $this->add_responsive_control(
        'general_padding',
        [
            'label' 		=> __( 'Padding', 'tayde' ),
            'type' 			=> Controls_Manager::DIMENSIONS,
            'size_units' 	=> [ 'px', '%', 'em' ],
            'selectors' 	=> [
                '{{WRAPPER}} .skill-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ]
        ]
    );

    $this->add_control(
        'general_color2',
        [
            'label' 	=> __( 'Bar Color', 'malen' ),
            'type' 		=> Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .progress-content' => 'background-color: {{VALUE}}!important;',
            ],
        ]
    );

    $this->end_controls_section();

	//---------------------------------------Title Style---------------------------------------//
    $this->start_controls_section(
        'title_style',
        [
            'label' 	=> __( 'Title Style', 'tayde' ),
            'tab' 		=> Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_control(
        'title_color',
        [
            'label' 		=> __( 'Color', 'tayde' ),
            'type' 			=> Controls_Manager::COLOR,
            'selectors' 	=> [
                '{{WRAPPER}} .th-title' => 'color: {{VALUE}} !important',
            ],
        ]
    );

    $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name' 		=> 'title_typography',
            'label' 	=> __( 'Typography', 'tayde' ),
            'selector' 	=> '{{WRAPPER}} .th-title',
        ]
    );

    $this->add_responsive_control(
        'title_margin',
        [
            'label' 		=> __( 'Margin', 'tayde' ),
            'type' 			=> Controls_Manager::DIMENSIONS,
            'size_units' 	=> [ 'px', '%', 'em' ],
            'selectors' 	=> [
                '{{WRAPPER}} .th-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ]
        ]
    );

    $this->add_responsive_control(
        'title_padding',
        [
            'label' 		=> __( 'Padding', 'tayde' ),
            'type' 			=> Controls_Manager::DIMENSIONS,
            'size_units' 	=> [ 'px', '%', 'em' ],
            'selectors' 	=> [
                '{{WRAPPER}} .th-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ]
        ]
    );

    $this->end_controls_section();

    //-------------------------------------Number styling-------------------------------------//
    $this->start_controls_section(
        'content_style_section',
        [
            'label' => __( 'Label Style', 'malen' ),
            'tab' 	=> Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_control(
        'content_color',
        [
            'label' 	=> __( 'Color', 'malen' ),
            'type' 		=> Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .progress-title-holder, {{WRAPPER}} .progress-number-mark' => 'color: {{VALUE}}!important;',
            ],
        ]
    );

    $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name' 		=> 'content_typography',
            'label' 	=> __( '  Typography', 'malen' ),
            'selector' 	=> '{{WRAPPER}} .progress-title-holder, {{WRAPPER}} .progress-number-mark',
        ]
    );

    $this->end_controls_section();


	}

	protected function render() {

    $settings = $this->get_settings_for_display();
    ?>

    <?php if( $settings['layout_style'] == '2' ): ?>

    <?php else: ?>
        <div class="skill-card">
            <?php foreach( $settings['skill_lists'] as $data ): ?>
                <div class="skill-feature">
                    <div class="progress-bar" data-percentage="<?php echo esc_attr($data['skill_num']) ?>%">
                        <h4 class="progress-title-holder"><?php echo esc_html($data['skill_title']) ?> <span class="progress-number-wrapper">
                                <span class="progress-number-mark">
                                    <span class="percent"></span>
                                </span>
                            </span>
                        </h4>
                        <div class="progress-content-outter">
                            <div class="progress-content"></div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        
    <?php endif; 

	}

}