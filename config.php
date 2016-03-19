<?php
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
 * HairBourne theme.
 *
 * @package    theme_hairbourne
 * @copyright  &copy; 2016-onwards G J Barnard in respect to modifications of the CleanM theme by Urs Hunkler {@link urs.hunkler@unodo.de}.
 * @author     G J Barnard - gjbarnard at gmail dot com and {@link http://moodle.org/user/profile.php?id=442195}.
 * @copyright  2015 eFaktor.
 * @author     Original author: Urs Hunkler {@link urs.hunkler@unodo.de}.
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later.
 */

$THEME->name = 'hairbourne';

$THEME->doctype = 'html5';
$THEME->parents = array('bootstrapbase');
$THEME->sheets = array('custom');
$THEME->supportscssoptimisation = false;
$THEME->yuicssmodules = array();
$THEME->enable_dock = true;
$THEME->editor_sheets = array();

$THEME->rendererfactory = 'theme_overridden_renderer_factory';
$THEME->csspostprocess = 'theme_hairbourne_process_css';

$THEME->layouts = array(
    // Most backwards compatible layout without the blocks - this is the layout used by default.
    'base' => array(
//        'file' => 'columns1.php',
        'file' => 'layout.php',
        'renderable' => 'columns1_layout',
        'regions' => array(),
    ),
    // Standard layout with blocks, this is recommended for most pages with general information.
    'standard' => array(
//        'file' => 'columns3.php',
        'file' => 'layout.php',
        'renderable' => 'columns3_layout',
        'regions' => array('side-pre', 'side-post'),
        'defaultregion' => 'side-pre',
    ),
    // Main course page.
    'course' => array(
//        'file' => 'columns3.php',
        'file' => 'layout.php',
        'renderable' => 'columns3_layout',
        'regions' => array('side-pre', 'side-post'),
        'defaultregion' => 'side-pre',
        'options' => array('langmenu' => true),
    ),
    'coursecategory' => array(
//        'file' => 'columns3.php',
        'file' => 'layout.php',
        'renderable' => 'columns3_layout',
        'regions' => array('side-pre', 'side-post'),
        'defaultregion' => 'side-pre',
    ),
    // Part of course, typical for modules - default page layout if $cm specified in require_login().
    'incourse' => array(
//        'file' => 'columns3.php',
        'file' => 'layout.php',
        'renderable' => 'columns3_layout',
        'regions' => array('side-pre', 'side-post'),
        'defaultregion' => 'side-pre',
    ),
    // The site home page.
    'frontpage' => array(
//        'file' => 'columns3.php',
        'file' => 'layout.php',
        'renderable' => 'columns3_layout',
        'regions' => array('side-pre', 'side-post'),
        'defaultregion' => 'side-pre',
        'options' => array('nonavbar' => true),
    ),
    // Server administration scripts.
    'admin' => array(
//        'file' => 'columns2.php',
        'file' => 'layout.php',
        'renderable' => 'columns2_layout',
        'regions' => array('side-pre'),
        'defaultregion' => 'side-pre',
    ),
    // My dashboard page.
    'mydashboard' => array(
//        'file' => 'columns3.php',
        'file' => 'layout.php',
        'renderable' => 'columns3_layout',
        'regions' => array('side-pre', 'side-post'),
        'defaultregion' => 'side-pre',
        'options' => array('langmenu' => true),
    ),
    // My public page.
    'mypublic' => array(
//        'file' => 'columns3.php',
        'file' => 'layout.php',
        'renderable' => 'columns3_layout',
        'regions' => array('side-pre', 'side-post'),
        'defaultregion' => 'side-pre',
    ),
    'login' => array(
//        'file' => 'columns1.php',
        'file' => 'layout.php',
        'renderable' => 'columns1_layout',
        'regions' => array(),
        'options' => array('langmenu' => true),
    ),

    // Pages that appear in pop-up windows - no navigation, no blocks, no header.
    'popup' => array(
        'file' => 'popup.php',
//        'file' => 'layout.php',
        'renderable' => 'popup_layout',
        'regions' => array(),
        'options' => array('nofooter' => true, 'nonavbar' => true),
    ),
    // No blocks and minimal footer - used for legacy frame layouts only!
    'frametop' => array(
//        'file' => 'columns1.php',
        'file' => 'layout.php',
        'renderable' => 'columns1_layout',
        'regions' => array(),
        'options' => array('nofooter' => true, 'nocoursefooter' => true),
    ),
    // Embeded pages, like iframe/object embeded in moodleform - it needs as much space as possible.
    'embedded' => array(
//        'file' => 'embedded.php',
        'file' => 'layout.php',
        'renderable' => 'embedded_layout',
        'regions' => array()
    ),
    // Used during upgrade and install, and for the 'This site is undergoing maintenance' message.
    // This must not have any blocks, links, or API calls that would lead to database or cache interaction.
    // Please be extremely careful if you are modifying this layout.
    'maintenance' => array(
//        'file' => 'maintenance.php',
        'file' => 'layout.php',
        'renderable' => 'maintenance_layout',
        'regions' => array(),
    ),
    // Should display the content and basic headers only.
    'print' => array(
//        'file' => 'columns1.php',
        'file' => 'layout.php',
        'renderable' => 'columns1_layout',
        'regions' => array(),
        'options' => array('nofooter' => true, 'nonavbar' => false),
    ),
    // The pagelayout used when a redirection is occuring.
    'redirect' => array(
//        'file' => 'embedded.php',
        'file' => 'layout.php',
        'renderable' => 'embedded_layout',
        'regions' => array(),
    ),
    // The pagelayout used for reports.
    'report' => array(
//        'file' => 'columns2.php',
        'file' => 'layout.php',
        'renderable' => 'columns2_layout',
        'regions' => array('side-pre'),
        'defaultregion' => 'side-pre',
    ),
    // The pagelayout used for safebrowser and securewindow.
    'secure' => array(
//        'file' => 'secure.php',
        'file' => 'layout.php',
        'renderable' => 'secure_layout',
        'regions' => array('side-pre', 'side-post'),
        'defaultregion' => 'side-pre'
    ),
);
