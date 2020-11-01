<?php 
/*
 *	                  ....
 *	                .:   '':.
 *	                ::::     ':..
 *	                ::.         ''..
 *	     .:'.. ..':.:::'    . :.   '':.
 *	    :.   ''     ''     '. ::::.. ..:
 *	    ::::.        ..':.. .''':::::  .
 *	    :::::::..    '..::::  :. ::::  :
 *	    ::'':::::::.    ':::.'':.::::  :
 *	    :..   ''::::::....':     ''::  :
 *	    :::::.    ':::::   :     .. '' .
 *	 .''::::::::... ':::.''   ..''  :.''''.
 *	 :..:::'':::::  :::::...:''        :..:
 *	 ::::::. '::::  ::::::::  ..::        .
 *	 ::::::::.::::  ::::::::  :'':.::   .''
 *	 ::: '::::::::.' '':::::  :.' '':  :
 *	 :::   :::::::::..' ::::  ::...'   .
 *	 :::  .::::::::::   ::::  ::::  .:'
 *	  '::'  '':::::::   ::::  : ::  :
 *	            '::::   ::::  :''  .:
 *	             ::::   ::::    ..''
 *	             :::: ..:::: .:''
 *	               ''''  '''''
 *	
 *
 *	AUTOMAD
 *
 *	Copyright (c) 2020 by Marc Anton Dahmen
 *	http://marcdahmen.de
 *
 *	Licensed under the MIT license.
 *	http://automad.org/license
 */


namespace Automad\Blocks;


defined('AUTOMAD') or die('Direct access not permitted!');


/**
 *	The embed block.
 *
 *	@author Marc Anton Dahmen
 *	@copyright Copyright (c) 2020 by Marc Anton Dahmen - <http://marcdahmen.de>
 *	@license MIT license - http://automad.org/license
 */

class Embed {


	/**	
	 *	Render a embed block.
	 *	
	 *	@param object $data
	 *	@return string the rendered HTML
	 */

	public static function render($data) {

		$attr = 'scrolling="no" frameborder="no" allowtransparency="true" allowfullscreen="true"';

		if (!empty($data->width)) {

			$paddingTop = $data->height / $data->width * 100;
			$html = <<< HTML
					<div style="position: relative; padding-top: $paddingTop%;">
						<iframe 
						src="$data->embed"
						$attr
						style="position: absolute; top: 0; width: 100%; height: 100%;"
						>
						</iframe>
					</div>
HTML;

		} else {

			$html = <<< HTML
					<iframe 
					src="$data->embed"
					height="$data->height"
					$attr
					style="width: 100%;"
					>
					</iframe>
HTML;

		}

		if (empty($data->caption)) {
			return "<figure>$html</figure>";
		} else {
			return "<figure>$html<figcaption>$data->caption</figcaption></figure>";
		}

	}


}