<?php

namespace Drupal\mitor\Plugin\Layout\Section;

use Drupal\bootstrap_styles\StylesGroup\StylesGroupManager;
use Drupal\formatage_models\FormatageModelsThemes;
use Drupal\formatage_models\Plugin\Layout\Sections\FormatageModelsSection;

/**
 * Mitor Mitor blog right side section php
 * @Layout(
 *  id = "mitor_blog_right_side_section",
 *  label = @Translation("mitor blog right side section"),
 *  category = @Translation("mitor"),
 *  path = "layouts/sections",
 *  template = "mitor-blog-right-section",
 *  default_region = "content",
 *  regions = {
 *      "all_posts" = {
 *       "label" = @Translation("mitor blog right side all posts"),
 *      },
 *      "first_container" = {
 *       "label" = @Translation("mitor blog right side first container"),
 *      },
 *      "first_container_title" = {
 *       "label" = @Translation("mitor blog right side first container title"),
 *      },
 *      "second_container" = {
 *       "label" = @Translation("mitor blog right side first container"),
 *      },
 *      "second_container_title" = {
 *       "label" = @Translation("mitor blog right side first container title"),
 *      },
 *      "third_container" = {
 *       "label" = @Translation("mitor blog right side first container"),
 *      },
 *      "third_container_title" = {
 *       "label" = @Translation("mitor blog right side first container"),
 *      },
 *  }
 * )
 */

class MitorBlogRightSideSection extends FormatageModelsSection
{

    /**
     * {@inheritdoc}
     * @see Drupal\formatage_models\Plugin\Layout\FormatageModels::_construct
     */
    public function __construct(array $configuration, $pludin_id, $plugin_definition, StylesGroupManager $styleGroupManager)
    {
        // TODO auto-generated method stub
        parent::__construct($configuration, $pludin_id, $plugin_definition, $styleGroupManager);
        $this->pluginDefinition->set('icon', drupal_get_path('module', 'mitor') . "/icons/sections/mitor-blog-right-side.png");
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
                    'title' =>'Contact hero containt',
                    'loader' => 'static',
                ],
                'fields' => [
                    'all_posts' => [
                        'text_html' => [
                            'label' => 'all posts',
                            'value' => 'contact',
                        ]
                    ],
                    'first_container' => [
                        'text_html' => [
                            'label' => 'first container',
                            'value' => 'first container',
                        ]
                    ],
                    'second_container' => [
                        'text_html' => [
                            'label' => 'second container',
                            'value' => 'second container',
                        ]
                    ],
                    'third_container' => [
                        'text_html' => [
                            'label' => 'third container',
                            'value' => 'third container',
                        ]
                    ],
                    'first_container_title' => [
                        'text' => [
                            'label' => 'first container title',
                            'value' => 'title',
                        ]
                    ],
                    'second_container_title' => [
                        'text' => [
                            'label' => 'second container title',
                            'value' => 'title',
                        ]
                    ],
                    'third_container_title' => [
                        'text' => [
                            'label' => 'third container title',
                            'value' => 'title',
                        ]
                    ],
                ],
            ],
        ];
    }
}
