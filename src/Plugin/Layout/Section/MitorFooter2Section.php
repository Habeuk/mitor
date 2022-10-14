<?php

namespace Drupal\mitor\Plugin\Layout\Section;

use Drupal\bootstrap_styles\StylesGroup\StylesGroupManager;
use Drupal\formatage_models\FormatageModelsThemes;
use Drupal\formatage_models\Plugin\Layout\Sections\FormatageModelsSection;

/**
 * Mitor footer section php
 *
 * @Layout(
 *  id = "mitor_footer2_section",
 *  label = @Translation("mitor footer 2 section"),
 *  category = @Translation("mitor"),
 *  path = "layouts/sections",
 *  template = "mitor-footer2",
 *  default_region = "content",
 *  regions = {
 *      "title_one" = {
 *       "label" = @Translation("mitor footer title one"),
 *      },
 *      "menu_one" = {
 *       "label" = @Translation("mitor footer menu one")
 *      },
 *      "title_two" = {
 *       "label" = @Translation("mitor footer title two")
 *      },
 *      "menu_two" = {
 *       "label" = @Translation("mitor footer menu two")
 *      },
 *      "title_three" = {
 *       "label" = @Translation("mitor footer title three")
 *      },
 *      "menu_three" = {
 *       "label" = @Translation("mitor footer menu three")
 *      },
 *      "title_four" = {
 *       "label" = @Translation("mitor footer title four")
 *      },
 *      "container" = {
 *       "label" = @Translation("mitor footer container")
 *      }
 *
 *  }
 * )
 */
class MitorFooter2Section extends FormatageModelsSection {

  /**
   *
   * {@inheritdoc}
   * @see \Drupal\formatage_models\Plugin\Layout\FormatageModels::_construct
   */
  public function __construct(array $configuration, $pludin_id, $plugin_definition, StylesGroupManager $styleGroupManager) {
    // TODO auto-generated method stub
    parent::__construct($configuration, $pludin_id, $plugin_definition, $styleGroupManager);
    $this->pluginDefinition->set('icon', drupal_get_path('module', 'mitor') . "/icons/sections/mitor-footer-2.png");
  }

