<?php defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('service_widget'))
{
    function service_widget()
    {
        $CI =& get_instance();
        $CI->load->model('product/category_model', 'service');
        $service = $CI->service->get_all_category();
        return $service;
    }
}

if (!function_exists('project_widget'))
{
    function project_widget()
    {
        $CI =& get_instance();
        $CI->load->model('project/project_model', 'project');
        $project = $CI->project->get_all_project();
        return $project;
    }
}

if (!function_exists('partner_widget'))
{
    function partner_widget()
    {
        $CI =& get_instance();
        $CI->load->model('partner/partner_model', 'partner');
        $partner = $CI->partner->get_all_partner();
        return $partner;
    }
}

if (!function_exists('provinces_widget'))
{
    function provinces_widget()
    {
        $CI =& get_instance();
        $CI->load->model('partner/partner_model', 'partner');
        $provinces = $CI->partner->get_all_province();
        return $provinces;
    }
}

if (!function_exists('cities_widget'))
{
    function cities_widget()
    {
        $CI =& get_instance();
        $CI->load->model('partner/partner_model', 'partner');
        $cities = $CI->partner->get_all_cities();
        return $cities;
    }
}

if (!function_exists('testi_widget'))
{
    function testi_widget()
    {
        $CI =& get_instance();
        $CI->load->model('testimony/testi_model', 'testi');
        $testi = $CI->testi->get_all_testi();
        return $testi;
    }
}

if (!function_exists('client_widget'))
{
    function client_widget()
    {
        $CI =& get_instance();
        $CI->load->model('client/client_model', 'client');
        $client = $CI->client->get_all_client();
        return $client;
    }
}

if (!function_exists('sales_widget'))
{
    function sales_widget()
    {
        $CI =& get_instance();
        $CI->load->model('sales/sales_model', 'sales');
        $sales = $CI->sales->get_all_sales();
        return $sales;
    }
}

if (!function_exists('news_widget'))
{
    function news_widget()
    {
        $CI =& get_instance();
        $CI->load->model('blog/article_model', 'news');
        $news = $CI->news->get_all_article();
        return $news;
    }
}

if (!function_exists('project_widget'))
{
    function project_widget()
    {
        $CI =& get_instance();
        $CI->load->model('project/project_model', 'project');
        $project = $CI->project->get_all_project();
        return $project;
    }
}




if(!function_exists('category_widget'))
{
    function category_widget()
    {
        $CI =& get_instance();
        $CI->load->model('blog/article_model', 'article');
        $categories = $CI->article->get_all_category();

        $out = '<ul>';
        foreach ($categories as $category)
        {
            $out .= '<li><a href="'.site_url('news_category/'.$category['category_slug'].'/1').'">'.$category['category_name'].'</a></li>';
        }
        $out .= '</ul>';
        return $out;
    }
}

if(!function_exists('brocure_widget'))
{
    function brocure_widget()
    {
        $CI =& get_instance();
        $CI->load->model('blog/article_model', 'article');
        $categories = $CI->article->get_all_category();

        $out = '<ul>';
        foreach ($categories as $category)
        {
            $out .= '<li><a href="'.$category['category_slug'].'">'.$category['category_name'].'</a></li>';
        }
        $out .= '</ul>';
        return $out;
    }
}

if(!function_exists('download_01_widget'))
{
    function download_01_widget()
    {
        $CI =& get_instance();
        $CI->load->model('blog/article_model', 'article');
        $categories = $CI->article->get_all_category();

        $out = '<ul>';
        foreach ($categories as $category)
        {
            $out .= '<li><a href="'.$category['category_slug'].'">'.$category['category_name'].'</a></li>';
        }
        $out .= '</ul>';
        return $out;
    }
}
