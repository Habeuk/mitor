<?php

namespace Drupal\mitor\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Url;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Template\Attribute;

/**
 * Provides a menu links list block.
 *
 * @Block(
 *   id = "aerolome_menu_links_list",
 *   admin_label = @Translation("Menu links List"),
 *   category = @Translation("Custom")
 * )
 */
class MenuLinksListBlock extends BlockBase implements ContainerFactoryPluginInterface {
  
  /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;
  
  /**
   * Constructs a new MenuLinksListBlock instance.
   *
   * @param array $configuration
   *        The plugin configuration, i.e. an array with configuration values
   *        keyed
   *        by configuration option name. The special key 'context' may be used
   *        to
   *        initialize the defined contexts by setting it to an array of context
   *        values keyed by context names.
   * @param string $plugin_id
   *        The plugin_id for the plugin instance.
   * @param mixed $plugin_definition
   *        The plugin implementation definition.
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *        The entity type manager.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, EntityTypeManagerInterface $entity_type_manager) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->entityTypeManager = $entity_type_manager;
  }
  
  /**
   *
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static($configuration, $plugin_id, $plugin_definition, $container->get('entity_type.manager'));
  }
  
  /**
   *
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [
      'menu' => '',
      'ul_classes' => '',
      'a_classes' => '',
      'title_tag' => 'h4',
      'title_classes' => '',
      'title' => '',
      'parent_classes' => '',
      'show_title' => '',
      'target' => ''
    ];
  }
  
  /**
   *
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $menus = $this->entityTypeManager->getStorage('menu')->loadMultiple();
    $options = [];
    foreach ($menus as $menu) {
      $options[$menu->id()] = $menu->label();
    }
    $form['menu'] = [
      '#type' => 'select',
      '#title' => $this->t('Select a menu'),
      '#description' => $this->t('Witch menu do you want to add ?'),
      '#options' => $options,
      '#default_value' => $this->configuration['menu'],
      '#required' => TRUE
    ];
    
    $form['ul_classes'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Add ul tag classes'),
      '#description' => $this->t('The classes to add on the ul tag'),
      '#default_value' => $this->configuration['ul_classes']
    ];
    
    $form['a_classes'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Add a tag classes'),
      '#description' => $this->t('The classes to add on the a tag'),
      '#default_value' => $this->configuration['a_classes']
    ];
    
    $form['show_title'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Show the title ?'),
      '#default_value' => $this->configuration['show_title']
    ];
    
    $form['title'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Add a title'),
      '#description' => $this->t('The title for the field_typemenu'),
      '#default_value' => $this->configuration['title'],
      '#states' => [
        'visible' => [
          ':input[name="settings[show_title]"]' => [
            'checked' => true
          ]
        ]
      ]
    ];
    
    $form['title_tag'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Html tag for the title'),
      '#description' => $this->t('The Html tag for the title '),
      '#default_value' => $this->configuration['title_tag'],
      '#states' => [
        'visible' => [
          ':input[name="settings[show_title]"]' => [
            'checked' => true
          ]
        ]
      ]
    ];
    
    $form['title_classes'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Classes for the title'),
      '#description' => $this->t('The classes for the title '),
      '#default_value' => $this->configuration['title_classes'],
      '#states' => [
        'visible' => [
          ':input[name="settings[show_title]"]' => [
            'checked' => true
          ]
        ]
      ]
    ];
    
    $form['parent_classes'] = [
      '#type' => 'textfield',
      '#title' => $this->t('parent Class'),
      '#description' => $this->t('The parent container classes'),
      '#default_value' => $this->configuration['parent_classes'],
      '#states' => [
        'visible' => [
          ':input[name="settings[show_title]"]' => [
            'checked' => true
          ]
        ]
      ]
    ];
    
    $form['target'] = [
      '#type' => 'select',
      '#title' => $this->t('target'),
      '#options' => [
        '' => 'aucun',
        '_blank' => '_blank',
        '_self' => '_self',
        '_parent' => '_parent'
      ],
      '#default_value' => $this->configuration['target']
    ];
    
    return $form;
  }
  
  /**
   *
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['menu'] = $form_state->getValue('menu');
    $this->configuration['ul_classes'] = $form_state->getValue('ul_classes');
    $this->configuration['a_classes'] = $form_state->getValue('a_classes');
    $this->configuration['title'] = $form_state->getValue('title');
    $this->configuration['title_tag'] = $form_state->getValue('title_tag');
    $this->configuration['title_classes'] = $form_state->getValue('title_classes');
    $this->configuration['parent_classes'] = $form_state->getValue('parent_classes');
    $this->configuration['show_title'] = $form_state->getValue('show_title');
    $this->configuration['target'] = $form_state->getValue('target');
  }
  
  /**
   *
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    // $menu_storage =
    // $this->entityTypeManager->getStorage('menu_link_content');
    // $menus = $menu_storage->loadByProperties([
    // 'menu_name' => $this->configuration['menu']
    // ]);
    //
    $menu_name = $this->configuration['menu'];
    /**
     * il faut charger le menu en fonction de la hierachie
     *
     * @var \Drupal\Core\Menu\MenuLinkTree $MenuTree
     */
    $MenuTree = \Drupal::service('menu.link_tree');
    $parameters = $MenuTree->getCurrentRouteMenuTreeParameters($menu_name);
    $menus = $MenuTree->load($menu_name, $parameters);
    $mainMenu = $this->entityTypeManager->getStorage('menu')->loadMultiple();
    
