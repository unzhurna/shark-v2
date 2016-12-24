<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Pagination Config
 *
 * Just applying codeigniter's standard pagination config with twitter
 * bootstrap stylings
 *
 * @license		http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @author		Mike Funk
 * @link		http://codeigniter.com/user_guide/libraries/pagination.html
 * @email		mike@mikefunk.com
 *
 * @file		pagination.php
 * @version		1.3.1
 * @date		03/12/2012
 *
 * Copyright (c) 2011
 */

// --------------------------------------------------------------------------
$config['uri_segment']      = 3;

$config['full_tag_open']    = '<ul class="pagination pagination-sm ">';
$config['full_tag_close']   = '</ul>';

$config['first_link']       = FALSE;
$config['first_tag_open']   = '<li class="prev page">';
$config['first_tag_close']  = '</li>';

$config['last_link']        = FALSE;
$config['last_tag_open']    = '<li class="next page">';
$config['last_tag_close']   = '</li>';

$config['next_link']        = '&raquo;';
$config['next_tag_open']    = '<li class="next page">';
$config['next_tag_close']   = '</li>';

$config['prev_link']        = '&laquo;';
$config['prev_tag_open']    = '<li class="prev page">';
$config['prev_tag_close']   = '</li>';

$config['cur_tag_open']     = '<li class="active"><a href="">';
$config['cur_tag_close']    = '</a></li>';

$config['num_tag_open']     = '<li class="page">';
$config['num_tag_close']    = '</li>';
//
$config['anchor_class']     = 'follow_link';

$config['use_page_numbers'] = TRUE;

// --------------------------------------------------------------------------

/* End of file pagination.php */
/* Location: ./bookymark/application/config/pagination.php */
