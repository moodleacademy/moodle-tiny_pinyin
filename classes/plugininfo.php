<?php
// This file is part of Moodle - https://moodle.org/
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
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * Tiny Pinyin characters plugin for Moodle.
 *
 * @package     tiny_pinyin
 * @copyright   2024 Your Name <you@example.com>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace tiny_pinyin;

use context;
use editor_tiny\plugin;
use editor_tiny\plugin_with_buttons;
use editor_tiny\plugin_with_menuitems;
use editor_tiny\plugin_with_configuration;

class plugininfo extends plugin implements plugin_with_configuration, plugin_with_buttons, plugin_with_menuitems {

    public static function get_available_buttons(): array {
        return [
            'tiny_pinyin/plugin',
        ];
    }

    public static function get_available_menuitems(): array {
        return [
            'tiny_pinyin/plugin',
        ];
    }

    public static function get_plugin_configuration_for_context(
        context $context,
        array $options,
        array $fpoptions,
        ?\editor_tiny\editor $editor = null
    ): array {

    // Map of pinyin characters.
    $charmap = [
        ['id' => '&#257;', 'name' => '&#257;'],
        ['id' => '&#225;', 'name' => '&#225;'],
        ['id' => '&#462;', 'name' => '&#462;'],
        ['id' => '&#224;', 'name' => '&#224;'],
		['id' => '&#275;', 'name' => '&#275;'],
		['id' => '&#233;', 'name' => '&#233;'],
		['id' => '&#283;', 'name' => '&#283;'],
		['id' => '&#232;', 'name' => '&#232;'],
		['id' => '&#299;', 'name' => '&#299;'],
		['id' => '&#237;', 'name' => '&#237;'],
		['id' => '&#464;', 'name' => '&#464;'],
		['id' => '&#236;', 'name' => '&#236;'],
		['id' => '&#333;', 'name' => '&#333;'],
		['id' => '&#243;', 'name' => '&#243;'],
		['id' => '&#466;', 'name' => '&#466;'],
		['id' => '&#242;', 'name' => '&#242;'],
		['id' => '&#363;', 'name' => '&#363;'],
		['id' => '&#250;', 'name' => '&#250;'],
		['id' => '&#468;', 'name' => '&#468;'],
		['id' => '&#249;', 'name' => '&#249;'],
		['id' => '&#470;', 'name' => '&#470;'],
		['id' => '&#472;', 'name' => '&#472;'],
		['id' => '&#474;', 'name' => '&#474;'],
		['id' => '&#476;', 'name' => '&#476;'],
		['id' => '&#252;', 'name' => '&#252;'],
    ];
        return [
            // These will be mapped to a namespaced EditorOption in Tiny.
            'pinyinChars' => $charmap,
        ];
    }
}
