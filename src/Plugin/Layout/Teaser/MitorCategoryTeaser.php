<?php

namespace Drupal\mitor\Plugin\Layout\Teaser;

use Drupal\bootstrap_styles\StylesGroup\StylesGroupManager;
use Drupal\formatage_models\FormatageModelsThemes;
use Drupal\formatage_models\Plugin\Layout\Teasers\FormatageModelsTeasers;

/**
 * Mitor category teaser php
 * @Layout(
 *  id = "mitor_category_teaser",
 *  label = @Translation("mitor category teaser"),
 *  category = @Translation("mitor"),
 *  path = "layouts/teasers",
 *  template = "mitor-category",
 *  default_region = "image",
 *  regions = {
 *      "name" = {
 *       "label" = @Translation("mitor category name"),
 *      },
 *      "value" = {
 *       "label" = @Translation("mitor category value"),
 *      }
 *      
 *  }
 * )
 */

 class MitorCategoryTeaser extends FormatageModelsTeasers
 {
    
    /**
     * {@inheritdoc}
     * @see Drupal\formatage_models\Plugin\Layout\FormatageModels::__construct
     */
    public function __construct(array $configuration, $pludin_id, $plugin_definition, StylesGroupManager $styleGroupManager)
    {
        // TODO auto-generated method stubitem
        parent::__construct($configuration, $pludin_id, $plugin_definition, $styleGroupManager);
        $this->pluginDefinition->set('icon', drupal_get_path('module', 'mitor') . "/icons/teasers/mitor-category.png");
    }   

    /**
     * {@inheritdoc}
     * @see Drupal\formatage_models\Plugin\Layout\mitor-image-teaserFormatageModels::build
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
                    'title' => 'Mitor image informations',
                    'loader' => 'static',
                ],
                'fields' => [
                    'name' => [
                        'text' => [
                            'label' => 'Nom',
                            'value' => 'Design',
                        ]
                    ],
                    'value' => [
                        'text' => [
                            'label' => 'Valeur',
                            'value' => '12',
                        ]
                    ],
                ],
            ],
        ];
    }
    
 }
 