<?php

namespace Drupal\mitor\Plugin\Layout\Section;

use Drupal\bootstrap_styles\StylesGroup\StylesGroupManager;
use Drupal\formatage_models\FormatageModelsThemes;
use Drupal\formatage_models\Plugin\Layout\Sections\FormatageModelsSection;

/**
 * Mitor Top project gallery php
 * @Layout(
 *  id = "mitor_gallery_section",
 *  label = @Translation("mitor gallery"),
 *  category = @Translation("mitor"),
 *  path = "layouts/sections",
 *  template = "mitor-gallery",
 *  library = "mitor/mitor-top-project",
 *  default_region = "content",
 *  regions = {
 *      "mitor_gallery_images" = {
 *       "label" = @Translation("mitor galley section"),
 *      }
 *      
 *  }
 * )
 */

 class MitorGallerySection extends FormatageModelsSection
 {
    
    /**
     * {@inheritdoc}
     * @see Drupal\formatage_models\Plugin\Layout\FormatageModels::_construct
     */
    public function __construct(array $configuration, $pludin_id, $plugin_definition, StylesGroupManager $styleGroupManager)
    {
        // TODO auto-generated method stub
        parent::__construct($configuration, $pludin_id, $plugin_definition, $styleGroupManager);
        $this->pluginDefinition->set('icon', drupal_get_path('module', 'mitor') . "/icons/sections/mitor-top-project.png");
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
                    'title' => 'Gallery informations',
                    'loader' => 'static',
                ],
                'fields' => [
                    'mitor_gallery_images' => [
                        'text_html' => [
                            'label' => 'gallery image',
                            'value' => '',
                        ]
                    ],
                ],
            ],
        ];
    }
    
 }
 