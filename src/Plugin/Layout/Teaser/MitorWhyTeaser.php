<?php

namespace Drupal\mitor\Plugin\Layout\Teaser;

use Drupal\bootstrap_styles\StylesGroup\StylesGroupManager;
use Drupal\formatage_models\FormatageModelsThemes;
use Drupal\formatage_models\Plugin\Layout\Teasers\FormatageModelsTeasers;

/**
 * Mitor why us section php
 * @Layout(
 *  id = "mitor_why_teaser",
 *  label = @Translation("mitor why us teaser"),
 *  category = @Translation("mitor"),
 *  path = "layouts/teasers",
 *  template = "mitor-why",
 *  library = "mitor/mitor-why-us",
 *  default_region = "content",
 *  regions = {
 *      "mitor_why_icon" = {
 *       "label" = @Translation("mitor why icon"),
 *      },
 *      "mitor_why_message" = {
 *       "label" = @Translation("mitor why message")
 *      }
 *  }
 * )
 */

 class MitorWhyTeaser extends FormatageModelsTeasers
 {
    
    /**
     * {@inheritdoc}
     * @see Drupal\formatage_models\Plugin\Layout\FormatageModels::_construct
     */
    public function __construct(array $configuration, $pludin_id, $plugin_definition, StylesGroupManager $styleGroupManager)
    {
        // TODO auto-generated method stub
        parent::__construct($configuration, $pludin_id, $plugin_definition, $styleGroupManager);
        $this->pluginDefinition->set('icon', $this->pathResolver->getPath('module', 'mitor') . "/icons/teasers/mitor-why.png");
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
                    'title' => 'Why us informations',
                    'loader' => 'static',
                ],
                'fields' => [
                    'mitor_why_icon' => [
                        'text_html' => [
                            'label' => 'Why us icon',
                            'value' => '<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="currentColor" d="M20 2H4c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm0 14H5.17l-.59.59l-.58.58V4h16v12zm-9-4h2v2h-2zm0-6h2v4h-2z"/></svg>',
                        ]
                    ],
                    'mitor_why_message' => [
                        'text_html' => [
                            'label' => 'message',
                            'value' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. In illum modi velit veritatis aliquam corporis provident ut? Soluta.',
                        ]
                        ],
                ],
            ],
        ];
    }
    
 }
 