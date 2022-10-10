<?php

namespace Drupal\mitor\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * A widget bar.
 *
 * @FieldWidget(
 *   id = "bar",
 *   label = @Translation("Bar widget"),
 *   field_types = {
 *     "baz",
 *     "string"
 *   }
 * )
 */

class BarWidget extends WidgetBase
{

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state)
  {
    $element += [
      // Create the custom setting 'size', and
      // assign a default value of 60
      'size' => 60,
    ];

    return ['value' => $element];
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state)
  {
    $element['size'] = [
      '#type' => 'number',
      '#title' => $this->t('Size of textfield'),
      '#default_value' => $this->getSetting('size'),
      '#required' => TRUE,
      '#min' => 1,
    ];

    return $element;
  }

  /**
   * {@inheritdoc}
   */
  public function settingsSummary()
  {
    $summary = [];

    $summary[] = $this->t('Textfield size: @size', array('@size' => $this->getSetting('size')));

    return $summary;
  }
}
