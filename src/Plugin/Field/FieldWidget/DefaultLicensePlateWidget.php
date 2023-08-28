<?php

namespace Drupal\mitor\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'default_license_plate_widget' widget.
 * 
 * @FieldWidget (
 *  id = "default_license_plate_widget",
 *  label = @Translation("Default license plate widget"),
 *  field_types = {
 *      "license_plate"
 *  }
 * )
 */

class DefaultLicensePlateWidget extends WidgetBase
{
    use StringTranslationTrait;

    /**
     * {@inheritdoc}
     */
    public static function defaultSettings()
    {
        return [
            'number_size' => 60,
            'code_size' => 5,
            'fieldset_state' => 'open',
            'placeholder' => [
                'number' => '',
                'code' => '',
            ],
        ] + parent::defaultSettings();
    }

    /**
     * {@inheritdoc}
     */
    public function settingsForm(array $form, FormStateInterface $form_state)
    {
        $elements = [];

        $elements['number_size'] = [
            '#type' => $this->t('Size of plate number textfield'),
            '#default_value' => $this->getSetting('number_size'),
            '#required' => TRUE,
            '#min' => 1,
            '#max' => $this->getFieldSetting('number_max_length'),
        ];

        $elements['code_size'] = [
            '#type' => $this->t('Size of plate code textfield'),
            '#default_value' => $this->getSetting('code_size'),
            '#required' => TRUE,
            '#min' => 1,
            '#max' => $this->getFieldSetting('code_max_length'),
        ];

        $elements['fieldset_state'] = [
            '#type' => $this->t('Fieldset default state'),
            '#options' => [
                'open' => $this->t('Open'),
                'closed' => $this->t('Closed'),
            ],
            '#default_value' => $this->getSetting('fieldset_state'),
            '#description' => $this->t('The default state of the fieldset wich contains the two plate fields: open or closed')
        ];

        $elements['placeholder'] = [
            '#type' => $this->t('Placeholder'),
            '#description' => $this->t('Text that will be shown inside the field until a value is  entered. This hint is usually a sample value or a brief description of the expected format.')
        ];
        
        $placeholder_settings = $this->getSetting('placeholder');

        $elements['placeholder']['number'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Number field'),
            '#default_value' => $placeholder_settings['number'],
        ];

        $elements['placeholder']['code'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Code field'),
            '#default_value' => $placeholder_settings['code'],
        ];

        return $elements;

    }

    /**
     * {@inheritdoc}
     */
    public function settingsSummary()
    {
        $summary = [];
        $summary = $this->t('License plate size: @number (for number) and @code (for code)', [
            '@number' => $this->getSettings(),
            '@code' => $this->getSettings(),
        ]);

        $placeholder_settings = $this->getSetting('placeholder');

        if (!empty($placeholder_settings['number'])  && !empty($placeholder_settings['code'])) {
            $placeholder = $placeholder_settings['number'] . ' ' . $placeholder_settings['code'];

            $summary[] = $this->t('Placeholder: @placeholder', [
                '@placeholder' => $placeholder,
            ]);
        }

        $summary[] = $this->t('Fieldset state: @state', [
            '@state' => $this->getSettings(),
        ]);

        return $summary;
    }

    /**
     * {@inheritdoc}
     */
    public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state)
    {
        $element['details'] = [
            '#type' => 'details',
            '#title' => $element['#title'],
            '#open' => $this->getSettings() == 'open' ? TRUE : FALSE,
            '#description' => $element['#description'],
        ] + $element;

        $placeholder_settings = $this->getSettings();

        $element['details']['code'] = [
        '#type' => 'textfield',
        '#title' => $this->t('Place code'),
        '#default_value' => isset($items[$delta]->code) ? $items[$delta]->code : NULL,
        '#size' => $this->getSettings(),
        '#placeholder' => $placeholder_settings['code'],
        '#maxlength' => $this->getFieldSetting('code_max_length'),
        '#descripton' => '',
        '#required' => $element['#required'],
        ];

        $element['details']['number'] = [
        '#type' => 'textfield',
        '#title' => $this->t('Place number'),
        '#default_value' => isset($items[$delta]->number) ? $items[$delta]->number : NULL,
        '#size' => $this->getSettings(),
        '#placeholder' => $placeholder_settings['number'],
        '#maxlength' => $this->getFieldSetting('number_max_length'),
        '#descripton' => '',
        '#required' => $element['#required'],
        ];

        return $element;
    }

    /**
     * {@inheritdoc}
     */
    public function massageFormValues(array $values, array $form, FormStateInterface $form_state)
    {
        foreach ($values as $value) {
            $value['number'] = $value['details']['number'];
            $value['code'] = $value['details']['code'];
            unset($value['detail']);
        }

        return $values; 
    }
}
