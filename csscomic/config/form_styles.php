<?php

/**
 * Form styling
 */
return [
  'button' => '<button class="cc-button__normal {{buttonClass}}"{{attrs}}>{{text}}</button>',
  'checkbox' => '<input type="checkbox" name="{{name}}" value="{{value}}" class="cc-form__checkbox"{{attrs}} /></span>',
  'error' => '<div class="cc-form__error"{{attrs}}>{{content}}</div>',
  'file' => '<input type="file" name="{{name}}" class="" {{attrs}}>',
  'formStart' => '<form {{attrs}}>',
  'formEnd' => '</form>',
  'input' => '<input type="{{type}}" name="{{name}}" class="cc-form__single-line {{inputClass}}"{{attrs}}/>',
  'label' => '<label class="cc-form__label"{{attrs}} >{{text}}</label>',
  'inputContainer' => '<div class="cc-form__input-container {{containerClass}}"{{attrs}}>{{content}}{{extraContent}}</div>',
  'inputContainerError' => '<div class="cc-form__input-container {{containerClass}}"{{attrs}}>{{content}}{{extraContent}}{{error}}</div>',
  'inputSubmit' => '<input type="{{type}}" class="cc-button__normal {{buttonClass}}"{{attrs}}/>',
  'nestingLabel' => '{{hidden}}<label class="cc-form__nesting-label-container"{{attrs}}>{{input}}<span class="cc-form__nesting-label-text">{{text}}</span></label>',
  'option' => '<option value="{{value}}"{{attrs}}>{{text}}</option>',
  'optgroup' => '<optgroup label="{{label}}"{{attrs}}>{{content}}</optgroup>',
  'radio' => '<input type="radio" name="{{name}}" value="{{value}}" class="cc-form__radio"{{attrs}} /><span class="cc-form__radio-circle"></span>',
  'select' => '<select name="{{name}}" class="cc-form__drop-down {{inputClass}}"{{attrs}}>{{content}}</select>',
  'selectMultiple' => '<select name="{{name}}[]" multiple="multiple" class="cc-form__drop-down"{{attrs}}>{{content}}</select>',
  'submitContainer' => '{{content}}',
  'textarea' => '<textarea name="{{name}}" class="cc-form__multi-line"{{attrs}}>{{value}}</textarea>',
];
