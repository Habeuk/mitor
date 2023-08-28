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
 *  template = "mitor-gallery",
 *  library = "mitor/mitor-top-project",
 *  default_region = "content",
 *  regions = {
 *      "mitor_gallery_images" = {
 *       "label" = @Translation("mitor gallery section"),
 *      }
 *      
 *  }
 * )
 */

 class MitorGallerySection extends FormatageModelsSection
 {
    
    /**
     * {@inheritdoc}
     * @see \Drupal\formatage_models\Plugin\Layout\FormatageModels::_construct
     */
    public function __construct(array $configuration, $pludin_id, $plugin_definition, StylesGroupManager $styleGroupManager)
    {
        // TODO auto-generated method stub
        parent::__construct($configuration, $pludin_id, $plugin_definition, $styleGroupManager);
        $this->pluginDefinition->set('icon', $this->pathResolver->getPath('module', 'mitor') . "/icons/sections/mitor-top-project.png");
    }   

    /**
     * {@inheritdoc}
     * @see \Drupal\formatage_models\Plugin\Layout\FormatageModels::build
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
                    'title' => 'Gallery informations',
                    'loader' => 'static',
                ],
                'fields' => [
                    'mitor_gallery_images' => [
                        'text_html' => [
                            'label' => 'gallery image',
                            'value' => '<div class="grid-item  ">
                            <a href="http://slidesigma.com/themes/html/mitor/assets/img/project/h-project-1.jpg" class="grid-img">
                                <img src="http://slidesigma.com/themes/html/mitor/assets/img/project/h-project-1.jpg"
                                     alt="Tomate à la porte">
                            </a>
                        </div>
                        <div class="grid-item  ">
                            <a href="http://slidesigma.com/themes/html/mitor/assets/img/project/h-project-2.jpg" class="grid-img">
                                <img src="http://slidesigma.com/themes/html/mitor/assets/img/project/h-project-2.jpg" alt="image">
                            </a>
                        </div>
                        <div class="grid-item  ">
                            <a
                               href="https://static6.depositphotos.com/1003369/659/i/600/depositphotos_6591667-stock-photo-close-up-of-beautiful-womanish.jpg"
                               class="grid-img">
                                <img src="https://static6.depositphotos.com/1003369/659/i/600/depositphotos_6591667-stock-photo-close-up-of-beautiful-womanish.jpg"
                                     alt="image">
                            </a>
                        </div>
                        <div class="grid-item  ">
                            <a href="http://slidesigma.com/themes/html/mitor/assets/img/project/h-project-4.jpg" class="grid-img">
                                <img src="http://slidesigma.com/themes/html/mitor/assets/img/project/h-project-4.jpg"
                                     alt="Gift me the">
                            </a>
                        </div>
            
                        <div class="grid-item  ">
                            <a href="http://slidesigma.com/themes/html/mitor/assets/img/project/h-project-5.jpg" class="grid-img">
                                <img src="http://slidesigma.com/themes/html/mitor/assets/img/project/h-project-5.jpg" alt="image">
                            </a>
                        </div>
            
                        <div class="grid-item  ">
                            <a href="http://slidesigma.com/themes/html/mitor/assets/img/project/h-project-1.jpg" class="grid-img">
                                <img src="http://slidesigma.com/themes/html/mitor/assets/img/project/h-project-1.jpg" alt="image">
                            </a>
                        </div>',
                        ]
                    ],
                ],
            ],
        ];
    }
    
 }
 