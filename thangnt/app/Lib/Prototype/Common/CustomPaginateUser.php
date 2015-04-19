<?php namespace App\Lib\Prototype\Common;

use Input;
use Illuminate\Pagination\BootstrapThreePresenter;

class CustomPaginateUser extends BootstrapThreePresenter
{
    /**
     * Convert the URL window into Zurb Foundation HTML.
     *
     * @return string
     */
    public function render()
    {
        if( ! $this->hasPages())
            return '';

        $input_params = Input::all();
        $parameters = '&';
        if(count($input_params) > 0)
        	
        	foreach ($input_params as $key => $value) {
				($value != '' and $key != 'page') ? $parameters .= $key . '=' .$value . '&' : '';
			}
			
		$middle_links = $this->getLinks($parameters);
		// $middle_links = getLinks();

        $links =  sprintf(
            ' %s  %s  %s  %s  %s ',
            $this->getFirstButton('First', $parameters),
            $this->getPreviousButton('Previous', $parameters),
            $middle_links,
            $this->getNextButton('Next', $parameters),
            $this->getLastButton('Last', $parameters)
        );

        return $links;
    }

    /**
	 * Render the actual link slider.
	 *
	 * @return string
	 */
    protected function getLinks($input_params = '')
	{
		// dump(count(Input::all()), Input::all());

		// if(count(Input::all()) <= 0)
		// 	return $this->getLinksNotParameter();
		// dd($input_params);
		return $this->getLinksHasParameter($input_params);
	}

	public function getLinksHasParameter($input_params)
	{
		$parameters = $input_params;

		$html = '';

		// dd($this->window['first']);

		if (is_array($this->window['first']))
		{
			$html .= $this->getUrlLinks($this->window['first'], $parameters);
		}

		if (is_array($this->window['slider']))
		{
			$html .= $this->getDots();
			$html .= $this->getUrlLinks($this->window['slider'], $parameters);
		}

		if (is_array($this->window['last']))
		{
			$html .= $this->getDots();
			$html .= $this->getUrlLinks($this->window['last'], $parameters);
		}

		return $html;
	}

	/**
	 * Get the links for the URLs in the given array.
	 *
	 * @param  array  $urls
	 * @return string
	 */
	protected function getUrlLinks(array $urls, $parameters = '')
	{	
		$html = '';

		$link = '?page=';

		$currentPage = $this->paginator->currentPage();
		$lastPage = $this->paginator->lastPage();

		if($currentPage != 1 && $currentPage != $lastPage)
		{
			$html = '<li class="pure-menu-item"><span> ... </span></li>';
			
			$html .= $this->getPageLinkWrapper($link . ($currentPage - 1), ($currentPage - 1), null, $parameters);
			$html .= $this->getPageLinkWrapper($link . $currentPage, $currentPage, null, $parameters);
			$html .= $this->getPageLinkWrapper($link . ($currentPage + 1), ($currentPage + 1), null, $parameters);

			$html .= '<li class="pure-menu-item"><span> ... </span></li>';
			
		}
		else if ($currentPage == 1)
		{
			// Current position: First Page
			$html .= $this->getPageLinkWrapper($link . $currentPage, $currentPage, null, $parameters);

			if($lastPage - $currentPage > 0)
			{
				$html .= $this->getPageLinkWrapper($link . ($currentPage + 1), ($currentPage + 1), null, $parameters);
				
			}

			if($lastPage - $currentPage > 1)
			{
				$html .= $this->getPageLinkWrapper($link . ($currentPage + 2), ($currentPage + 2), null, $parameters);
			}

			$html .= '<li class="pure-menu-item"><span> ... </span></li>';

		}
		else if ($lastPage == $currentPage)
		{
			// Current: Last Page

			$html .= '<li class="pure-menu-item"><span> ... </span></li>';
			if($lastPage > 2)
			{
				$html .= $this->getPageLinkWrapper($link . ($currentPage - 2), ($currentPage - 2), null, $parameters);
				
			}

			if($lastPage > 1)
			{
				$html .= $this->getPageLinkWrapper($link . ($currentPage - 1), ($currentPage - 1), null, $parameters);
			}

			$html .= $this->getPageLinkWrapper($link . ($currentPage), ($currentPage), null, $parameters);

		}

		return $html;
	}

