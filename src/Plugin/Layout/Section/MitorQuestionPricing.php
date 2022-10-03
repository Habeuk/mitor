<?php

namespace Drupal\mitor\Plugin\Layout\Section;

use Drupal\bootstrap_styles\StylesGroup\StylesGroupManager;
use Drupal\formatage_models\FormatageModelsThemes;
use Drupal\formatage_models\Plugin\Layout\Sections\FormatageModelsSection;

/**
 * Mitor Top project gallery php
 * @Layout(
 *  id = "mitor_question_pricing_section",
 *  label = @Translation("mitor question pricing"),
 *  category = @Translation("mitor"),
 *  path = "layouts/sections",
 *  template = "mitor-question-pricing",
 *  library = "mitor/mitor-question-pricing",
 *  default_region = "content",
 *  regions = {
 *      "mitor_question_pricing_title" = {
 *       "label" = @Translation("mitor question pricing title"),
 *      },
 *      "mitor_question_pricing_description" = {
 *       "label" = @Translation("mitor question pricing description"),
 *      },
 *      "mitor_question_pricing_button" = {
 *       "label" = @Translation("mitor question pricing button"),
 *      },
 *      
 *  }
 * )
 */

class MitorQuestionPricing extends FormatageModelsSection
{

    /**
     * {@inheritdoc}
     * @see Drupal\formatage_models\Plugin\Layout\FormatageModels::_construct
     */
    public function __construct(array $configuration, $pludin_id, $plugin_definition, StylesGroupManager $styleGroupManager)
    {
        // TODO auto-generated method stub
        parent::__construct($configuration, $pludin_id, $plugin_definition, $styleGroupManager);
        $this->pluginDefinition->set('icon', drupal_get_path('module', 'mitor') . "/icons/sections/mitor-question-pricing.png");
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
                    'title' => 'Question pricing informations',
                    'loader' => 'static',
                ],
                'fields' => [
                    'mitor_question_pricing_title' => [
                        'text' => [
                            'label' => 'Question pricing title',
                            'value' => 'questions about pricing ?',
                        ]
                    ],
                    'mitor_question_pricing_description' => [
                        'text_html' => [
                            'label' => 'Question pricing description',
                            'value' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores corrupti inventore eaque eligendi iusto, rerum dolor at accusantium possimus aspernatur!',
                        ]
                    ],
                    'mitor_question_pricing_button' => [
                        'url' => [
                            'label' => 'Question pricing button',
                            'value' => [
                                'class' => 'link',
                                'text' => 'check FAQ'
                            ]
                        ]
                    ],
                ],
            ],
        ];
    }
}
