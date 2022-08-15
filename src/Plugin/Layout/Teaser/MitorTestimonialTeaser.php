<?php

namespace Drupal\mitor\Plugin\Layout\Teaser;

use Drupal\bootstrap_styles\StylesGroup\StylesGroupManager;
use Drupal\formatage_models\FormatageModelsThemes;
use Drupal\formatage_models\Plugin\Layout\Teasers\FormatageModelsTeasers;

/**
 * Mitor testimonial section php
 * @Layout(
 *  id = "mitor_testimonial_section",
 *  label = @Translation("mitor testimonial"),
 *  category = @Translation("mitor"),
 *  path = "layouts/teasers",
 *  template = "mitor-testimonial",
 *  library = "mitor/mitor-testimonial",
 *  default_region = "content",
 *  regions = {
 *      "mitor_testimonial_image" = {
 *       "label" = @Translation("mitor testimonial image"),
 *      },
 *      "mitor_testimonial_message" = {
 *       "label" = @Translation("mitor testimonial message")
 *      },
 *      "mitor_testimonial_name" = {
 *       "label" = @Translation("mitor testimonial name")
 *      },
 *      "mitor_testimonial_job" = {
 *       "label" = @Translation("mitor testimonial job")
 *      },
 *      "mitor_testimonial_rating" = {
 *       "label" = @Translation("mitor testimonial rating")
 *      }
 *      
 *  }
 * )
 */

 class MitorTestimonialTeaser extends FormatageModelsTeasers
 {
    
    /**
     * {@inheritdoc}
     * @see Drupal\formatage_models\Plugin\Layout\FormatageModels::_construct
     */
    public function __construct(array $configuration, $pludin_id, $plugin_definition, StylesGroupManager $styleGroupManager)
    {
        // TODO auto-generated method stub
        parent::__construct($configuration, $pludin_id, $plugin_definition, $styleGroupManager);
        $this->pluginDefinition->set('icon', drupal_get_path('module', 'mitor') . "/icons/teasers/mitor-testimonial.png");
    }   

    /**
     * {@inheritdoc}
     * @see Drupal\formatage_models\Plugin\Layout\FormatageModels::build
     */
    public function build(array $regions)
    {
        // TODO auto-generated method stub
        $build = parent::build($regions);
        FormatageModelsThemes::formatSettingValues($build);

        return $build;
    }

    /**
     * {@inheritdoc}
     */
    public function defaultConfiguration()
    {
        return parent::defaultConfiguration() + [
            'css' => '',
            'load_library' => true,
            "derivate" => [
                'value' => 'simple',
                'options' => [
                    'single-testimonial' => 'simple',
                    'single-testimonial--flex' => 'flat'
                ],
            ],
            'content' => [
                'builder-form' => true,
                'info' => [
                    'title' => 'Testimonial informations',
                    'loader' => 'static',
                ],
                'fields' => [
                    'mitor_testimonial_image' => [
                        'text_html' => [
                            'label' => 'image du temoignage',
                            'value' => '<img src="http://slidesigma.com/themes/html/mitor/assets/img/homepage-1/testimonial-2.jpg" alt="" class="img-back">',
                        ]
                    ],
                    'mitor_testimonial_message' => [
                        'text_html' => [
                            'label' => 'message',
                            'value' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt dignissimos laudantium
                            consequuntur necessitatibus architecto earum et sunt facere similique labore?',
                        ]
                    ],
                    'mitor_testimonial_name' => [
                        'text_html' => [
                            'label' => 'Nom',
                            'value' => 'Jhone doe frinko',
                        ]
                    ],
                    'mitor_testimonial_job' => [
                        'text_html' => [
                            'label' => 'Job',
                            'value' => 'UX Designer',
                        ]
                    ],
                    'mitor_testimonial_rating' => [
                        'text_html' => [
                            'label' => 'Note du témoignage',
                            'value' => '<svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="20" height="20" preserveaspectratio="xMidYMid meet" viewbox="0 0 64 64">
                            <g transform="translate(64 0) scale(-1 1)">
                                <path fill="#ffce31" d="M62 25.2H39.1L32 3l-7.1 22.2H2l18.5 13.7l-7 22.1L32 47.3L50.5 61l-7.1-22.2L62 25.2z"/>
                            </g>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="20" height="20" preserveaspectratio="xMidYMid meet" viewbox="0 0 64 64">
                            <g transform="translate(64 0) scale(-1 1)">
                                <path fill="#ffce31" d="M62 25.2H39.1L32 3l-7.1 22.2H2l18.5 13.7l-7 22.1L32 47.3L50.5 61l-7.1-22.2L62 25.2z"/>
                            </g>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="20" height="20" preserveaspectratio="xMidYMid meet" viewbox="0 0 64 64">
                            <g transform="translate(64 0) scale(-1 1)">
                                <path fill="#ffce31" d="M62 25.2H39.1L32 3l-7.1 22.2H2l18.5 13.7l-7 22.1L32 47.3L50.5 61l-7.1-22.2L62 25.2z"/>
                            </g>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="20" height="20" preserveaspectratio="xMidYMid meet" viewbox="0 0 64 64">
                            <g transform="translate(64 0) scale(-1 1)">
                                <path fill="#ffce31" d="M62 25.2H39.1L32 3l-7.1 22.2H2l18.5 13.7l-7 22.1L32 47.3L50.5 61l-7.1-22.2L62 25.2z"/>
                            </g>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="20" height="20" preserveaspectratio="xMidYMid meet" viewbox="0 0 64 64">
                            <g transform="translate(64 0) scale(-1 1)">
                                <path fill="#ffce31" d="M62 25.2H39.1L32 3l-7.1 22.2H2l18.5 13.7l-7 22.1L32 47.3L50.5 61l-7.1-22.2L62 25.2z"/>
                            </g>
                        </svg>'
                        ],
                    ],
                ],
            ],
        ];
    }
    
 }
 