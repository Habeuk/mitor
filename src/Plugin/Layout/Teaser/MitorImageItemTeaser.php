<?php

namespace Drupal\mitor\Plugin\Layout\Teaser;

use Drupal\bootstrap_styles\StylesGroup\StylesGroupManager;
use Drupal\formatage_models\FormatageModelsThemes;
use Drupal\formatage_models\Plugin\Layout\Teasers\FormatageModelsTeasers;

/**
 * Mitor image item teaser php
 * @Layout(
 *  id = "mitor_image_item_teaser",
 *  label = @Translation("mitor image"),
 *  category = @Translation("mitor"),
 *  path = "layouts/teasers",
 *  template = "mitor-image-item",
 *  default_region = "image",
 *  regions = {
 *      "mitor_image_link" = {
 *       "label" = @Translation("mitor image link"),
 *      },
 *      "mitor_image" = {
 *       "label" = @Translation("mitor image"),
 *      }
 *      
 *  }
 * )
 */

 class MitorImageItemTeaser extends FormatageModelsTeasers
 {
    
    /**
     * {@inheritdoc}
     * @see Drupal\formatage_models\Plugin\Layout\FormatageModels::__construct
     */
    public function __construct(array $configuration, $pludin_id, $plugin_definition, StylesGroupManager $styleGroupManager)
    {
        // TODO auto-generated method stubitem
        parent::__construct($configuration, $pludin_id, $plugin_definition, $styleGroupManager);
        $this->pluginDefinition->set('icon', $this->pathResolver->getPath('module', 'mitor') . "/icons/teasers/mitor-image.png");
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
                    'mitor_image' => [
                        'text_html' => [
                            'label' => 'image du membre de l\'équipe',
                            'value' => '<img src="http://slidesigma.com/themes/html/mitor/assets/img/project/h-project-2.jpg" alt="image">',
                        ]
                    ],
                    'mitor_image_link' => [
                        'url' => [
                            'label' => 'lien vers l\'image',
                            'value' => '#',
                        ]
                    ],
                ],
            ],
        ];
    }
    
 }
 