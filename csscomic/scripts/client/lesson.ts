// region imports

import {EditorView, basicSetup} from "codemirror";
import {html} from "@codemirror/lang-html";
import {Diagnostic, linter, lintGutter} from "@codemirror/lint";
import {HTMLHint} from 'htmlhint';
import {EditorState} from "@codemirror/state";
import {lineNumbers, ViewUpdate} from "@codemirror/view";
import {defaultHighlightStyle, syntaxHighlighting} from "@codemirror/language"
import {UFHtml} from "@ultraforce/ts-dom-lib";
import {Hint} from "htmlhint/types";
import {UFText} from "@ultraforce/ts-general-lib";

// endregion

// region local types

/**
 * Translation entry.
 */
interface Translation {
  original: RegExp;
  translation: string;
}

// endregion

// region constants

enum Scaling {
  NONE,
  FULL_WIDTH,
  EVERYTHING,
  CUSTOM,
}

const LintRuleset = {
  'tagname-lowercase': true,
  'attr-lowercase': true,
  'attr-value-double-quotes': true,
  'tag-pair': true,
  'spec-char-escape': true,
  'attr-no-duplication': true,
  'attr-value-no-duplication': true,
  'attr-value-not-empty': true,
  'inline-script-disabled': true,
  'script-disabled': true,
};

/**
 * CSS classes.
 */
const FULL_PAGE_CLASS = 'cc-lesson-output--show-full-page';
const BUTTON_HIDDEN_CLASS = 'cc-lesson-action__button--is-hidden';

/**
 * Minimal time between saves to server in milliseconds.
 */
const SAVE_INTERVAL_TIME = 2000;

// endregion

// region types

/**
 * This class handles the lesson pages.
 */
class Lesson {
  // region variables

  private m_updateButton: HTMLButtonElement = UFHtml.getForId('update-output-button');

  private m_editorContainer: HTMLDivElement = UFHtml.getForId('editor-container');

  private m_scaleSlider: HTMLInputElement = UFHtml.getForId('scale-slider');

  private m_scaleValue: HTMLDivElement = UFHtml.getForId('scale-value');

  private m_noScaleButton: HTMLButtonElement = UFHtml.getForId('no-scaling-button');

  private m_fullWidthButton: HTMLButtonElement = UFHtml.getForId('full-width-button');

  private m_everythingButton: HTMLButtonElement = UFHtml.getForId('everything-button');

  private m_downloadButton: HTMLButtonElement = UFHtml.getForId('download-button');

  private m_showFullPageButton: HTMLButtonElement = UFHtml.getForId('show-full-page-button');

  private m_exitFullPageButton: HTMLButtonElement = UFHtml.getForId('exit-full-page-button');

  private m_outputOuterContainer: HTMLDivElement = UFHtml.getForId('output-outer-container');

  private m_outputInnerContainer: HTMLDivElement = UFHtml.getForId('output-inner-container');

  private m_outputFrame: HTMLIFrameElement = UFHtml.getForId('output-frame');

  private m_outputSection: HTMLDivElement = UFHtml.getForId('output-section');

  private m_lintContainer: HTMLDivElement = UFHtml.getForId('lint-container');

  private m_loadingIndicator: HTMLDivElement = UFHtml.getForId('loading-indicator');

  private m_template: string = '';

  private m_scaling: Scaling = Scaling.NONE;

  private m_editor: EditorView | null = null;

  private m_index: string = '';

  private m_innerPaddingLeft: number = 0;
  private m_innerPaddingRight: number = 0;
  private m_innerPaddingTop: number = 0;
  private m_innerPaddingBottom: number = 0;

  // noinspection JSMismatchedCollectionQueryUpdate
  /**
   * To prevent codeblock editor instances from being garbage collected.
   */
  private m_codeBlockEditors: EditorView[] = [];

  /**
   * Text to use for 'line' in lint messages.
   */
  private m_line: string = 'line';