    protected function getFirstButton($text = 'First', $parameters = '')
	{
		if ($this->paginator->currentPage() <= 1)
		{
			return $this->getDisabledTextWrapper($text);
		}

		$url = '?page=1';

		return $this->getPageLinkWrapper($url, $text, 'First', $parameters);

		// return '<li class="pure-menu-item"><a href="" class="pure-menu-link pure-button">First</a></li>';
	}

	protected function getLastButton($text = 'Last', $parameters = '')
	{
		if ( ! $this->paginator->hasMorePages())
		{
			return $this->getDisabledTextWrapper($text);
		}

		$url = '?page=' . $this->paginator->lastPage();

		return $this->getPageLinkWrapper($url, $text, 'Last', $parameters);
	}

	/**
	 * Get the next page pagination element.
	 *
	 * @param  string  $text
	 * @return string
	 */
	protected function getNextButton($text = 'Next', $parameters = '')
	{
		// If the current page is greater than or equal to the last page, it means we
		// can't go any further into the pages, as we're already on this last page
		// that is available, so we will make it the "next" link style disabled.
		if ( ! $this->paginator->hasMorePages())
		{
			return $this->getDisabledTextWrapper($text);
		}

		$url = $this->paginator->url($this->paginator->currentPage() + 1);

		return $this->getPageLinkWrapper($url, $text, 'next', $parameters);
	}


	/**
	 * Get the previous page pagination element.
	 *
	 * @param  string  $text
	 * @return string
	 */
	protected function getPreviousButton($text = 'Previous', $parameters = '')
	{
		// If the current page is less than or equal to one, it means we can't go any
		// further back in the pages, so we will render a disabled previous button
		// when that is the case. Otherwise, we will give it an active "status".
		if ($this->paginator->currentPage() <= 1)
		{
			return $this->getDisabledTextWrapper($text);
		}

		$url = $this->paginator->url(
			$this->paginator->currentPage() - 1
		);

		return $this->getPageLinkWrapper($url, $text, 'prev', $parameters);
	}


	/**
	 * Get the URL for the next page.
	 *
	 * @return string|null
	 */
	public function nextPageUrl()
	{
		if ($this->hasMore)
		{
			return $this->url($this->currentPage() + 1);
		}
	}



    /**
     * Get a pagination "dot" element.
     *
     * @return string
     */
    protected function getDots()
    {
        // return $this->getDisabledTextWrapper('&hellip;');

        return $this->getDisabledTextWrapper('<li class="pure-menu-item">...</li>');

    }

	/**
	 * Get HTML wrapper for a page link.
	 *
	 * @param  string  $url
	 * @param  int  $page
	 * @param  string|null  $rel
	 * @return string
	 */
	protected function getPageLinkWrapper($url, $page, $rel = null, $parameters = '')
	{
		// dump('getPageLinkWrapper:' . $parameters);
		// dump($url);
		if ($page == $this->paginator->currentPage())
		{
			return $this->getActivePageWrapper($page);
		}
		// dump($this->getAvailablePageWrapper($url, $page, $rel));

		return $this->getAvailablePageWrapper($url, $page, $rel, $parameters);
	}

	/**
	 * Get HTML wrapper for an available page link.
	 *
	 * @param  string  $url
	 * @param  int  $page
	 * @param  string|null  $rel
	 * @return string
	 */
	protected function getAvailablePageWrapper($url, $page, $rel = null, $parameters = '')
	{
		$rel = is_null($rel) ? '' : ' rel="'.$rel.'"';
		// dump($url, $rel, $page);
		// <a href="" class="pure-menu-link pure-button">first</a>

		return '<span>        </span><li class="pure-menu-item"><a class="pure-menu-link pure-button" href="'.$url. $parameters .'"'.$rel.'>'.$page . '</a></li><span>        </span>';
		
	}

	/**
     * Get HTML wrapper for disabled text.
     *
     * @param  string  $text
     * @return string
     */
    protected function getDisabledTextWrapper($text)
    {
    	// Trang hien tai la trang dau hoac cuoi
    	// dump($text);

        return '<li class="pure-menu-item"><button class="pure-button pure-button-disabled">'.$text.'</button></li>';
    }

    /**
     * Get HTML wrapper for active text.
     *
     * @param  string  $text
     * @return string
     */
    protected function getActivePageWrapper($text)
    {
    	// Link cho Trang hien tai 
    	// Page current text
    	// dump($text);

        return '<li class="pure-menu-item"><button class="pure-button pure-button-disabled">' . $text . '</button></li>';        

    }
}