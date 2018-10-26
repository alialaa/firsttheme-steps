import $ from 'jquery';
import strip_tags from './helpers/strip-tags.js';

wp.customize( 'blogname', (value) => {
    value.bind( (to) => {
        $('.c-header__blogname').html(to);
    } )
})

wp.customize( '_themename_accent_colour', (value) => {
    value.bind( (to) => {
        $('#_themename-stylesheet-inline-css').html(
        	`
			    a {
			        color: ${to}
			    }
			    :focus {
			        outline-color: ${to}
			    }
			    .c-post.sticky {
			        border-left-color: ${to}
			    }
			    button, input[type=submit], .header-nav .menu > .menu-item:not(.mega) .sub-menu .menu-item:hover > a {
			        background-color: ${to}
			    }
        	`);
    } )
})

wp.customize( '_themename_site_info', (value) => {
    value.bind( (to) => {
        $('.c-site-info__text').html(strip_tags(to,'<a>'));
    } )
})