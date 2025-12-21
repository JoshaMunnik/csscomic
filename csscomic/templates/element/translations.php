<?php

/**
 * @var ApplicationView $this
 */

// messages from the rules used in the htmlhint library
use App\View\ApplicationView;

$lineMessages = [
  // tagname-lowercase
  'The html element name of [ ** ] must be in lowercase.' =>
    __('The html element name of [ ** ] must be in lowercase.'),
  /// attr-lowercase
  'The attribute name of [ ** ] must be in lowercase.' =>
    __('The attribute name of [ ** ] must be in lowercase.'),
  // attr-value-double-quotes
  'The value of attribute [ ** ] must be in double quotes.' =>
    __('The value of attribute [ ** ] must be in double quotes.'),
  // tag-pair
  'Tag must be paired, missing: [ ** ], start tag match failed [ ** ] on line **.' =>
    __('Tag must be paired, missing: [ ** ], start tag match failed [ ** ] on line **.'),
  'Tag must be paired, no start tag: [ ** ]' =>
    __('Tag must be paired, no start tag: [ ** ]'),
  'Tag must be paired, missing: [ ** ], open tag match failed [ ** ] on line **.' =>
    __('Tag must be paired, missing: [ ** ], open tag match failed [ ** ] on line **.'),
  // spec-char-escape
  'Special characters must be escaped : [ ** ].' =>
    __('Special characters must be escaped : [ ** ].'),
  // attr-no-duplication
  'Duplicate of attribute name [ ** ] was found.' =>
    __('Duplicate of attribute name [ ** ] was found.'),
  // attr-value-no-duplication
  'Duplicate value [ ** ] was found in attribute [ ** ].' =>
    __('Duplicate value [ ** ] was found in attribute [ ** ].'),
  // attr-value-not-empty
  'The attribute [ ** ] must have a value.' =>
    __('The attribute [ ** ] must have a value.'),
  // inline-script-disabled
  'Inline script [ ** ] cannot be used.' =>
    __('Inline script [ ** ] cannot be used.'),
  // script-disabled
  'The <script> tag cannot be used.' =>
    __('The <script> tag cannot be used.'),

];

$lineString = $this->javascriptString(__('line'));
$colString = $this->javascriptString(__('col'));
$scriptCode = 'lesson.registerWords('.$lineString.', '.$colString.');';
foreach( $lineMessages as $original => $translation ) {
  $originalString = $this->javascriptString($original);
  $translationString = $this->javascriptString($translation);
  $scriptCode .= 'lesson.registerMessageTranslation('.$originalString.', '.$translationString.');';
}

$this->Html->scriptBlock(
  'import {lesson} from "'.$this->javaScriptBundle().'";'.$scriptCode,
  [
    'block' => 'scriptBottom',
    'type' => 'module',
  ]
);
