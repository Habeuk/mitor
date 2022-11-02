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
 *      },
 *      "mitor_testimonial_image_svg" = {
 *       "label" = @Translation("mitor testimonial image svg")
 *      } 
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
                    'single-testimonial--flex' => 'flex',
                    'single-testimonial--skeumorphisme' => 'skeumorphism'
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
                    'mitor_testimonial_image_svg' => [
                        'text_html' => [
                            'label' => 'Image Svg',
                            'value' => '<svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="15" height="15"
                                                preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32">
                                            <path
                                                    d="M31.937 6.093a13.359 13.359 0 0 1-3.765 1.032a6.603 6.603 0 0 0 2.885-3.631a13.683 13.683 0 0 1-4.172 1.579a6.56 6.56 0 0 0-11.178 5.973c-5.453-.255-10.287-2.875-13.52-6.833a6.458 6.458 0 0 0-.891 3.303a6.555 6.555 0 0 0 2.916 5.457a6.518 6.518 0 0 1-2.968-.817v.079a6.567 6.567 0 0 0 5.26 6.437a6.758 6.758 0 0 1-1.724.229c-.421 0-.823-.041-1.224-.115a6.59 6.59 0 0 0 6.14 4.557a13.169 13.169 0 0 1-8.135 2.801a13.01 13.01 0 0 1-1.563-.088a18.656 18.656 0 0 0 10.079 2.948c12.067 0 18.661-9.995 18.661-18.651c0-.276 0-.557-.021-.839a13.132 13.132 0 0 0 3.281-3.396z" />
                                        </svg>',
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
 