<?php

namespace Drupal\mitor\Plugin\Layout\Section;

use Drupal\bootstrap_styles\StylesGroup\StylesGroupManager;
use Drupal\formatage_models\FormatageModelsThemes;
use Drupal\formatage_models\Plugin\Layout\Sections\FormatageModelsSection;

/**
 * Mitor footer section php
 *
 * @Layout(
 *  id = "mitor_footer_section",
 *  label = @Translation("mitor footer section"),
 *  category = @Translation("mitor"),
 *  path = "layouts/sections",
 *  template = "mitor-footer-section",
 *  library = "mitor/mitor-footer",
 *  default_region = "content",
 *  regions = {
 *      "mitor_footer_site_logo" = {
 *       "label" = @Translation("mitor footer site logo"),
 *      },
 *      "mitor_footer_description" = {
 *       "label" = @Translation("mitor footer description")
 *      },
 *      "mitor_footer_social" = {
 *       "label" = @Translation("mitor footer social")
 *      },
 *      "mitor_footer_column1_title" = {
 *       "label" = @Translation("mitor footer first column title")
 *      },
 *      "mitor_footer_column1_links" = {
 *       "label" = @Translation("mitor footer first column links")
 *      },
 *      "mitor_footer_column2_title" = {
 *       "label" = @Translation("mitor footer second column title")
 *      },
 *      "mitor_footer_column2_links" = {
 *       "label" = @Translation("mitor footer second column links")
 *      },
 *      "mitor_footer_subscribe" = {
 *       "label" = @Translation("mitor footer subscribe title")
 *      },
 *      "mitor_footer_subscribe_text" = {
 *       "label" = @Translation("mitor footer subscribe text")
 *      },
 *      "mitor_footer_subscribe_form" = {
 *       "label" = @Translation("mitor footer subscribe form")
 *      },
 *      "mitor_footer_copyright" = {
 *       "label" = @Translation("mitor footer copyright")
 *      },
 *      "mitor_footer_term" = {
 *       "label" = @Translation("mitor footer term")
 *      }
 *
 *  }
 * )
 */
class MitorFooterSection extends FormatageModelsSection {

  /**
   *
   * {@inheritdoc}
   * @see \Drupal\formatage_models\Plugin\Layout\FormatageModels::_construct
   */
  public function __construct(array $configuration, $pludin_id, $plugin_definition, StylesGroupManager $styleGroupManager) {
    // TODO auto-generated method stub
    parent::__construct($configuration, $pludin_id, $plugin_definition, $styleGroupManager);
    $this->pluginDefinition->set('icon', drupal_get_path('module', 'mitor') . "/icons/sections/mitor-footer-section.png");
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
    return parent::defaultConfiguration() + [
      'css' => '',
      'region_css_mitor_footer_column1_title' => 'h3',
      'region_css_mitor_footer_column2_title' => 'h3',
      'region_css_mitor_footer_subscribe_text' => 'h3',
      'load_library' => true,
      'content' => [
        'builder-form' => true,
        'info' => [
          'title' => 'Footer informations',
          'loader' => 'static'
        ],
        'fields' => [
          'mitor_footer_site_logo' => [
            'text_html' => [
              'label' => 'Nom du site',
              'value' => '<img src="http://slidesigma.com/themes/html/mitor/assets/img/logo.png" alt="" />'
            ]
          ],
          'mitor_footer_description' => [
            'text_html' => [
              'label' => 'description',
              'value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore'
            ]
          ],
          'mitor_footer_social' => [
            'text_html' => [
              'label' => 'liens sociaux',
              'value' => '<a href="#" class="">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                <path
                                      d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z" />
                            </svg>
                        </a>
                        <a href="#" class="">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path
                                      d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z" />
                            </svg>
                        </a>
                        <a href="#" class="">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                <path
                                      d="M204 6.5C101.4 6.5 0 74.9 0 185.6 0 256 39.6 296 63.6 296c9.9 0 15.6-27.6 15.6-35.4 0-9.3-23.7-29.1-23.7-67.8 0-80.4 61.2-137.4 140.4-137.4 68.1 0 118.5 38.7 118.5 109.8 0 53.1-21.3 152.7-90.3 152.7-24.9 0-46.2-18-46.2-43.8 0-37.8 26.4-74.4 26.4-113.4 0-66.2-93.9-54.2-93.9 25.8 0 16.8 2.1 35.4 9.6 50.7-13.8 59.4-42 147.9-42 209.1 0 18.9 2.7 37.5 4.5 56.4 3.4 3.8 1.7 3.4 6.9 1.5 50.4-69 48.6-82.5 71.4-172.8 12.3 23.4 44.1 36 69.3 36 106.2 0 153.9-103.5 153.9-196.8C384 71.3 298.2 6.5 204 6.5z" />
                            </svg>
                        </a>
                        <a href="#" class="">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <path
                                      d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
                            </svg>
                        </a>'
            ]
          ],
          'mitor_footer_column1_title' => [
            'text_html' => [
              'label' => 'Titre de la première colonne',
              'value' => 'Links'
            ]
          ],
          'mitor_footer_column1_links' => [
            'text_html' => [
              'label' => 'liens colonne 2',
              'value' => '<div class="links">
                        <div class="link">
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
                        </div>
                    </div>'
            ]
          ],
          'mitor_footer_column2_title' => [
            'text_html' => [
              'label' => 'Titre colonne 3',
              'value' => 'Navigation'
            ]
          ],
          'mitor_footer_column2_links' => [
            'text_html' => [
              'label' => 'liens colonne 3',
              'value' => '<div class="links">
                        <div class="link">
                            <a href="" class=" "></a>
                        </div>
                        <div class="link">
                            <a href="" class=" ">Services</a>
                        </div>
                        <div class="link">
                            <a href="" class=" ">Privacy</a>
                        </div>
                    </div>'
            ]
          ],
          'mitor_footer_subscribe' => [
            'text_html' => [
              'label' => 'Titre pour la soubscription à la newsletter',
              'value' => 'Suscribe Us'
            ]
          ],
          'mitor_footer_subscribe_text' => [
            'text_html' => [
              'label' => 'texte pour la soubscription à la newsletter',
              'value' => 'Enter your email subscribe to our news and updates by email.'
            ]
          ],
          'mitor_footer_subscribe_form' => [
            'text_html' => [
              'label' => 'formulaire d\'inscription à la newsletter',
              'value' => '<input type="email" class="mail form-control" placeholder="Votre Email" name="" id=""/>
                            <a type="submit" class="mitor-btn">subscribe</a>'
            ]
          ],
          'mitor_footer_copyright' => [
            'text_html' => [
              'label' => 'Copyright',
              'value' => 'Copyright © <a href="#">Habeuk</a> - 2022'
            ]
          ],
          'mitor_footer_term' => [
            'text_html' => [
              'label' => 'Autres liens',
              'value' => '<ul class="inline-link">
                            <li><a href="#">Terms and Conditions</a></li>
                            <li><a href="#">Privacy &amp; Policy</a></li>
                            <li><a href="#">Legal</a></li>
                            <li><a href="#">Notice</a></li>
                        </ul>'
            ]
          ]
        ]
      ]
    ];
  }

}
