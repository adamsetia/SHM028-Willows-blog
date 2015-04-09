var win,
	wrap,
	doc;

$(function() {
	win = $(window);
	wrap = $('.wrapper');
	doc = $(document);
	if(wrap.find('#nav_menu-5, #nav_menu-6, #nav_menu-7')[0]) {
		initSideMenu();
	}
	if(!device.mobile()) {
		if($('.scrollTop').length > 0) {
			initScroll();
			showScrollTop();
		}
	}
})

function initSideMenu() {
	var elem = wrap.find('#nav_menu-5, #nav_menu-6, #nav_menu-7');
		
		elem.each(function(index, element) {
            var $this = $(this),
				btn = $this.find('h2'),
				holder = $this.find('> div'),
				tH = holder.find('ul.menu').outerHeight();
				
			btn.click(function() {
				var nH = (holder.height() <= 0)	? tH : 0;
				TweenLite.to(holder, 0.4, {css:{'height':nH}, ease:Cubic.easeOut});
			});
        });
		
}

// init scroll link
function initScroll() {
	$('a.scr-link').each(function() {
        var $this = $(this);
		var eid = $this.attr('href');
		$(this).click(function(e) {
			e.preventDefault();
			scrollerPage(eid);
		});
    });
}

// scroll page
function scrollerPage(pID) {
	var scrollYPos = ($(pID).offset().top);
	var	btmOffset = (doc.height() - win.height());
	
	var tgtYpos = (scrollYPos < btmOffset) ? scrollYPos : btmOffset;
	
	TweenLite.to(win, 1, {scrollTo: {y:tgtYpos}, ease:Cubic.easeOut});
}
// show hide scroll top
function showScrollTop() {	
	var sElem = $('.scrollTop'),
		headY = $('.sidebar').offset().top + ($('.sidebar').height()/2);
		
	sElem.css({
		'opacity' : 0,
		'display' : 'block'	
	});
	win.scroll(function() {
		var winY = win.scrollTop();
		if(winY>headY && (sElem.css('opacity') <= 0)) {
			TweenLite.to(sElem, 0.4, {css:{opacity:1}, ease:Cubic.easeOut});
		} else if(winY<=headY && (sElem.css('opacity') > 0)) {
			TweenLite.to(sElem, 0.4, {css:{opacity:0}, ease:Cubic.easeOut});
		}
	});
	win.scroll();
	
}