  /**
   * Text to use for 'col' in lint messages.
   */
  private m_col: string = 'col';

  private m_messageTranslations: Translation[] = [];

  private m_saveUrl: string | false = false;

  private m_lastSaveTime: number = 0;

  private m_pendingCodeToSave: false | string = false;

  private m_busySendingCode: boolean = false;

  private m_saveTimeoutId: null | number = null;

  private m_csrfToken: string = '';

  private m_downloadUrl: string = '';

  // endregion

  // region public methods

  /**
   *
   * @param {string} index
   *   Lesson index
   * @param {string} template
   *   Html template to assign to the iframe, with $body$ as placeholder for user code
   * @param {string} downloadUrl
   *   Url to download the output as pdf
   * @param {string} saveUrl
   *   Url to use to save code to server or empty string if the code should not be saved to server
   * @param {string} text
   *   Initial code to assign to the editor (only used when saveUrl is empty).
   * @param {string} csrfToken
   *   CSRF token to use when saving code to server
   */
  init(
    index: string,
    template: string,
    downloadUrl: string,
    saveUrl: string,
    text: string,
    csrfToken: string
  ) {
    this.m_index = index;
    this.m_template = template;
    this.m_downloadUrl = downloadUrl;
    this.m_saveUrl = saveUrl.length ? saveUrl : false;
    this.m_csrfToken = csrfToken;
    this.m_updateButton.addEventListener('click', () => this.handleUpdateOutputClick());
    this.m_noScaleButton.addEventListener('click', () => this.handleNoScaleClick());
    this.m_fullWidthButton.addEventListener('click', () => this.handleFullWidthClick());
    this.m_everythingButton.addEventListener('click', () => this.handleEverythingClick());
    this.m_downloadButton.addEventListener('click', () => this.handleDownloadClick());
    this.m_showFullPageButton.addEventListener('click', () => this.handleShowFullPageClick());
    this.m_exitFullPageButton.addEventListener('click', () => this.handleExitFullPageClick());
    this.m_outputFrame.addEventListener('load', () => this.handleOutputFrameLoad());
    // when user releases the slider (and has changed the position)
    this.m_scaleSlider.addEventListener('change', () => this.handleScaleSliderChange());
    // while user is dragging the slider
    this.m_scaleSlider.addEventListener('input', () => this.handleScaleSliderChange());
    window.addEventListener('resize', () => this.handleWindowResize());
    document.addEventListener('keydown', (event) => this.handleKeyDown(event));
    this.m_editor = new EditorView({
      doc: this.m_saveUrl !== false ? text : this.loadCodeFromStorage(),
      parent: this.m_editorContainer,
      extensions: [
        basicSetup,
        html(),
        this.htmlLinter(),
        lintGutter(),
        EditorView.updateListener.of(update => {
          if (update.docChanged) {
            this.handleEditorChange(update);
          }
        }),
      ]
    });
    const style = window.getComputedStyle(this.m_outputInnerContainer);
    this.m_innerPaddingLeft = parseFloat(style.paddingLeft);
    this.m_innerPaddingRight = parseFloat(style.paddingRight);
    this.m_innerPaddingTop = parseFloat(style.paddingTop);
    this.m_innerPaddingBottom = parseFloat(style.paddingBottom);
    setTimeout(
      () => this.m_loadingIndicator.classList.add('cc-lesson-page__loading--is-hidden'),
      250
    );
  }

  /**
   * Registers a code block that the user can assign to the editor.
   *
   * @param buttonId
   *   Dom id of button that will assign the code block when clicked
   * @param codeBlock
   *   The code block to assign to the editor
   * @param contentId
   *   When not null, the Id of a container to which the code block is added with syntax
   *   highlighting
   */
  registerCodeBlock(buttonId: string, codeBlock: string, contentId: string | null = null) {
    const button: HTMLButtonElement = UFHtml.getForId(buttonId);
    button.addEventListener('click', () => this.assignCodeToEditor(codeBlock));
    if (contentId) {
      const contentContainer = UFHtml.getForId(contentId);
      const editor = new EditorView({
        doc: codeBlock,
        parent: contentContainer,
        extensions: [
          html(),
          lineNumbers(),
          syntaxHighlighting(defaultHighlightStyle),
          EditorState.readOnly.of(true),
        ],
      });
      this.m_codeBlockEditors.push(editor);
    }
  }

