<?php

namespace Drupal\mitor\Plugin\Layout\Section;

use Drupal\bootstrap_styles\StylesGroup\StylesGroupManager;
use Drupal\formatage_models\FormatageModelsThemes;
use Drupal\formatage_models\Plugin\Layout\Sections\FormatageModelsSection;

/**
 * Mitor Newsletter section php
 * @Layout(
 *  id = "mitor_contact_hero_section",
 *  label = @Translation("mitor contact hero"),
 *  category = @Translation("mitor"),
 *  path = "layouts/sections",
 *  template = "mitor-contact-hero",
 *  library = "mitor/mitor-contact-hero",
 *  default_region = "content",
 *  regions = {
 *      "mitor_title" = {
 *       "label" = @Translation("mitor contact hero title"),
 *      },
 *      "mitor_element = {
 *       "label" = @Translation("mitor contact hero element"),
 *      },
 *      "mitor_background_image = {
 *       "label" = @Translation("mitor contact hero background image"),
 *      },
 *      
 *  }
 * )
 */

class MitorContactHeroSection extends FormatageModelsSection
{

    /**
     * {@inheritdoc}
     * @see Drupal\formatage_models\Plugin\Layout\FormatageModels::_construct
     */
    public function __construct(array $configuration, $pludin_id, $plugin_definition, StylesGroupManager $styleGroupManager)
    {
        // TODO auto-generated method stub
        parent::__construct($configuration, $pludin_id, $plugin_definition, $styleGroupManager);
        $this->pluginDefinition->set('icon', drupal_get_path('module', 'mitor') . "/icons/sections/mitor-newsletter.png");
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
                    'mitor_title' => [
                        'text' => [
                            'label' => 'Title',
                            'value' => 'contact',
                        ]
                    ],
                    'mitor_element' => [
                        'url' => [
                            'label' => 'element',
                            'value' => [
                                'class' => '',
                                'text' => 'Home'
                            ]
                        ]
                    ],
                    'mitor_background_image' => [
                        'text_html' => [
                            'label' => 'background image',
                            'value' => 'http://slidesigma.com/themes/html/mitor/assets/img/coming-soon/banner-3.jpg',
                        ]
                    ],
                ],
            ],
        ];
    }
}
