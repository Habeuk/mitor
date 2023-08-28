<?php

namespace Drupal\mitor\Plugin\Layout\Section;

use Drupal\bootstrap_styles\StylesGroup\StylesGroupManager;
use Drupal\formatage_models\FormatageModelsThemes;
use Drupal\formatage_models\Plugin\Layout\Sections\FormatageModelsSection;

/**
 * Mitor Newsletter section php
 * @Layout(
 *  id = "mitor_newsletter_section",
 *  label = @Translation("mitor newsletter"),
 *  category = @Translation("mitor"),
 *  path = "layouts/sections",
 *  template = "mitor-newsletter",
 *  library = "mitor/mitor-newsletter",
 *  default_region = "content",
 *  regions = {
 *      "mitor_newsletter_title" = {
 *       "label" = @Translation("mitor newsletter title"),
 *      },
 *      "mitor_newsletter_description" = {
 *       "label" = @Translation("mitor newsletter description"),
 *      },
 *      "mitor_newsletter_form" = {
 *       "label" = @Translation("mitor newsletter form"),
 *      },
 *      "mitor_newsletter_social_links" = {
 *       "label" = @Translation("mitor newsletter links"),
 *      },
 *      
 *  }
 * )
 */

class MitorNewsletterSection extends FormatageModelsSection
{