  /**
   * Register words to use instead of default English ones.
   */
  registerWords(line: string, col: string) {
    this.m_line = line;
    this.m_col = col;
  }

  /**
   * Register a message translation. Use '**' as wildcard for variable parts. The number of '**'
   * in the message must match the number of '**' in the translation.
   */
  registerMessageTranslation(message: string, translation: string) {
    this.m_messageTranslations.push({
      original: new RegExp(
        UFText.escapeRegExp(message).replace(/\\\*\\\*/g, '(.*)')
      ),
      translation: translation,
    });
  }

  // endregion

  // region private methods

  private htmlLinter() {
    return linter((view: EditorView) => {
      const diagnostics: Diagnostic[] = [];
      const hints: Hint[] = HTMLHint.verify(view.state.doc.toString(), LintRuleset);
      for (const hint of hints) {
        const translation = this.translateMessage(hint.message);
        diagnostics.push({
          from: view.state.doc.line(hint.line).from + hint.col - 1,
          to: view.state.doc.line(hint.line).from + hint.col - 1,
          severity: hint.type,
          message: translation,
        });
      }
      return diagnostics;
    });
  }

  private applyScale(contentWidth: number, contentHeight: number) {
    // set raw iframe size to content size so scaling reproduces correct aspect
    this.m_outputFrame.style.width = contentWidth + 'px';
    this.m_outputFrame.style.height = contentHeight + 'px';
    // get available space in wrapper
    const wrapperWidth = this.m_outputOuterContainer.clientWidth
      - this.m_innerPaddingLeft - this.m_innerPaddingRight;
    const wrapperHeight = this.m_outputOuterContainer.clientHeight
      - this.m_innerPaddingTop - this.m_innerPaddingBottom;
    // calculate scale and restrict to max of the slider
    let scale;
    switch (this.m_scaling) {
      case Scaling.CUSTOM:
        scale = parseFloat(this.m_scaleSlider.value) / 100;
        break;
      case Scaling.FULL_WIDTH:
        scale = wrapperWidth / contentWidth;
        break;
      case Scaling.EVERYTHING:
        const scaleX = wrapperWidth / contentWidth;
        const scaleY = wrapperHeight / contentHeight;
        scale = Math.min(scaleX, scaleY);
        break;
      default:
        scale = 1;
        break;
    }
    scale = Math.min(scale, parseFloat(this.m_scaleSlider.max) / 100);
    this.m_outputFrame.style.transform = `scale(${scale})`;
    // set inner frame dimension to the scaled dimension of the iframe
    this.m_outputInnerContainer.style.width = (contentWidth * scale) + 'px';
    this.m_outputInnerContainer.style.height = (contentHeight * scale) + 'px';
    // update slider
    const percentage = scale * 100;
    this.m_scaleSlider.value = percentage.toString();
    this.m_scaleValue.textContent = percentage.toFixed(1) + '%';
  }

  private rescaleOutput() {
    try {
      const doc = this.m_outputFrame.contentWindow!.document;
      // use min, since body sometimes extends beyond html
      const contentWidth = Math.min(doc.documentElement.scrollWidth, doc.body.scrollWidth);
      // should normally be the same values, but just in case
      const contentHeight = Math.max(doc.documentElement.scrollHeight, doc.body.scrollHeight);
      this.applyScale(contentWidth, contentHeight);
      return true;
    } catch (error) {
      // should never happen, but just in case
      console.error('Could not access output document:', error);
      return false;
    }
  }

