<?php

namespace Drupal\mitor\Plugin\Layout\Section;

use Drupal\bootstrap_styles\StylesGroup\StylesGroupManager;
use Drupal\formatage_models\FormatageModelsThemes;
use Drupal\formatage_models\Plugin\Layout\Sections\FormatageModelsSection;

/**
 * Mitor 404 not found section php
 * @Layout(
 *  id = "mitor_not_found_section",
 *  label = @Translation("mitor 404 not found section"),
 *  category = @Translation("mitor"),
 *  path = "layouts/sections",
 *  template = "mitor-not-found",
 *  library = "mitor/mitor-not-found",
 *  default_region = "content",
 *  regions = {
 *      "mitor_not_found_image" = {
 *       "label" = @Translation("mitor not found image"),
 *      },
 *      "mitor_not_found_title" = {
 *       "label" = @Translation("mitor not found tilte"),
 *      },
 *      "mitor_not_found_try_again" = {
 *       "label" = @Translation("mitor not found try again link"),
 *      },
 *      "mitor_not_found_back_to_home_button" = {
 *       "label" = @Translation("mitor not found back to home button"),
 *      },
 *      "background_image" = {
 *       "label" = @Translation("mitor not found background image"),
 *      },
 *      
 *  }
 * )
 */

class MitorNotFoundSection extends FormatageModelsSection
{

    /**
     * {@inheritdoc}
     * @see Drupal\formatage_models\Plugin\Layout\FormatageModels::_construct
     */
    public function __construct(array $configuration, $pludin_id, $plugin_definition, StylesGroupManager $styleGroupManager)
    {
        // TODO auto-generated method stub
        parent::__construct($configuration, $pludin_id, $plugin_definition, $styleGroupManager);
        $this->pluginDefinition->set('icon', drupal_get_path('module', 'mitor') . "/icons/sections/mitor-not-found.png");
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
            'content' => [
                'builder-form' => true,
                'info' => [
                    'title' => '404 not found informations',
                    'loader' => 'static',
                ],
                'fields' => [
                    'mitor_not_found_image' => [
                        'text_html' => [
                            'label' => 'background image',
                            'value' => '<img src="http://slidesigma.com/themes/html/mitor/assets/img/404-img.png" alt="hello">',
                        ]
                    ],
                    'mitor_not_found_title' => [
                        'text' => [
                            'label' => 'not found title',
                            'value' => 'Oops page not found',
                        ]
                    ],
                    'mitor_not_found_try_again' => [
                        'url' => [
                            'value' => [
                                'class' => 'refresh',
                                'text' => 'try again'
                            ]
                          ]
                    ],
                    'mitor_not_found_back_to_home_button' => [
                        'url' => [
                            'label' => 'Bact to home button',
                            'value' => [
                                'class' => 'mitor-btn',
                                'text' => 'back to home'
                            ]
                        ]
                    ],
                    'background_image' => [
                        'img_bg' => [
                            'label' => 'Background Image',
                            ]
                    ],
                ],
            ],
        ];
    }
}
