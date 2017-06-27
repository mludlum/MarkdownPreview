<?php

class MarkdownPreviewPlugin extends MantisPlugin
{

    function register()
    {
        $this->name = 'Markdown Preview';
        $this->description = 'Creates a Preview area for all text areas on a Report Issue form';

        $this->version = '0.1';
        $this->requires = array(
            'MantisCore' => '2.0.0'
        );

        $this->author = 'Michael Ludlum';
        $this->contact = 'dredgehqdev@cablearm.oom';
        //$this->url = '';
    }

    function hooks()
    {
        return array(
            'EVENT_LAYOUT_RESOURCES' => 'resources',
	    //'EVENT_LAYOUT_BODY_BEGIN' => 'body',
        );
    }

    function body($p_event)
    {
	$body = 'var SELECTION_ONE_OPTION = "' . plugin_lang_get("selectionOneOption") . '";' .
            'var NO_RESULTS = "' . plugin_lang_get("noResults") . '";' ;

	return $body;
    }

    /**
     * Create the resource link to load the jQuery library.
     */
    function resources($p_event)
    {

        $resources = '<script type="text/javascript" src="' . plugin_page('mpreview.php') . '"></script>' ;


        return $resources;
    }
}