  private setScaling(scaling: Scaling) {
    this.m_scaling = scaling;
    this.rescaleOutput();
  }

  private validateHtml(htmlCode: string) {
    const results = HTMLHint.verify(htmlCode, LintRuleset);
    if (!results.length) {
      this.m_lintContainer.innerHTML = '';
      return true;
    }
    const issues = results
      .map(hint => this.renderLintHint(hint))
      .join('');
    this.m_lintContainer.innerHTML = `<div class="cc-lesson-lint__issues">${issues}</div>`;
    return false;
  }

  private renderLintHint(hint: Hint): string {
    const translation = this.translateMessage(hint.message);
    return `
      <div class="cc-lesson-lint__issue">
        <span class="cc-lesson-lint__type">${hint.type.toUpperCase()}</span>:
        <span class="cc-lesson-lint__message">${UFText.escapeHtml(translation)}</span>
        <span class="cc-lesson-lint__location">
          (${this.m_line} ${hint.line}, ${this.m_col} ${hint.col})
        </span>
      </div>
    `;
  }

  /**
   * Translate a lint message if a translation is registered. Replace '**' wildcards with matched
   * parts.
   *
   * @param {string} message
   *
   * @returns {string} Translated message or original message when no translation is found.
   */
  private translateMessage(message: string): string {
    for (const entry of this.m_messageTranslations) {
      if (entry.original.test(message)) {
        const matches = entry.original.exec(message);
        // should not happen, since test was successful; just to be sure
        if (matches === null) {
          continue;
        }
        let translation = entry.translation;
        for (let index = 1; index < matches.length; index++) {
          translation = translation.replace(/\*\*/, matches[index]);
        }
        return translation;
      }
    }
    return message;
  }

  private loadCodeFromStorage(): string {
    return localStorage.getItem(this.getStorageKey()) || '';
  }

  private saveCodeToStorage(code: string) {
    localStorage.setItem(this.getStorageKey(), code);
  }

  private getStorageKey(): string {
    return `csscomic_lesson_${this.m_index}_code`;
  }

  private assignCodeToEditor(codeBlock: string) {
    this.m_editor!.dispatch({
      changes: {from: 0, to: this.m_editor!.state.doc.length, insert: codeBlock}
    });
    this.saveCodeToStorage(codeBlock);
    setTimeout(() => this.rescaleOutput(), 10);
  }

  private showFullPage() {
    this.m_outputSection.classList.add(FULL_PAGE_CLASS);
    this.m_showFullPageButton.classList.add(BUTTON_HIDDEN_CLASS);
    this.m_exitFullPageButton.classList.remove(BUTTON_HIDDEN_CLASS);
  }

  private exitFullPage() {
    this.m_outputSection.classList.remove(FULL_PAGE_CLASS);
    this.m_showFullPageButton.classList.remove(BUTTON_HIDDEN_CLASS);
    this.m_exitFullPageButton.classList.add(BUTTON_HIDDEN_CLASS);
  }

