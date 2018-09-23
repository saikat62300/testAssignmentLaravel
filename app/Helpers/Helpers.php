<?php

function siteurl($url = null)
{
    if (!empty($url)) {
        $returnUrl = rtrim(url($url), '/') . '/';
    } else {
        $returnUrl = rtrim(url(), '/') . '/';
    }
    return str_replace(['http:', 'https'], 'http', $returnUrl);
}

if (!function_exists('jsonOutput'))
{

    function jsonOutput($params = [], $echo = true, $header = false)
    {
        if (empty($params) || (!is_array($params) && !is_object($params)))
        {
            $output = json_encode([
                'success' => false,
                'message' => Lang::get('messages.DEFAULT.INVALID_ARGUMENTS'),
                'data' => ['input_data' => $params]]);

            if ($echo)
            {
                echo $output;
            }
            else
            {
                return $output;
            }
        }
        else
        {
            if ($echo)
            {
                if ($header)
                {
                    return response()->json($params);
                }
                else
                {
                    echo json_encode($params);
                }
            }
            else
            {
                return json_encode($params);
            }
        }
    }

}
