<?php

namespace Drupal\mitor\Plugin\Layout\Section;

use Drupal\bootstrap_styles\StylesGroup\StylesGroupManager;
use Drupal\formatage_models\FormatageModelsThemes;
use Drupal\formatage_models\Plugin\Layout\Sections\FormatageModelsSection;

/**
 * Aerolome footer section php
 *
 * @Layout(
 *  id = "aerolome_footer_section",
 *  label = @Translation("aerolome footer section"),
 *  category = @Translation("aerolome"),
 *  path = "layouts/sections",
 *  template = "aerolome-footer",
 *  library = "mitor/aerolome-footer",
 *  default_region = "newsletter",
 *  regions = {
 *      "newsletter" = {
 *       "label" = @Translation("aerolome newsletter region"),
 *      },
 *      "app" = {
 *       "label" = @Translation("aerolome app region"),
 *      },
 *      "help" = {
 *       "label" = @Translation("aerolome help region"),
 *      },
 *      "logo" = {
 *       "label" = @Translation("aerolome logo region"),
 *      },
 *      "top_menu" = {
 *       "label" = @Translation("aerolome top menus region"),
 *      },
 *      "sub_menus" = {
 *       "label" = @Translation("aerolome sub menus region"),
 *      },
 *      "follow" = {
 *       "label" = @Translation("aerolome follow region"),
 *      },
 *      "social_links" = {
 *       "label" = @Translation("aerolome social links region"),
 *      },
 *      "copy" = {
 *       "label" = @Translation("aerolome copyright region"),
 *      }
 *
 *  }
 * )
 */
class AerolomeFooterSection extends FormatageModelsSection {

  /**
   *
   * {@inheritdoc}
   * @see \Drupal\formatage_models\Plugin\Layout\FormatageModels::_construct
   */
  public function __construct(array $configuration, $pludin_id, $plugin_definition, StylesGroupManager $styleGroupManager) {
    // TODO auto-generated method stub
    parent::__construct($configuration, $pludin_id, $plugin_definition, $styleGroupManager);
    $this->pluginDefinition->set('icon', $this->pathResolver->getPath('module', 'mitor') . "/icons/sections/aerolome-footer.png");
  }

  /**
   *
   * {@inheritdoc}
   * @see \Drupal\formatage_models\Plugin\Layout\FormatageModels::build
   */
  public function build(array $regions) {
    // TODO auto-generated method stub
    $build = parent::build($regions);
    $build['logo'] = [
      '#theme' => 'image_style',
      '#style_name' => 'thumbnail',
      '#uri' => theme_get_setting('logo.path')
    ];
    // theme_get_setting('logo.url');
    FormatageModelsThemes::formatSettingValues($build);
    return $build;
  }

  /**
   *
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [
      'load_library' => true,
      'content' => [
        'builder-form' => true,
        'info' => [
          'title' => 'Footer informations',
          'loader' => 'static'
        ],
        'fields' => [
          'newsletter' => [
            'text_html' => [
              'label' => 'Newsletter',
              'value' => ''
            ]
          ],
          'app' => [
            'text_html' => [
              'label' => 'App',
              'value' => ''
            ]
          ],
          'help' => [
            'text_html' => [
              'label' => 'Help',
              'value' => ''
            ]
          ],
          'logo' => [
            'text_html' => [
              'label' => 'Logo',
              'value' => ''
            ]
          ],
          'top_menu' => [
            'text_html' => [
              'label' => 'Top Menu',
              'value' => ''
            ]
          ],
          'sub_menus' => [
            'text_html' => [
              'label' => 'Sub Menus',
              'value' => ''
            ]
          ],
          'follow' => [
            'text_html' => [
              'label' => 'Follow',
              'value' => ''
            ]
          ],
          'social_links' => [
            'text_html' => [
              'label' => 'Social links',
              'value' => ''
            ]
          ],
          'copy' => [
            'text_html' => [
              'label' => 'Copyright',
              'value' => ''
            ]
          ],
        ]
      ]
    ] + parent::defaultConfiguration() ;
  }

}
