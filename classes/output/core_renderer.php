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
 * @copyright  &copy; 2016-onwards G J Barnard in respect to modifications of the CleanM theme by
 *             Urs Hunkler {@link urs.hunkler@unodo.de}.
 * @author     G J Barnard - gjbarnard at gmail dot com and {@link http://moodle.org/user/profile.php?id=442195}.
 * @copyright  2015 eFaktor.
 * @author     Original author: Urs Hunkler {@link urs.hunkler@unodo.de}.
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later.
 */

namespace theme_hairbourne\output;

require_once($CFG->dirroot . '/theme/bootstrapbase/renderers/core_renderer.php');  // Urrgh, but it works for child themes.

/**
 * Class containing data for mustache layouts
 *
 * @package         theme_hairbourne
 */
class core_renderer extends \theme_bootstrapbase_core_renderer {

    public function __construct(\moodle_page $page, $target) {
        parent::__construct($page, $target);
    }

    protected function get_base_data() {
        global $CFG, $SITE;

        if (!$this->page->has_set_url()) {
            $thispageurl = new \moodle_url(\qualified_me());
            $this->page->set_url($thispageurl, $thispageurl->params());
        }

        $data = new \stdClass();

        if (!empty($this->page->theme->settings->logo)) {
            $data->html_heading = '<div class="logo"></div>';
        } else {
            $data->html_heading = $this->page_heading();
        }

        $data->html_footnote = '';
        if (!empty($this->page->theme->settings->footnote)) {
            $data->html_footnote = '<div class="footnote text-center">' .
                format_text($this->page->theme->settings->footnote).'</div>';
        }

        // Add the other common page data.
        $data->navbar = $this->navbar();
        $data->page_heading_button = $this->page_heading_button();
        $data->course_header = $this->course_header();
        $data->course_content_header = $this->course_content_header();
        $data->main_content = $this->main_content();
        $data->course_content_footer = $this->course_content_footer();
        $data->course_footer = $this->course_footer();
        $data->page_doc_link = $this->page_doc_link();
        $data->login_info = $this->login_info();
        $data->home_link = $this->home_link();
        $data->standard_footer_html = $this->standard_footer_html();

        return $data;
    }

    protected function render_embedded_template() {
        $data = $this->get_base_data();

        return $this->render_from_template('theme_hairbourne/embedded', $data);
    }

    /**
     * Defer to template.
     *
     * @param $page
     *
     * @return string html for the page
     */
    protected function render_maintenance_template() {
        $data = $this->get_base_data();

        return $this->render_from_template('theme_hairbourne/maintenance', $data);
    }

    /**
     * Defer to template.
     *
     * @param $page
     *
     * @return string html for the page
     */
    protected function render_columns1_template() {
        $data = $this->get_base_data();

        $data->header_tile = $this->render_template('header_tile');

        return $this->render_from_template('theme_hairbourne/columns1', $data);
    }

    /**
     * Defer to template.
     *
     * @param $page
     *
     * @return string html for the page
     */
    protected function render_columns2_template() {
        // Set default (LTR) layout mark-up for a two column page (side-pre-only).
        $regionmain = 'span9 pull-right';
        $sidepre = 'span3 desktop-first-column';
        // Reset layout mark-up for RTL languages.
        if (right_to_left()) {
            $regionmain = 'span9';
            $sidepre = 'span3 pull-right';
        }

        $data = $this->get_base_data();

        $data->regionmain = $regionmain;
        $data->blocks_side_pre = $this->blocks('side-pre', $sidepre);
        $data->header_tile = $this->render_template('header_tile');

        return $this->render_from_template('theme_hairbourne/columns2', $data);
    }

    /**
     * Defer to template.
     *
     * @param $page
     *
     * @return string html for the page
     */
    protected function render_columns3_template() {
        $regionmainbox = 'span9';
        $regionmain = 'span8 pull-right';
        $sidepre = 'span4 desktop-first-column';
        $sidepost = 'span3 pull-right';
        // Reset layout mark-up for RTL languages.
        if (right_to_left()) {
            $regionmain = 'span8';
            $regionmainbox = 'span9 pull-right';
            $sidepre = 'span4 pull-right';
            $sidepost = 'span3 desktop-first-column';
        }

        $data = $this->get_base_data();

        $data->regionmainbox = $regionmainbox;
        $data->regionmain = $regionmain;
        $data->blocks_side_pre = $this->blocks('side-pre', $sidepre);
        $data->blocks_side_post = $this->blocks('side-post', $sidepost);
        $data->header_tile = $this->render_template('header_tile');

        return $this->render_from_template('theme_hairbourne/columns3', $data);
    }

    /**
     * Defer to template.
     *
     * @param $page
     *
     * @return string html for the page
     */
    protected function render_secure_template() {
        // Set default (LTR) layout mark-up for a three column page.
        $regionmainbox = 'span9';
        $regionmain = 'span8 pull-right';
        $sidepre = 'span4 desktop-first-column';
        $sidepost = 'span3 pull-right';
        // Reset layout mark-up for RTL languages.
        if (right_to_left()) {
            $regionmainbox = 'span9 pull-right';
            $regionmain = 'span8';
            $sidepre = 'span4 pull-right';
            $sidepost = 'span3 desktop-first-column';
        }

        $data = $this->get_base_data();

        $data->regionmainbox = $regionmainbox;
        $data->regionmain = $regionmain;
        $data->blocks_side_pre = $this->blocks('side-pre', $sidepre);
        $data->blocks_side_post = $this->blocks('side-post', $sidepost);
        $data->header_tile = $this->render_template('header_tile');

        return $this->render_from_template('theme_hairbourne/secure', $data);
    }

    // Stuff.
    public function render_wrapper_template() {
        $mustache = $this->page->theme->layouts[$this->page->pagelayout]['mustache'];

        $data = new \stdClass();
        $data->htmlattributes = $this->htmlattributes();
        $data->page_title = $this->page_title();
        $data->favicon = $this->favicon();
        $data->standard_head_html = $this->standard_head_html();
        $data->body_attributes = $this->body_attributes();
        $data->standard_top_of_body_html = $this->standard_top_of_body_html();
        $data->pagelayout = $this->render_template($mustache);
        $data->standard_end_of_body_html = $this->standard_end_of_body_html();

        return $this->render_from_template('theme_hairbourne/wrapper_layout', $data);
    }

    protected function render_template($mustache) {
        $callablemethod = 'render_'.$mustache.'_template';

        if (method_exists($this, $callablemethod)) {
            return $this->$callablemethod();
        }
        throw new coding_exception('Can not render template, renderer method ('.$callablemethod.') not found.');
    }

    protected function render_header_tile_template() {
        global $CFG, $SITE;
        $data = new \stdClass();

        // Add the page data from the theme settings.
        $data->html_navbarclass = '';
        if (!empty($this->page->theme->settings->invert)) {
            $data->html_navbarclass = ' navbar-inverse';
        }
        $data->wwwroot = $CFG->wwwroot;
        $data->shortname = \format_string($SITE->shortname, true,
            array('context' => \context_course::instance(SITEID)));

        $data->user_menu = $this->user_menu();
        $data->custom_menu = $this->custom_menu();
        $data->page_heading_menu = $this->page_heading_menu();

        return $this->render_from_template('theme_hairbourne/tile_header', $data);        
    }
}