  private saveCodeToServer(code: string) {
    // just to be sure
    if (this.m_saveUrl === false) {
      return;
    }
    // if code is being sent to the server, or a save is already scheduled, store the code
    if (this.m_busySendingCode || (this.m_saveTimeoutId != null)) {
      this.m_pendingCodeToSave = code;
      return;
    }
    // check if scheduling is needed (not enough time has past since last save)
    if (this.scheduleSaveToServer(code)) {
      return;
    }
    this.m_busySendingCode = true;
    this.m_lastSaveTime = Date.now();
    fetch(
      this.m_saveUrl,
      {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-Token': this.m_csrfToken,
        },
        body: JSON.stringify({
          index: this.m_index,
          text: code,
        }),
      })
      .then(response => {
        if (!response.ok) {
          console.error(`Server responded with status ${response.status}`);
        }
      })
      .catch(error => {
        console.error('Error saving code to server:', error);
      })
      .finally(() => this.doneSavingToServer());
  }

  private doneSavingToServer() {
    this.m_busySendingCode = false;
    if (this.m_pendingCodeToSave === false) {
      return;
    }
    // used entered more code while busy saving, so schedule a save
    this.m_saveTimeoutId = setTimeout(
      () => this.savePendingCodeToServer(),
      // wait at least 10ms before saving again
      Math.max(10, SAVE_INTERVAL_TIME - (Date.now() - this.m_lastSaveTime))
    );
  }

  private savePendingCodeToServer() {
    if (this.m_pendingCodeToSave === false) {
      return;
    }
    this.m_saveTimeoutId = null;
    this.m_lastSaveTime = 0;
    const codeToSave = this.m_pendingCodeToSave;
    this.m_pendingCodeToSave = false;
    this.saveCodeToServer(codeToSave);
  }

  /**
   * @param code
   *
   * @returns {boolean} True if schedule was made, false if scheduling is not needed
   */
  private scheduleSaveToServer(code: string): boolean {
    const timeSinceLastSave = Date.now() - this.m_lastSaveTime;
    if (timeSinceLastSave > SAVE_INTERVAL_TIME) {
      return false;
    }
    this.m_pendingCodeToSave = code;
    this.m_saveTimeoutId = setTimeout(
      () => this.savePendingCodeToServer(),
      SAVE_INTERVAL_TIME - timeSinceLastSave
    );
    return true;
  }

  private createHiddenInput(name: string, value: string): HTMLInputElement {
    const input = document.createElement('input');
    input.type = 'hidden';
    input.name = name;
    input.value = value;
    return input;
  }

  // endregion

  // region event handlers

  private handleUpdateOutputClick() {
    const userCode = this.m_editor!.state.doc.toString();
    if (!this.validateHtml(userCode)) {
      return;
    }
    // first resize frame to small size, to prevent the HTML to use all available space instead
    // of only resizing to the minimal space it needs.
    this.m_outputFrame.style.width = 10 + 'px';
    this.m_outputFrame.style.height = 10 + 'px';
    this.m_outputFrame.srcdoc = this.m_template.replace('$body$', userCode);
    this.m_downloadButton.disabled = false;
  }

  private handleNoScaleClick() {
    this.setScaling(Scaling.NONE);
  }

  private handleFullWidthClick() {
    this.setScaling(Scaling.FULL_WIDTH);
  }

  private handleEverythingClick() {
    this.setScaling(Scaling.EVERYTHING);
  }

  private handleShowFullPageClick() {
    this.showFullPage();
  }

  private handleExitFullPageClick() {
    this.exitFullPage();
  }

  private handleOutputFrameLoad() {
    this.rescaleOutput();
  }

  private handleScaleSliderChange() {
    this.setScaling(Scaling.CUSTOM);
  }

  private handleWindowResize() {
    this.rescaleOutput();
  }

  private handleKeyDown(event: KeyboardEvent) {
    switch (event.key) {
      case 'Escape':
        this.exitFullPage();
        break;
      case 'F9':
        this.handleUpdateOutputClick();
        event.preventDefault();
        break;
    }
  }

  private handleEditorChange(update: ViewUpdate) {
    const code = update.state.doc.toString();
    if (this.m_saveUrl === false) {
      this.saveCodeToStorage(code);
    } else {
      this.saveCodeToServer(code);
    }
  }

  private handleDownloadClick() {
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = this.m_downloadUrl;
    form.target = '_blank';
    form.style.display = 'none';
    form.appendChild(this.createHiddenInput('index', this.m_index));
    form.appendChild(this.createHiddenInput('text', this.m_outputFrame.srcdoc));
    form.appendChild(this.createHiddenInput('_csrfToken', this.m_csrfToken));
    document.body.appendChild(form);
    form.submit();
    form.remove();
  }

  // endregion
}

// endregion

// region exports

export const lesson = new Lesson();

// endregion
