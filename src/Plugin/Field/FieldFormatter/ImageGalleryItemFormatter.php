<?php

namespace Drupal\mitor\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\image\Entity\ImageStyle;
use Drupal\image\Plugin\Field\FieldFormatter\ImageFormatter;

/**
 * Plugin implementation of the 'image gallery item' formatter.
 *
 * @FieldFormatter(
 *   id = "mitor_image_gallery_item",
 *   label = @Translation("Image gallery item"),
 *   field_types = {
 *     "image"
 *   },
 *   quickedit = {
 *     "editor" = "image"
 *   }
 * )
 */
class ImageGalleryItemFormatter extends ImageFormatter
{

  /**
   *
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    return [
      'image_style_small' => ''
    ] + parent::defaultSettings();
  }

    /**
   *
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    $elements = parent::settingsForm($form, $form_state);
    $elements['image_style']['#title'] = t('Image');
    
    //
    $image_styles = image_style_options(TRUE);
    $conf = $this->getSettings();
    $elements['image_style_small'] = [
      '#title' => t('Image thumbnail'),
      '#type' => 'select',
      '#default_value' => $conf['image_style_small'],
      '#empty_option' => t('None (original image)'),
      '#options' => $image_styles
    ];
    
    //
    return $elements;
  }


  /**
   *
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode)
  {
    $elements = parent::viewElements($items, $langcode);
    $files = $this->getEntitiesToView($items, $langcode);
    $conf = $this->getSettings();
    $image_style_setting = $this->getSetting('image_style');
    $image_style_small_setting = $this->getSetting('image_style_small');
    $image_style = $this->imageStyleStorage->load($image_style_setting);
    $image_thumbnail_style = $this->imageStyleStorage->load($image_style_small_setting);
    $image_url = ImageStyle::load($image_style->get('name'))->buildUrl($files[0]->getFileUri());
    $image_thumbnail_url = ImageStyle::load($image_thumbnail_style->get('name'))->buildUrl($files[0]->getFileUri());

    
    foreach ($items as $delta => $item) {
      $alt = $files[$delta]->_referringItem->getValue()["alt"];
      $elements[$delta]['#theme'] = 'image_gallery_item_formatter';
      $elements[$delta]['#imageurl'] = $image_url;
      $elements[$delta]['#imageThumbnailUrl'] = $image_thumbnail_url;
      $elements[$delta]['#alt'] = $alt;
    }
    
    return $elements;
  }
}