    /**
     * {@inheritdoc}
     * @see Drupal\formatage_models\Plugin\Layout\FormatageModels::_construct
     */
    public function __construct(array $configuration, $pludin_id, $plugin_definition, StylesGroupManager $styleGroupManager)
    {
        // TODO auto-generated method stub
        parent::__construct($configuration, $pludin_id, $plugin_definition, $styleGroupManager);
        $this->pluginDefinition->set('icon', $this->pathResolver->getPath('module', 'mitor') . "/icons/sections/mitor-newsletter.png");
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
                    'mitor_newsletter_title' => [
                        'text' => [
                            'label' => 'Newsletter title',
                            'value' => 'suscribe newsletters',
                        ]
                    ],
                    'mitor_newsletter_description' => [
                        'text_html' => [
                            'label' => 'Newsletter description',
                            'value' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus placeat, rerum ducimus illo sequi id
                            qui. Est consectetur molestias perspiciatis cum iusto laboriosam maiores cumque?',
                        ]
                    ],
                    'mitor_newsletter_form' => [
                        'text_html' => [
                            'label' => 'Newsletter form',
                            'value' => '<form class="form-area">
                            <div class="area">
                                <input type="text" name="" id="" placeholder="Email" class="input-area">
                                <button type="submit" class="svg">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" preserveAspectRatio="xMidYMid meet"
                                         viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                              d="m20.665 3.717l-17.73 6.837c-1.21.486-1.203 1.161-.222 1.462l4.552 1.42l10.532-6.645c.498-.303.953-.14.579.192l-8.533 7.701h-.002l.002.001l-.314 4.692c.46 0 .663-.211.921-.46l2.211-2.15l4.599 3.397c.848.467 1.457.227 1.668-.785l3.019-14.228c.309-1.239-.473-1.8-1.282-1.434z" />
                                    </svg>
                                </button>
                            </div>
                        </form>'
                        ]
                    ],
                    'mitor_newsletter_social_links' => [
                        'text_html' => [
                            'label' => 'Newsletter social links',
                            'value' => '<ul class="social-link">
                            <li class="element">
                                <a href="#" class="link">
                                    <i>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                             preserveAspectRatio="xMidYMid meet" viewBox="0 0 50 50">
                                            <path fill="currentColor"
                                                  d="M26 20v-3c0-1.3.3-2 2.4-2H31v-5h-4c-5 0-7 3.3-7 7v3h-4v5h4v15h6V25h4.4l.6-5h-5z" />
                                        </svg>
                                    </i>
                                </a>
                            </li>
                            <li class="element">
                                <a href="#" class="link">
                                    <i>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                             preserveAspectRatio="xMidYMid meet" viewBox="0 0 1024 1024">
                                            <path fill="currentColor"
                                                  d="M928 254.3c-30.6 13.2-63.9 22.7-98.2 26.4a170.1 170.1 0 0 0 75-94a336.64 336.64 0 0 1-108.2 41.2A170.1 170.1 0 0 0 672 174c-94.5 0-170.5 76.6-170.5 170.6c0 13.2 1.6 26.4 4.2 39.1c-141.5-7.4-267.7-75-351.6-178.5a169.32 169.32 0 0 0-23.2 86.1c0 59.2 30.1 111.4 76 142.1a172 172 0 0 1-77.1-21.7v2.1c0 82.9 58.6 151.6 136.7 167.4a180.6 180.6 0 0 1-44.9 5.8c-11.1 0-21.6-1.1-32.2-2.6C211 652 273.9 701.1 348.8 702.7c-58.6 45.9-132 72.9-211.7 72.9c-14.3 0-27.5-.5-41.2-2.1C171.5 822 261.2 850 357.8 850C671.4 850 843 590.2 843 364.7c0-7.4 0-14.8-.5-22.2c33.2-24.3 62.3-54.4 85.5-88.2z" />
                                        </svg>
                                    </i>
                                </a>
                            </li>
                            <li class="element">
                                <a href="#" class="link">
                                    <i>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                             preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="M5.077 9.457c0-.778.136-1.513.404-2.199a5.63 5.63 0 0 1 1.121-1.802a7.614 7.614 0 0 1 1.644-1.329a7.513 7.513 0 0 1 2.002-.844a8.57 8.57 0 0 1 2.185-.281c1.139 0 2.199.241 3.182.721a6.021 6.021 0 0 1 2.391 2.094c.614.915.919 1.95.919 3.104c0 .692-.068 1.369-.207 2.031a8.28 8.28 0 0 1-.646 1.913a6.605 6.605 0 0 1-1.082 1.617a4.723 4.723 0 0 1-1.568 1.114a4.962 4.962 0 0 1-2.045.417c-.489 0-.977-.115-1.459-.346c-.482-.23-.828-.546-1.036-.951c-.073.281-.173.687-.306 1.218c-.128.53-.214.872-.252 1.027c-.04.154-.114.411-.222.767a5.183 5.183 0 0 1-.281.769l-.344.674a7.98 7.98 0 0 1-.498.838c-.181.262-.405.575-.672.935l-.149.053l-.099-.108c-.107-1.133-.162-1.811-.162-2.035c0-.663.079-1.407.235-2.233c.153-.825.395-1.862.72-3.109c.325-1.246.511-1.979.561-2.196c-.229-.467-.345-1.077-.345-1.827c0-.599.187-1.16.562-1.688c.376-.526.851-.789 1.427-.789c.441 0 .783.146 1.028.439c.246.292.366.66.366 1.109c0 .476-.158 1.165-.476 2.066c-.318.902-.476 1.575-.476 2.022c0 .453.162.832.486 1.129a1.68 1.68 0 0 0 1.179.449c.396 0 .763-.09 1.104-.271a2.46 2.46 0 0 0 .849-.733a6.123 6.123 0 0 0 1.017-2.225c.096-.422.17-.823.216-1.2c.049-.379.07-.737.07-1.077c0-1.247-.396-2.219-1.183-2.915c-.791-.696-1.821-1.042-3.088-1.042c-1.441 0-2.646.466-3.611 1.401c-.966.932-1.452 2.117-1.452 3.554c0 .317.048.623.139.919c.089.295.186.53.291.704c.104.171.202.338.291.492c.09.154.137.264.137.33c0 .202-.053.465-.16.79c-.111.325-.242.487-.4.487c-.015 0-.077-.011-.185-.034a2.21 2.21 0 0 1-.979-.605a3.17 3.17 0 0 1-.659-1.022a6.986 6.986 0 0 1-.352-1.169a4.884 4.884 0 0 1-.132-1.153z" />
                                        </svg>
                                    </i>
                                </a>
                            </li>
                        </ul>',
                        ]
                    ],
                ],
            ],
        ];
    }
}
