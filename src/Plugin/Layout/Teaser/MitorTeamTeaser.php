<?php

namespace Drupal\mitor\Plugin\Layout\Teaser;

use Drupal\bootstrap_styles\StylesGroup\StylesGroupManager;
use Drupal\formatage_models\FormatageModelsThemes;
use Drupal\formatage_models\Plugin\Layout\Teasers\FormatageModelsTeasers;

/**
 * Mitor Team teaser php
 * @Layout(
 *  id = "mitor_team_teaser",
 *  label = @Translation("mitor team"),
 *  category = @Translation("mitor"),
 *  path = "layouts/teasers",
 *  template = "mitor-team",
 *  library = "mitor/mitor-team",
 *  default_region = "content",
 *  regions = {
 *      "mitor_team_image" = {
 *       "label" = @Translation("mitor team image"),
 *      },
 *      "mitor_team_name" = {
 *       "label" = @Translation("mitor team name")
 *      },
 *      "mitor_team_job" = {
 *       "label" = @Translation("mitor team job")
 *      },
 *      "mitor_team_social" = {
 *       "label" = @Translation("mitor team social")
 *      }
 *      
 *  }
 * )
 */

 class MitorTeamTeaser extends FormatageModelsTeasers
 {
    
    /**
     * {@inheritdoc}
     * @see Drupal\formatage_models\Plugin\Layout\FormatageModels::_construct
     */
    public function __construct(array $configuration, $pludin_id, $plugin_definition, StylesGroupManager $styleGroupManager)
    {
        // TODO auto-generated method stub
        parent::__construct($configuration, $pludin_id, $plugin_definition, $styleGroupManager);
        $this->pluginDefinition->set('icon', drupal_get_path('module', 'mitor') . "/icons/teasers/mitor-team.png");
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
            "derivate" => [
                'value' => 'default',
                'options' => [
                    'default' => '',
                    'single-lutin--glassmorphism' => 'glassmorphism',
                    'single-lutin--skeurmorphism' => 'skeurmorphism',
                    'single-lutin--skeurmorphism flat' => 'skeurmorphism flat',
                ],
            ],
            'content' => [
                'builder-form' => true,
                'info' => [
                    'title' => 'Team member informations',
                    'loader' => 'static',
                ],
                'fields' => [
                    'mitor_team_image' => [
                        'text_html' => [
                            'label' => 'image du membre de l\'équipe',
                            'value' => '<img src="http://slidesigma.com/themes/html/mitor/assets/img/Team/team-3/team-3-1.jpg" alt="">',
                        ]
                    ],
                    'mitor_team_name' => [
                        'text_html' => [
                            'label' => 'team member name',
                            'value' => 'Leontine F.Orton',
                        ]
                    ],
                    'mitor_team_job' => [
                        'text_html' => [
                            'label' => 'Job',
                            'value' => 'UX Designer',
                        ]
                    ],
                    'mitor_testimonial_social' => [
                        'text_html' => [
                            'label' => 'social links',
                            'value' => '<ul class="media-list"><li class="element">
                            <a href="#" class="link">
                                <i>
                                    <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="7" height="14.41" preserveaspectratio="xMidYMid meet" viewbox="0 0 486.037 1000"><path d="M124.074 1000V530.771H0V361.826h124.074V217.525C124.074 104.132 197.365 0 366.243 0C434.619 0 485.18 6.555 485.18 6.555l-3.984 157.766s-51.564-.502-107.833-.502c-60.9 0-70.657 28.065-70.657 74.646v123.361h183.331l-7.977 168.945H302.706V1000H124.074"/></svg>
                                </i>
                            </a>
                        </li>
                        <li class="element">
                            <a href="#" class="link">
                                <i>
                                    <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="15" height="15" preserveaspectratio="xMidYMid meet" viewbox="0 0 32 32"><path d="M31.937 6.093a13.359 13.359 0 0 1-3.765 1.032a6.603 6.603 0 0 0 2.885-3.631a13.683 13.683 0 0 1-4.172 1.579a6.56 6.56 0 0 0-11.178 5.973c-5.453-.255-10.287-2.875-13.52-6.833a6.458 6.458 0 0 0-.891 3.303a6.555 6.555 0 0 0 2.916 5.457a6.518 6.518 0 0 1-2.968-.817v.079a6.567 6.567 0 0 0 5.26 6.437a6.758 6.758 0 0 1-1.724.229c-.421 0-.823-.041-1.224-.115a6.59 6.59 0 0 0 6.14 4.557a13.169 13.169 0 0 1-8.135 2.801a13.01 13.01 0 0 1-1.563-.088a18.656 18.656 0 0 0 10.079 2.948c12.067 0 18.661-9.995 18.661-18.651c0-.276 0-.557-.021-.839a13.132 13.132 0 0 0 3.281-3.396z"/></svg>
                                </i>
                            </a>
                        </li>
                        <li class="element">
                            <a href="#" class="link">
                                <i>
                                    <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="15" height="15" preserveaspectratio="xMidYMid meet" viewbox="0 0 32 32"><path d="M16.75.406C10.337.406 4 4.681 4 11.6c0 4.4 2.475 6.9 3.975 6.9c.619 0 .975-1.725.975-2.212c0-.581-1.481-1.819-1.481-4.238c0-5.025 3.825-8.588 8.775-8.588c4.256 0 7.406 2.419 7.406 6.863c0 3.319-1.331 9.544-5.644 9.544c-1.556 0-2.888-1.125-2.888-2.737c0-2.363 1.65-4.65 1.65-7.088c0-4.137-5.869-3.387-5.869 1.613c0 1.05.131 2.212.6 3.169c-.863 3.713-2.625 9.244-2.625 13.069c0 1.181.169 2.344.281 3.525c.212.238.106.213.431.094c3.15-4.313 3.038-5.156 4.463-10.8c.769 1.463 2.756 2.25 4.331 2.25c6.637 0 9.619-6.469 9.619-12.3c0-6.206-5.363-10.256-11.25-10.256z"/></svg>
                                </i>
                            </a>
                        </li></ul>'
                        ],
                    ],
                ],
            ],
        ];
    }
    
 }
 