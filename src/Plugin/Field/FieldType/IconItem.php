<?php

namespace Drupal\mitor\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Provides a field type of icon.
 * 
 * @FieldType(
 *   id = "icon",
 *   label = @Translation("Icon field")
 * )
 */

class IconItem extends FieldItemBase
{

    /**
     * {@inheritdoc}
     */
    public static function schema(FieldStorageDefinitionInterface $field_definition)
    {
        return [
            // columns contains the values that the field will store
            'columns' => [
                // List the values that the field will save. This
                // field will only save a single value, 'value'
                'value' => [
                    'type' => 'text',
                    'size' => 'tiny',
                    'not null' => FALSE,
                ],
                'link' => [
                    'type' => 'text',
                    'size' => 'normal',
                    'not null' => TRUE,
                ],
                'text' => [
                    'type' => 'text',
                    'size' => 'tiny',
                    'not null' => FALSE,
                ],
                'label' => [
                    'type' => 'text',
                    'size' => 'tiny',
                    'not null' => TRUE,
                ],
                'show_text' => [
                    'type' => 'int',
                    'size' => 'tiny',
                    'not null' => FALSE,
                ],
                'class' => [
                    'type' => 'int',
                    'size' => 'small',
                    'not null' => TRUE,
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition)
    {
        $properties = [];
        $properties['value'] = DataDefinition::create('string');
        $properties['link'] = DataDefinition::create('string');
        $properties['label'] = DataDefinition::create('string');
        $properties['show_text'] = DataDefinition::create('boolean');
        $properties['class'] = DataDefinition::create('string');

        return $properties;
    }

    /**
     * {@inheritdoc}
     */
    public function isEmpty()
    {
        $value = $this->get('value')->getValue();
        $showText = $this->get('show_text')->getValue();
        return $value === NULL || $value === '' || $showText === NULL;
    }

    /**
     * {@inheritdoc}
     */
    public static function defaultFieldSettings()
    {
        return [
            // Declare a single setting, 'size', with a default
            // value of 'large'
            'show_text' => true,
        ] + parent::defaultFieldSettings();
    }

    /**
     * {@inheritdoc}
     */
    public function fieldSettingsForm(array $form, FormStateInterface $form_state)
    {

        $element = [];
        // The key of the element should be the setting name
        $element['show_text'] = [
            '#title' => $this->t('Show text'),
            '#type' => 'checkbox',
            '#default_value' => $this->getSetting('show_text'),
        ];

        return $element;
    }
}
