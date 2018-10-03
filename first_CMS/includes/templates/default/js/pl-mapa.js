$(function ($) {

    var mapUrl = '';	/* ĹcieĹźka do pliku .png;
     jeĹźeli mapa nie Ĺaduje siÄ poprawnie zamieĹ na bezpoĹrednie odwoĹanie do pliku, np:
     var mapUrl='http://example.com/map/pl-500px.png'; 
     domyĹlnie ĹcieĹźka pobierana jest z pliku CSS, ale w niektĂłrych przypadkach nie Ĺaduje siÄ prawidĹowo */
    var loadingText = "Loading ..."; // tekst wyĹwietlany podczas Ĺadowania mapy
    var loadingErrorText = "Brak mapy!"; // tekst bĹÄdu; wyĹwietlany, gdy nie zostaĹ zaĹadowany plik .png
    var tooltipArrowHeight = 6;	/* wysokoĹÄ strzaĹki pod 'dymkiem' z nazwÄ regionu;
     strzaĹkÄ moĹźesz usunÄÄ w pliku CSS, po usuniÄciu strzaĹki ustaw: var tooltipArrowHeight=0; */
    var visibleListId = '#map-widoczna-lista'; /* id div.a z widocznÄ listÄ regionĂłw
     nie zapomnij o znaku hash (#)
     nie zapomnij zmieniÄ id w pliku .css */
    var agentsListId = '#adresy';	/* id div.a z listÄ adresĂłw/przedstawicieli
     nie zapomnij o znaku hash (#)  */

    // TRYB WIELOKROTNEGO WYBORU (MULTIPLE-CLICK)
    var searchLink = 'szukaj.php'; // odnoĹnik do wyszukiwarki
    var searchLinkVar = 'wojewodztwo'; // zmienna przekazywana do skryptu wyszukiwarki
    var searchName = 'Szukaj'; // tekst odnoĹnika do wyszukiwarki


    $.multipleClickAction = function (e) {
	var clickedRegions = [];
	$('#polska').find('.active-region').each(function () { // szuka wybranych regionĂłw (NIE EDYTUJ!)
	    var url = $(this).children('a').attr('href'); // pobiera odnoĹniki wybranych regionĂłw (NIE EDYTUJ!)

	    // operacje na linkach

	    var slicedUrl = url.slice(1); // domyĹlnie odcina hash (#) w odnoĹniku
	    /* jeĹźeli uĹźyjesz bezpiecznych odnoĹnikĂłw, np: 'szukaj.php?wojewodztwo=mazowieckie'
	     musisz 'odciÄÄ' takĹźe parametry odnoĹnika:
	     
	     var slicedUrl=url.slice(url.indexOf('?')+13); // usuwa: '?wojewodztwo=' ... +13 to iloĹÄ odciÄtych znakĂłw
	     */

	    // uzupeĹnia tablicÄ wybranymi regionami (NIE EDYTUJ!)
	    clickedRegions.push(slicedUrl);
	});

	// tworzy odnoĹnik do wyszukiwarki wraz z zaznaczonymi regionami
	$('#search-link').attr('href', searchLink + '?' + searchLinkVar + '=' + clickedRegions.join('|'));

    }

    // FUNKCJE STANDARDOWE
    // klikniÄcie w region
    $.defaultClickAction = function (e) {
	// pobiera adres odnoĹnika klikniÄtego regionu (NIE EDYTUJ!)
//	var url = $(e).children('a').attr('href');
	// domyĹlnie klikniÄcie w region przenosi na stronÄ w odnoĹniku
//	window.location.href = url;

	// wyĹwietla adres przedstawiciela w wybranym regionie
//	$(agentsListId).find('li').hide();
//	$(url + ',' + url + ' li').show();
    }

    // ponowne klikniÄcie w zaznaczony region
    $.doubleClickedRegion = function (e) {
	// domyĹlnie deaktywuje zaznaczony region
//	$(e).removeClass('active-region');

	// ukrywa adresy przedstawicieli
//	$(agentsListId).find('li').hide();
    }


    /* --------------------------------------------------------
     tutaj zaczyna sie mapa
     
     NIE EDYTUJ! 
     
     Polska, interaktywna mapa wojewĂłdztw | http://winstonwolf.pl/clickable-maps/polska.html
     script version: 3.4 by Winston Wolf | http://winstonwolf.pl
     Copyright (C) 2011 Winston_Wolf | All rights reserved
     
     
     powaĹźnie, NIE EDYTUJ TEGO! */
    $('#map-pl').prepend('<span id="loader">' + loadingText + '</span>').addClass('script');
    $('#polska').find('a').hide();
    $(agentsListId).find('li').hide();
    if ($('#map-pl').hasClass('multiple-click')) {
	if (searchLink == '') {
	    var searchLink = 'search.php';
	}
	if (searchLinkVar == '') {
	    var searchLinkVar = 'region';
	}
	if (searchName == '') {
	    var searchName = 'Search';
	}
	$('<a href="' + searchLink + '" id="search-link">' + searchName + '</a>').insertAfter('#polska');
    }
    if ($('#map-pl').hasClass('widoczna-lista')) {
	$('#map-pl').after('<div id="' + visibleListId.slice(1) + '"><ul></ul></div>');
    }
    if (mapUrl == '') {
	var mapUrl = $('#polska').css('background-image').replace(/^url\("?([^\"\))]+)"?\)$/i, '$1');
    }
    var mapImg = new Image();
    $(mapImg).load(function () {
	var countRegions = 0;
	var clickedRegions = [];
	$('#loader').fadeOut();
	$('#polska').find('li').each(function () {
	    var liid = $(this).attr('id');
	    var url = $(this).children('a').attr('href');
	    var code = null;
	    var spans = 0;
	    countRegions++;
	    switch (liid) {
		case'pl6':
		case'pl8':
		case'pl13':
		case'pl16':
		    spans = 26;
		    break;
		case'pl5':
		case'pl7':
		case'pl15':
		    spans = 47;
		    break;
		default:
		    spans = 31;
	    }
	    var tooltipLeft = $(this).children('a').outerWidth() / -2;
	    var tooltipTop = $(this).children('a').outerHeight() * -1 - tooltipArrowHeight;
	    if ($('#map-pl').hasClass('no-tooltip')) {
		var tooltipTop = 0;
	    }
	    $(this).prepend('<span class="map" />').append('<span class="bg"/>').attr('tabindex', countRegions);
	    for (var i = 1; i < spans; i++) {
		$(this).find('.map').append('<span class="s' + i + '" />');
	    }
	    $(this).children('a').css({'margin-left': tooltipLeft, 'margin-top': tooltipTop});
	    if ($('#map-pl').hasClass('widoczna-lista')) {
		var liHref = $(this).children('a').attr('href');
		var liText = $(this).children('a').text();
		$(visibleListId + ' ul').append('<li class="' + liid + '"><a href="' + liHref + '">' + liText + '</a></li>');
	    }
	    if ($(this).children('a').hasClass('active-region') || url == window.location.hash) {
		$(this).addClass('active-region focus');
		$(agentsListId).find('li').hide();
		$(url + ',' + url + ' li').show();
		$('.' + $(this).attr('id')).children('a').addClass('active-region');
		$('#search-link').attr('href', searchLink + '?' + searchLinkVar + '=' + url.slice(1));
	    }
	}).hover(function () {
	    $.MapHoveredRegion($(this));
	}, function () {
	    $.MapUnHoveredRegion($(this));
	}).focus(function () {
	    $.MapHoveredRegion($(this));
	}).blur(function () {
	    $.MapUnHoveredRegion($(this));
	}).keypress(function (e) {
	    code = (e.keyCode ? e.keyCode : e.which);
	    if (code == 13)
		$.MapClickedRegion($(this));
	}).click(function (e) {
	    $.MapClickedRegion($(this));
	});
	if ($('#map-pl').hasClass('widoczna-lista')) {
	    $(visibleListId).find('a').each(function () {
		var itemId = '#' + $(this).parent().attr('class');
		$(this).hover(function () {
		    $.MapHoveredRegion(itemId);
		}, function () {
		    $.MapUnHoveredRegion(itemId);
		}).focus(function () {
		    $.MapHoveredRegion(itemId);
		}).blur(function () {
		    $.MapUnHoveredRegion(itemId);
		}).keypress(function (e) {
		    code = (e.keyCode ? e.keyCode : e.which);
		    if (code == 13)
			$.MapClickedRegion(itemId);
		}).click(function (e) {
		    $.MapClickedRegion(itemId);
		});
	    });
	}
    }).error(function () {
	$('#loader').text(loadingErrorText);
	$('#polska').find('span').hide();
	$('#map-pl,#polska').css({'height': 'auto', 'left': '0', 'margin': '0 auto'});
    }).attr('src', mapUrl);
    $.MapClickedRegion = function (e) {
	var listItemId = '.' + $(e).attr('id');
	if ($('#map-pl').hasClass('multiple-click')) {
	    if ($(e).hasClass('active-region')) {
		$(e).removeClass('active-region');
		$(listItemId).children('a').removeClass('active-region');
	    } else {
		$(e).addClass('active-region');
		$(listItemId).children('a').addClass('active-region');
	    }
	    $.multipleClickAction(e);
	} else {
	    if ($(e).hasClass('active-region')) {
		$.doubleClickedRegion(e);
		$(listItemId).children('a').removeClass('active-region');
		window.location.hash = "";
	    } else {
		$('#polska,' + visibleListId).find('.active-region').removeClass('active-region');
		$('#polska').find('.focus').removeClass('focus');
		if ($(e).hasClass('active-region')) {
		    $(e).removeClass('active-region focus');
		    $(listItemId).children('a').removeClass('active-region');
		} else {
		    $(e).addClass('active-region focus').children('a').show();
		    $(listItemId).children('a').addClass('active-region');
		}
		$.defaultClickAction(e);
	    }
	}
    }
    $.MapHoveredRegion = function (e) {
	$('#polska').find('.active-region').children('a').hide();
	$(e).children('a').show();
	$(e).addClass('focus');
	$('.' + $(e).attr('id')).children('a').addClass('focus');
    }
    $.MapUnHoveredRegion = function (e) {
	$(e).children('a').hide();
	if ($(e).hasClass('active-region') == false) {
	    $(e).removeClass('focus');
	}
	$('.' + $(e).attr('id')).children('a').removeClass('focus');
    }
    var loaderLeft = $('#loader').outerWidth() / -2;
    var loaderTop = $('#loader').outerHeight() / -2;
    $('#loader').css({'margin-left': loaderLeft, 'margin-top': loaderTop});
// koniec mapy

});