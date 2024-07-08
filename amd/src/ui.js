// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Tiny Pinyin characters ui
 *
 * @module      tiny_pinyin/ui
 * @copyright   2024 Your Name <you@example.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

import TinyPinyinModal from './modal';
import {getPinyinChars} from './options';
import Selectors from './selectors';

/**
 * Handle action
 * @param {TinyMCE} editor
 */
export const handleAction = (editor) => {
    displayDialogue(editor);
};


/**
 * Get the template context for the dialogue.
 *
 * @param {Editor} editor
 * @param {object} data
 * @returns {object} data
 */
const getTemplateContext = (editor, data) => {
    const pinyinChars = getPinyinChars(editor);

    return Object.assign({}, {
        elementid: editor.id,
        pinyinchars: pinyinChars,
    }, data);
};

/**
 * Display the Pinyin accents dialog
 * @param {TinyMCE} editor
 * @param {Object} data
 * @returns {Promise<void>}
 */
const displayDialogue = async(editor, data = {}) => {
    const modal = await TinyPinyinModal.create({
        templateContext: getTemplateContext(editor, data),
    });

    const $root = modal.getRoot();
    const root = $root[0];

    root.addEventListener('click', (e) => {
        const pinyinCharBtn = e.target.closest(Selectors.pinyinChar);

        if (pinyinCharBtn) {
            e.preventDefault();
            editor.insertContent(pinyinCharBtn.getAttribute('data-value'));
            modal.destroy(); // Close/hide the modal.
            editor.focus(); // Set the focus back to the editor.
        }
    });
};
