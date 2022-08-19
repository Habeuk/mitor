<?php

namespace Drupal\mitor\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
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
  public function viewElements(FieldItemListInterface $items, $langcode)
  {
    $elements = parent::viewElements($items, $langcode);
    $files = $this->getEntitiesToView($items, $langcode);
    
    foreach ($items as $delta => $item) {
      $image_uri = $files[$delta]->getFileUri();
      $alt = $files[$delta]->_referringItem->getValue()["alt"];
      $elements[$delta]['#theme'] = 'image_gallery_item_formatter';
      $elements[$delta]['#uri'] = $image_uri;
      $elements[$delta]['#alt'] = $alt;
    }

    return $elements;
  }
}
