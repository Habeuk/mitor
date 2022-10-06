<?php

namespace Drupal\mitor\Plugin\Layout\Teaser;

use Drupal\bootstrap_styles\StylesGroup\StylesGroupManager;
use Drupal\formatage_models\FormatageModelsThemes;
use Drupal\formatage_models\Plugin\Layout\Teasers\FormatageModelsTeasers;

/**
 * Mitor why us section php
 * @Layout(
 *  id = "mitor_salon_dessange_actu_all_teaser",
 *  label = @Translation("Salon Dessange Actu Teaser"),
 *  category = @Translation("salon dessange"),
 *  path = "layouts/teasers",
 *  template = "salon-dessange-actu-all-teaser",
 *  regions = {
 *      "salon_dessange_actu_all_teaser_title" = {
 *       "label" = @Translation("Titre"),
 *      },
 *      "salon_dessange_actu_all_teaser_link" = {
 *       "label" = @Translation("Lien"),
 *      },
 *      "salon_dessange_actu_all_teaser_icon" = {
 *       "label" = @Translation("icone"),
 *      }
 *  }
 * )
 */

 class MitorSalonDesangesActuAllTeaser extends FormatageModelsTeasers
 {
    
    /**
     * {@inheritdoc}
     * @see Drupal\formatage_models\Plugin\Layout\FormatageModels::_construct
     */
    public function __construct(array $configuration, $pludin_id, $plugin_definition, StylesGroupManager $styleGroupManager)
    {
        // TODO auto-generated method stub
        parent::__construct($configuration, $pludin_id, $plugin_definition, $styleGroupManager);
        $this->pluginDefinition->set('icon', drupal_get_path('module', 'mitor') . "/icons/teasers/salon-dessange-actu-all.png");
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
                    'title' => 'Actu bloc informations',
                    'loader' => 'static',
                ],
                'fields' => [
                    'salon_dessange_actu_teaser_title' => [
                        'text_html' => [
                            'label' => '<strong>voir</strong>
                            <span>toute</span>
                            <br>
                            <strong>L’ACTUALITÉ</strong>',
                        ]
                    ],
                    'salon_dessange_actu_teaser_icon' => [
                        'text_html' => [
                            'label' => '<span class="angle-long-right"></span>',
                        ]
                    ],
                    'salon_dessange_actu_all_teaser_link' => [
                        'url' => [
                            'label' => 'lien vers les contenues',
                            'value' => '#',
                        ]
                    ],
                ],
            ],
        ];
    }
    
 }
 