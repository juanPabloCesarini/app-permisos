/* To avoid CSS expressions while still supporting IE 7 and IE 6, use this script */
/* The script tag referencing this file must be placed before the ending body tag. */

/* Use conditional comments in order to target IE 7 and older:
	<!--[if lt IE 8]><!-->
	<script src="ie7/ie7.js"></script>
	<!--<![endif]-->
*/

(function() {
	function addIcon(el, entity) {
		var html = el.innerHTML;
		el.innerHTML = '<span style="font-family: \'icomoon\'">' + entity + '</span>' + html;
	}
	var icons = {
		'icon-unlocked': '&#xe902;',
		'icon-newspaper': '&#xe901;',
		'icon-spoon-knife': '&#xe900;',
		'icon-home3': '&#xe905;',
		'icon-pencil': '&#xe906;',
		'icon-location': '&#xe947;',
		'icon-mobile': '&#xe958;',
		'icon-user': '&#xe971;',
		'icon-user-plus': '&#xe973;',
		'icon-user-tie': '&#xe976;',
		'icon-key': '&#xe98d;',
		'icon-bin2': '&#xe9ad;',
		'icon-earth': '&#xe9ca;',
		'icon-exit': '&#xea14;',
		'icon-mail': '&#xea83;',
		'0': 0
		},
		els = document.getElementsByTagName('*'),
		i, c, el;
	for (i = 0; ; i += 1) {
		el = els[i];
		if(!el) {
			break;
		}
		c = el.className;
		c = c.match(/icon-[^\s'"]+/);
		if (c && icons[c[0]]) {
			addIcon(el, icons[c[0]]);
		}
	}
}());
