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

use renderable;
use templatable;
use renderer_base;
use stdClass;

/**
 * Class containing data for mustache layouts
 *
 * @package         theme_hairbourne
 */
class columns3_layout extends base_layout implements renderable, templatable {
    /**
     * Export this data so it can be used as the context for a mustache template.
     *
     * @return stdClass
     */
    public function export_for_template(renderer_base $output) {
        // Set default (LTR) layout mark-up for a three column page.
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

        $data = parent::export_for_template($output);

        $data->body_attributes = $output->body_attributes();
        $data->regionmainbox = $regionmainbox;
        $data->regionmain = $regionmain;
        $data->blocks_side_pre = $output->blocks('side-pre', $sidepre);
        $data->blocks_side_post = $output->blocks('side-post', $sidepost);
        $data->header_tile = $output->header_tile();

        $data->pagelayout = $output->render_from_template('theme_hairbourne/columns3', $data);

        return $data;
    }
}
