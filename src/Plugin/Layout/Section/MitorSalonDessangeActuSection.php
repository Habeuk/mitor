<?php

namespace Drupal\mitor\Plugin\Layout\Section;

use Drupal\bootstrap_styles\StylesGroup\StylesGroupManager;
use Drupal\formatage_models\FormatageModelsThemes;
use Drupal\formatage_models\Plugin\Layout\Sections\FormatageModelsSection;

/**
 * Salon Desange Actu Section php
 * @Layout(
 *  id = "mitor_salon_dessange_actu_section",
 *  label = @Translation("salon dessange"),
 *  category = @Translation("mitor"),
 *  path = "layouts/sections",
 *  template = "mitor-salon-dessange-actu",
 *  library = "mitor/salon-dessange-actu-section",
 *  default_region = "content",
 *  regions = {
 *      "salon_dessange_actu_section_title" = {
 *       "label" = @Translation("Title"),
 *      },
 *      "salon_dessange_actu_section_first_teaser" = {
 *       "label" = @Translation("First Teaser"),
 *      },
 *      "salon_dessange_actu_section_second_teaser" = {
 *       "label" = @Translation("First Teaser"),
 *      },
 *      "salon_dessange_actu_section_third_teaser" = {
 *       "label" = @Translation("Third Teaser"),
 *      },
 *      "salon_dessange_actu_section_see_all" = {
 *       "label" = @Translation("See all"),
 *      },
 *      
 *  }
 * )
 */

class MitorSalonDessangeActuSection extends FormatageModelsSection
{

    /**
     * {@inheritdoc}
     * @see Drupal\formatage_models\Plugin\Layout\FormatageModels::_construct
     */
    public function __construct(array $configuration, $pludin_id, $plugin_definition, StylesGroupManager $styleGroupManager)
    {
        // TODO auto-generated method stub
        parent::__construct($configuration, $pludin_id, $plugin_definition, $styleGroupManager);
        $this->pluginDefinition->set('icon', drupal_get_path('module', 'mitor') . "/icons/sections/salon-des-anges-actu.png");
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
                    'title' => 'Actu informations',
                    'loader' => 'static',
                ],
                'fields' => [
                    'salon_dessange_actu_section_title' => [
                        'text' => [
                            'label' => 'Title',
                            'value' => 'LES ACTUALITÉS DESSANGE',
                        ]
                    ],
                    'salon_dessange_actu_section_first_teaser' => [
                        'text_html' => [
                            'label' => 'First teaser',
                            'value' => '',
                        ]
                    ],
                    'salon_dessange_actu_section_second_teaser' => [
                        'text_html' => [
                            'label' => 'second teaser',
                            'value' => '',
                        ]
                    ],
                    'salon_dessange_actu_section_third_teaser' => [
                        'text_html' => [
                            'label' => 'third teaser',
                            'value' => '',
                        ]
                    ],
                    'salon_dessange_actu_section_see_all' => [
                        'text_html' => [
                            'label' => 'All news',
                            'value' => '',
                        ]
                    ],
                ],
            ],
        ];
    }
}
