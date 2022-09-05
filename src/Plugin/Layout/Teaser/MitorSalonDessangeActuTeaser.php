<?php

namespace Drupal\mitor\Plugin\Layout\Teaser;

use Drupal\bootstrap_styles\StylesGroup\StylesGroupManager;
use Drupal\formatage_models\FormatageModelsThemes;
use Drupal\formatage_models\Plugin\Layout\Teasers\FormatageModelsTeasers;

/**
 * Mitor why us section php
 * @Layout(
 *  id = "mitor_salon_dessange_actu_teaser",
 *  label = @Translation("Salon Dessange Actu Teaser"),
 *  category = @Translation("salon dessange"),
 *  path = "layouts/teasers",
 *  template = "salon-dessange-actu-teaser",
 *  library = "mitor/salon-dessange-actu",
 *  regions = {
 *      "salon_dessange_actu_teaser_title" = {
 *       "label" = @Translation("Title"),
 *      },
 *      "salon_dessange_actu_teaser_badge" = {
 *       "label" = @Translation("Badge")
 *      },
 *      "salon_dessange_actu_teaser_image" = {
 *       "label" = @Translation("Image")
 *      }
 *  }
 * )
 */

 class MitorSalonDessangeActuTeaser extends FormatageModelsTeasers
 {
    
    /**
     * {@inheritdoc}
     * @see Drupal\formatage_models\Plugin\Layout\FormatageModels::_construct
     */
    public function __construct(array $configuration, $pludin_id, $plugin_definition, StylesGroupManager $styleGroupManager)
    {
        // TODO auto-generated method stub
        parent::__construct($configuration, $pludin_id, $plugin_definition, $styleGroupManager);
        $this->pluginDefinition->set('icon', drupal_get_path('module', 'mitor') . "/icons/teasers/salon-dessange-actu.png");
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
                'value' => '',
                'options' => [
                    'rigth actu box' => '',
                    'left actu box' => 'sd-card-actu--left'
                ],
            ],
            'content' => [
                'builder-form' => true,
                'info' => [
                    'title' => 'Actu bloc informations',
                    'loader' => 'static',
                ],
                'fields' => [
                    'salon_dessange_actu_teaser_title' => [
                        'text' => [
                            'label' => 'actu title',
                            'value' => 'dessange, le coiffeur des stars!',
                        ]
                    ],
                    'salon_dessange_actu_teaser_badge' => [
                        'text' => [
                            'label' => 'Badge',
                            'value' => 'actualités',
                        ]
                    ],
                    'salon_dessange_actu_teaser_image' => [
                        'text_html' => [
                            'label' => 'image',
                            'value' => '<img src="https://salon.dessange.com/salon-coiffure/paris-sebastopol/wp-content/uploads/2022/03/Sans-titre-1200-%C3%97-500-px-1080-%C3%97-1080-px1.png"
                            alt="">',
                        ]
                        ],
                ],
            ],
        ];
    }
    
 }
 