    foreach ($mainMenu as $key => $value) {
      if ($key == $this->configuration['menu']) {
        $menuLabel = $value->label();
      }
    }
    
    $title = empty($this->configuration['title']) ? $menuLabel : $this->configuration['title'];
    $build = [
      '#type' => 'html_tag',
      '#tag' => 'div',
      '#attributes' => [
        'class' => [
          $this->configuration['parent_classes']
        ]
      ]
    ];
    
    if ($this->configuration['show_title']) {
      $build[] = [
        '#type' => 'html_tag',
        '#tag' => $this->configuration['title_tag'],
        '#value' => $title,
        '#attributes' => [
          'class' => [
            $this->configuration['title_classes']
          ]
        ]
      ];
    }
    
    if (!empty($menus)) {
      $manipulators = array(
        array(
          'callable' => 'menu.default_tree_manipulators:checkAccess'
        ),
        array(
          'callable' => 'menu.default_tree_manipulators:generateIndexAndSort'
        )
      );
      $tree = $MenuTree->transform($menus, $manipulators);
      
      $menus = $MenuTree->build($tree);
      if (!empty($this->configuration['ul_classes']))
        $menus['#attributes'] = [
          'class' => [
            $this->configuration['ul_classes']
          ]
        ];
      
      // add custom class
      foreach ($menus['#items'] as &$value) {
        $Attribute = new Attribute();
        $Attribute->addClass($this->configuration['a_classes']);
        if (!empty($this->configuration['target'])) {
          $Attribute->setAttribute('target', $this->configuration['target']);
        }
        $value['link_attributes'] = $Attribute;
      }
      // dump($menus['#items']);
      $build[] = $menus;
    }
    
    // $build[] = [
    // '#theme' => 'links',
    // '#links' => $menus,
    // '#attributes' => [
    // 'class' => [
    // $this->configuration['ul_classes']
    // ]
    // ]
    // ];
    return $build;
  }
  
  function getMenuList($menus) {
    $menuList = [];
    dump($menus);
    foreach ($menus as $menu) {
      /**
       *
       * @var \Drupal\menu_link_content\Entity\MenuLinkContent $menu
       */
      $link = [
        'title' => $menu->getTitle(),
        'url' => Url::fromUri($menu->link->uri),
        'attributes' => [
          'class' => [
            $this->configuration['a_classes'] ?? ''
          ]
        ]
      ];
      $menuList[] = $link;
    }
    
    return $menuList;
  }
  
}
