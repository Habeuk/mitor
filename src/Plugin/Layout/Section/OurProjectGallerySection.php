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
 *  template = "mitor-project-gallery",
 *  library = "mitor/mitor-our-project",
 *  default_region = "content",
 *  regions = {
 *      "mitor_project_gallery_title" = {
 *       "label" = @Translation("mitor project galley title"),
 *      },
 *      "mitor_project_gallery_tab_one" = {
 *       "label" = @Translation("mitor project galley tab one"),
 *      },
 *      "mitor_project_gallery_tab_two" = {
 *       "label" = @Translation("mitor project galley tab two"),
 *      },
 *      "mitor_project_gallery_tab_three" = {
 *       "label" = @Translation("mitor project galley tab three"),
 *      },
 *      "mitor_project_gallery_tab_four" = {
 *       "label" = @Translation("mitor project galley tab four"),
 *      },
 *      "mitor_project_gallery_tab_one_content" = {
 *       "label" = @Translation("mitor project galley tab one content"),
 *      },
 *      "mitor_project_gallery_tab_two_content" = {
 *       "label" = @Translation("mitor project galley tab two content"),
 *      },
 *      "mitor_project_gallery_tab_three_content" = {
 *       "label" = @Translation("mitor project galley tab three content"),
 *      },
 *      "mitor_project_gallery_tab_four_content" = {
 *       "label" = @Translation("mitor project galley tab four content"),
 *      }
 *      
 *  }
 * )
 */

 class OurProjectGallerySection extends FormatageModelsSection
 {
    
    /**
     * {@inheritdoc}
     * @see Drupal\formatage_models\Plugin\Layout\FormatageModels::_construct
     */
    public function __construct(array $configuration, $pludin_id, $plugin_definition, StylesGroupManager $styleGroupManager)
    {
        // TODO auto-generated method stub
        parent::__construct($configuration, $pludin_id, $plugin_definition, $styleGroupManager);
        $this->pluginDefinition->set('icon', drupal_get_path('module', 'mitor') . "/icons/sections/mitor-project-gallery.png");
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
                    'title' => 'Project gallery informations',
                    'loader' => 'static',
                ],
                'fields' => [
                    'mitor_project_gallery_title' => [
                        'text' => [
                            'label' => 'Project gallery title',
                            'value' => 'Our projectGallery',
                        ]
                    ],
                    'mitor_project_gallery_tab_one' => [
                        'text' => [
                            'label' => 'project gallery tab one title',
                            'value' => 'Marketing',
                        ]
                    ],
                    'mitor_project_gallery_tab_two' => [
                        'text' => [
                            'label' => 'project gallery tab two title',
                            'value' => 'Design',
                        ]
                    ],
                    'mitor_project_gallery_tab_three' => [
                        'text' => [
                            'label' => 'project gallery tab three title',
                            'value' => 'Development',
                        ]
                    ],
                    'mitor_project_gallery_tab_four' => [
                        'text' => [
                            'label' => 'project gallery tab four title',
                            'value' => 'Supports',
                        ]
                    ],
                    'mitor_project_gallery_tab_one_content' => [
                        'text_html' => [
                            'label' => 'project gallery tab one content',
                            'value' => '<div class="col-md-4">
                            <div class="mpt-img mpt-img--active">
                                <a href="http://slidesigma.com/themes/html/mitor/assets/img/project/h-project-1.jpg"
                                   class="grid-img">
                                    <img src="http://slidesigma.com/themes/html/mitor/assets/img/project/h-project-1.jpg"
                                         alt="Tomate à la porte">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mpt-img">
                                <a href="http://slidesigma.com/themes/html/mitor/assets/img/project/h-project-2.jpg"
                                   class="grid-img">
                                    <img src="http://slidesigma.com/themes/html/mitor/assets/img/project/h-project-2.jpg"
                                         alt="Tomate à la porte">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mpt-img">
                                <a
                                   href="https://static6.depositphotos.com/1003369/659/i/600/depositphotos_6591667-stock-photo-close-up-of-beautiful-womanish.jpg"
                                   class="grid-img">
                                    <img src="https://static6.depositphotos.com/1003369/659/i/600/depositphotos_6591667-stock-photo-close-up-of-beautiful-womanish.jpg"
                                         alt="image">
                                </a>
                            </div>
                        </div>',
                        ]
                    ],
                    'mitor_project_gallery_tab_two_content' => [
                        'text_html' => [
                            'label' => 'project gallery tab two content',
                            'value' => '<div class="col-md-4">
                            <div class="mpt-img mpt-img--active">
                                <a href="#"
                                   class="grid-img">
                                    <img src="http://slidesigma.com/themes/html/mitor/assets/img/project/h-project-4.jpg"
                                         alt="Gift me the">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mpt-img">
                                <a href="#"
                                   class="grid-img">
                                    <img src="http://slidesigma.com/themes/html/mitor/assets/img/project/h-project-2.jpg"
                                         alt="Tomate à la porte">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mpt-img">
                                <a
                                   href="#"
                                   class="grid-img">
                                    <img src="https://static6.depositphotos.com/1003369/659/i/600/depositphotos_6591667-stock-photo-close-up-of-beautiful-womanish.jpg"
                                         alt="image">
                                </a>
                            </div>
                        </div>',
                        ]
                    ],
                    'mitor_project_gallery_tab_three_content' => [
                        'text_html' => [
                            'label' => 'project gallery tab three content',
                            'value' => '<div class="col-md-4">
                            <div class="mpt-img mpt-img--active">
                                <a
                                   href="#"
                                   class="grid-img">
                                    <img src="https://static6.depositphotos.com/1003369/659/i/600/depositphotos_6591667-stock-photo-close-up-of-beautiful-womanish.jpg"
                                         alt="image">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mpt-img">
                                <a href="#"
                                   class="grid-img">
                                    <img src="http://slidesigma.com/themes/html/mitor/assets/img/project/h-project-1.jpg"
                                         alt="Tomate à la porte">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mpt-img">
                                <a href="http://slidesigma.com/themes/html/mitor/assets/img/project/h-project-2.jpg"
                                   class="grid-img">
                                    <img src="http://slidesigma.com/themes/html/mitor/assets/img/project/h-project-2.jpg"
                                         alt="Tomate à la porte">
                                </a>
                            </div>
                        </div>',
                        ]
                    ],
                    'mitor_project_gallery_tab_four_content' => [
                        'text_html' => [
                            'label' => 'project gallery tab four content',
                            'value' => '<div class="col-md-4">
                            <div class="mpt-img mpt-img--active">
                                <a href="http://slidesigma.com/themes/html/mitor/assets/img/project/h-project-2.jpg"
                                   class="grid-img">
                                    <img src="http://slidesigma.com/themes/html/mitor/assets/img/project/h-project-5.jpg"
                                         alt="Tomate à la porte">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mpt-img">
                                <a href="http://slidesigma.com/themes/html/mitor/assets/img/project/h-project-1.jpg"
                                   class="grid-img">
                                    <img src="http://slidesigma.com/themes/html/mitor/assets/img/project/h-project-1.jpg"
                                         alt="Tomate à la porte">
                                </a>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mpt-img">
                                <a
                                   href="https://static6.depositphotos.com/1003369/659/i/600/depositphotos_6591667-stock-photo-close-up-of-beautiful-womanish.jpg"
                                   class="grid-img">
                                    <img src="http://slidesigma.com/themes/html/mitor/assets/img/project/h-project-4.jpg"
                                         alt="image">
                                </a>
                            </div>
                        </div>',
                        ]
                    ],
                ],
            ],
        ];
    }
    
 }
 