  /**
   *
   * {@inheritdoc}
   * @see \Drupal\formatage_models\Plugin\Layout\FormatageModels::build
   */
  public function build(array $regions) {
    // TODO auto-generated method stub
    $build = parent::build($regions);
    $build['mitor_footer_site_logo'] = [
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
      'css' => '',
      'region_css_title_one' => 'h4',
      'region_css_mitor_footer_column2_title' => 'h4',
      'region_css_mitor_footer_subscribe_text' => 'h4',
      "region_tag_mitor_footer_column1_title" => "h4",
      "region_tag_mitor_footer_column2_title" => "h4",
      "region_tag_mitor_footer_subscribe" => 'h4',
      'load_library' => true,
      "derivate" => [
        'value' => '',
        'options' => [
            'mitor-footer--flat-3' => 'flat 3',
            'single-testimonial--flex' => 'flat'
        ],
      ],
      'content' => [
        'builder-form' => true,
        'info' => [
          'title' => 'Footer informations',
          'loader' => 'static'
        ],
        'fields' => [
          'title_one' => [
            'text' => [
              'label' => 'titre un',
              'value' => 'contact us'
            ]
          ],
          'menu_one' => [
            'text_html' => [
              'label' => 'menu un',
              'value' => '<ul class="contact-elements">
              <li class="element">
                  <span class="icon">
                      <svg xmlns="http://www.w3.org/2000/svg" width="12" height="16" preserveaspectratio="xMidYMid meet" viewbox="0 0 384 512">
                          <path d="M97.333 506.966c-129.874-129.874-129.681-340.252 0-469.933c5.698-5.698 14.527-6.632 21.263-2.422l64.817 40.513a17.187 17.187 0 0 1 6.849 20.958l-32.408 81.021a17.188 17.188 0 0 1-17.669 10.719l-55.81-5.58c-21.051 58.261-20.612 122.471 0 179.515l55.811-5.581a17.188 17.188 0 0 1 17.669 10.719l32.408 81.022a17.188 17.188 0 0 1-6.849 20.958l-64.817 40.513a17.19 17.19 0 0 1-21.264-2.422zM247.126 95.473c11.832 20.047 11.832 45.008 0 65.055c-3.95 6.693-13.108 7.959-18.718 2.581l-5.975-5.726c-3.911-3.748-4.793-9.622-2.261-14.41a32.063 32.063 0 0 0 0-29.945c-2.533-4.788-1.65-10.662 2.261-14.41l5.975-5.726c5.61-5.378 14.768-4.112 18.718 2.581zm91.787-91.187c60.14 71.604 60.092 175.882 0 247.428c-4.474 5.327-12.53 5.746-17.552.933l-5.798-5.557c-4.56-4.371-4.977-11.529-.93-16.379c49.687-59.538 49.646-145.933 0-205.422c-4.047-4.85-3.631-12.008.93-16.379l5.798-5.557c5.022-4.813 13.078-4.394 17.552.933zm-45.972 44.941c36.05 46.322 36.108 111.149 0 157.546c-4.39 5.641-12.697 6.251-17.856 1.304l-5.818-5.579c-4.4-4.219-4.998-11.095-1.285-15.931c26.536-34.564 26.534-82.572 0-117.134c-3.713-4.836-3.115-11.711 1.285-15.931l5.818-5.579c5.159-4.947 13.466-4.337 17.856 1.304z"/>
                      </svg>
                  </span>
                  <p class="contact el">
                      +880 1234 5678
                  </p>
              </li>
              <li class="element">
                  <span class="icon">
                      <svg xmlns="http://www.w3.org/2000/svg" width="12" height="16" preserveaspectratio="xMidYMid meet" viewbox="0 0 384 512">
                          <path d="M97.333 506.966c-129.874-129.874-129.681-340.252 0-469.933c5.698-5.698 14.527-6.632 21.263-2.422l64.817 40.513a17.187 17.187 0 0 1 6.849 20.958l-32.408 81.021a17.188 17.188 0 0 1-17.669 10.719l-55.81-5.58c-21.051 58.261-20.612 122.471 0 179.515l55.811-5.581a17.188 17.188 0 0 1 17.669 10.719l32.408 81.022a17.188 17.188 0 0 1-6.849 20.958l-64.817 40.513a17.19 17.19 0 0 1-21.264-2.422zM247.126 95.473c11.832 20.047 11.832 45.008 0 65.055c-3.95 6.693-13.108 7.959-18.718 2.581l-5.975-5.726c-3.911-3.748-4.793-9.622-2.261-14.41a32.063 32.063 0 0 0 0-29.945c-2.533-4.788-1.65-10.662 2.261-14.41l5.975-5.726c5.61-5.378 14.768-4.112 18.718 2.581zm91.787-91.187c60.14 71.604 60.092 175.882 0 247.428c-4.474 5.327-12.53 5.746-17.552.933l-5.798-5.557c-4.56-4.371-4.977-11.529-.93-16.379c49.687-59.538 49.646-145.933 0-205.422c-4.047-4.85-3.631-12.008.93-16.379l5.798-5.557c5.022-4.813 13.078-4.394 17.552.933zm-45.972 44.941c36.05 46.322 36.108 111.149 0 157.546c-4.39 5.641-12.697 6.251-17.856 1.304l-5.818-5.579c-4.4-4.219-4.998-11.095-1.285-15.931c26.536-34.564 26.534-82.572 0-117.134c-3.713-4.836-3.115-11.711 1.285-15.931l5.818-5.579c5.159-4.947 13.466-4.337 17.856 1.304z"/>
                      </svg>
                  </span>
                  <p class="mail el">
                      <a href="#">contact@example.com</a>
                  </p>
              </li>
              <li class="element">
                  <span class="icon">
                      <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" preserveaspectratio="xMidYMid meet" viewbox="0 0 32 32">
                          <path d="M16 2A11.013 11.013 0 0 0 5 13a10.889 10.889 0 0 0 2.216 6.6s.3.395.349.452L16 30l8.439-9.953c.044-.053.345-.447.345-.447l.001-.003A10.885 10.885 0 0 0 27 13A11.013 11.013 0 0 0 16 2Zm0 15a4 4 0 1 1 4-4a4.005 4.005 0 0 1-4 4Z"/>
                          <circle cx="16" cy="13" r="4" fill="none"/>
                      </svg>
                  </span>
                  <p class="location el">123 level 5, New York USA
                  </p>
              </li>
          </ul>'
            ]
          ],
          'title_two' => [
            'text' => [
              'label' => 'titre deux',
              'value' => 'Links'
            ]
          ],
          'menu_two' => [
            'text_html' => [
              'label' => 'Titre de la première colonne',
              'value' => '<div class="link">
              <a href="" class=" ">About Us</a>
          </div>
          <div class="link">
              <a href="" class=" ">Services</a>
          </div>
          <div class="link">
              <a href="" class=" ">Privacy</a>
          </div>
          <div class="link">
              <a href="" class=" ">Terms of Use</a>
          </div>'
            ]
          ],
          'title_three' => [
            'text' => [
              'label' => 'titre trois',
              'value' => 'Navigation'
            ]
          ],
          'menu_three' => [
            'text_html' => [
              'label' => 'Menu trois',
              'value' => '<div class="link">
              <a href="" class=" "></a>
          </div>
          <div class="link">
              <a href="" class=" ">Services</a>
          </div>
          <div class="link">
              <a href="" class=" ">Privacy</a>
          </div>'
            ]
          ],
          'title_four' => [
            'text' => [
              'label' => 'titre quatre',
              'value' => 'Instagram post'
            ]
          ],
          'container' => [
            'text_html' => [
              'label' => 'container',
              'value' => '<div class="post-img">
              <img src="http://slidesigma.com/themes/html/mitor/assets/img/homepage-4/insta-1.jpg" alt="">
          </div>
          <div class="post-img">
              <img src="https://www.referenseo.com/wp-content/uploads/2019/03/image-attractive.jpg" alt="">
          </div>
          <div class="post-img">
              <img src="http://slidesigma.com/themes/html/mitor/assets/img/homepage-4/insta-1.jpg" alt="">
          </div>
          <div class="post-img">
              <img src="https://www.referenseo.com/wp-content/uploads/2019/03/image-attractive.jpg" alt="">
          </div>
          <div class="post-img">
              <img src="http://slidesigma.com/themes/html/mitor/assets/img/homepage-4/insta-1.jpg" alt="">
          </div>'
            ]
          ]
        ]
      ]
    ] + parent::defaultConfiguration() ;
  }

}
