<?php

namespace Drupal\mitor\Plugin\Layout\Section;

use Drupal\bootstrap_styles\StylesGroup\StylesGroupManager;
use Drupal\formatage_models\FormatageModelsThemes;
use Drupal\formatage_models\Plugin\Layout\Sections\FormatageModelsSection;

/**
 * Mitor Top teaser php
 * @Layout(
 *  id = "mitor_team_teaser",
 *  label = @Translation("mitor team"),
 *  category = @Translation("mitor"),
 *  path = "layouts/sections",
 *  template = "mitor-team",
 *  library = "mitor/mitor-top-project",
 *  default_region = "content",
 *  regions = {
 *      "mitor_project_image" = {
 *       "label" = @Translation("mitor team image"),
 *      }
 *      
 *  }
 * )
 */

 class MitorTopProjectGallerySection extends FormatageModelsSection
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
            "derivate" => [
                'value' => 'default',
                'options' => [
                    'default' => '',
                    'single-lutin--glassmorphism' => 'glassmorphism',
                    'single-lutin--skeurmorphism' => 'skeurmorphism',
                    'single-lutin--skeurmorphism flat' => 'skeurmorphism flat',
                ],
            ],
            'content' => [
                'builder-form' => true,
                'info' => [
                    'title' => 'Team member informations',
                    'loader' => 'static',
                ],
                'fields' => [
                    'mitor_project_image' => [
                        'text_html' => [
                            'label' => 'project image',
                            'value' => '<img src="http://slidesigma.com/themes/html/mitor/assets/img/project/h-project-1.jpg" alt="Tomate à la porte">',
                        ]
                    ],
                ],
            ],
        ];
    }
    
 }
 