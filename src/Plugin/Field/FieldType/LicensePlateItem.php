<?php

namespace Drupal\mitor\Plugin\Field\FieldType;

use Drupal\Component\Utility\Random;
use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Plugin implementation of the mitor field type
 * @FieldType (
 * id = "licence_plate",
 * label = @Translation("License Plate"),
 * description = @Translation("Field for storing license plates"),
 * default_widget = "default_license_plate_widget",
 * default_formater = "default_license_plate_formatter"
 * )
 */

class LicensePlateItem extends FieldItemBase
{
    use StringTranslationTrait;

    /**
     * {@inheritdoc}
     */
    public static function defaultStorageSettings()
    {
        return [
            'number_max_length' => 255,
            'code_max_length' => 5,
        ] + parent::defaultStorageSettings();
    }

    /**
     * {@inheritdoc}
     */
    public function storageSettingsForm(array &$form, FormStateInterface $form_state, $has_data)
    {
        $elements = [];

        $elements['number_max_length'] = [
            '#tye' => 'number',
            '#title' => $this->t('Plate number maximum length'),
            '#title' => $this->getSetting('number_max_length'),
            '#require' => true,
            '#description' => $this->t('Maximum length for the plate in characters.'),
            '#min' => 1,
            '#disable' => $has_data,
        ];

        $elements['code_max_length'] = [
            '#tye' => 'number',
            '#title' => $this->t('Plate code maximum length'),
            '#title' => $this->getSetting('code_max_length'),
            '#require' => true,
            '#description' => $this->t('Maximum length for plate code in characters.'),
            '#min' => 1,
            '#disable' => $has_data,
        ];

        return $elements + parent::storageSettingsForm($form, $form_state, $has_data);
    }

    /**
     * {@inheritdoc}
     */
    public static function schema(FieldStorageDefinitionInterface $field_definition)
    {
        $schema = [
            'columns' => [
                'number' => [
                    'type' => 'varchar',
                    'length' => (int) $field_definition->getSetting('number_max_length'),
                ], 'code' => [
                    'type' => 'varchar',
                    'length' => (int) $field_definition->getSetting('code_max_length'),
                ]
            ],
        ];

        return $schema;
    }

    /**
     * {@inheritdoc}
     */
    public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition)
    {
        $properties['number'] = DataDefinition::create('string')->setLabel(t('Plate number'));

        $properties['code'] = DataDefinition::create('string')->setLabel(t('Plate code'));

        return $properties;
    }

    /**
     * {@inheritdoc}
     */
    public function getConstraints()
    {
        $constraints = parent::getConstraints();
        $constraint_manager = \Drupal::typedDataManager()->getValidationConstraintManager();
        $number_max_length = $this->getSetting('number_max_length');
        $code_max_length = $this->getSetting('code_max_length');

        $constraints[] = $constraint_manager->create('ComplexData', [
            'number' => [
                'Length' => [
                    'max' => $number_max_length,
                    'maxMessage' => $this->t('%name: may not be longer than @max characters.', [
                        '%name' => $this->getFieldDefinition()->getLabel() . '(number)',
                        '@maw' => $number_max_length,
                    ]),
                ],
            ],
            'code' => [
                'Length' => [
                    'max' => $code_max_length,
                    'maxMessage' => $this->t('%name: may not be longer than @max characters.', [
                        '%name' => $this->getFieldDefinition()->getLabel() . '(code)',
                        '@maw' => $number_max_length,
                    ]),
                ],
            ],
        ]);

        return $constraints;
    }

    /**
     * {@inheritdoc}
     */
    public static function generateSampleValue(FieldDefinitionInterface $field_definition)
    {
        $random = new Random();
        $values['number'] = $random->word(mt_rand(1, $field_definition->getSetting('number_max_length')));
        $values['code'] = $random->word(mt_rand(1, $field_definition->getSetting('code_max_length')));

        return $values;
    }

    /**
     * {@inheritdoc}
     */
    public function isEmpty()
    {
        // We consider the field empty if either of the properties is left empty.
        $number = $this->get('number')->getValue();
        $code = $this->get('code')->getValue();

        return $number === Null || $number === '' || $code === Null || $code === '';
    }

}
