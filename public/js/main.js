$(document).ready(function(){
	var 
	delay = 6000,
	topLine = $('.move-line-top'),
	bottomLine = $('.move-line-bottom'),
	moveLine = function () {
		setTimeout(function(){
			bottomLine.addClass('move');
		}, delay/2+100);
		topLine.addClass('move');
		bottomLine.removeClass('move');
		setTimeout(function(){
			topLine.removeClass('move');
			bottomLine.removeClass('move');
		}, delay-100);
	},
	changeBackground = function () {
		var 
		backgraunder = $('.bg'),
		count = backgraunder.children().length;
		items = backgraunder.find('div'),
		itemCurrent = items.filter('.current'),
		firstItem = items.eq(0),
		nextItem = itemCurrent.next();
		indexCurrent = itemCurrent.index();
		if(indexCurrent < count-1){
			nextItem.addClass('current').siblings().removeClass('current');
		}else{
			firstItem.addClass('current').siblings().removeClass('current');
		}
	},
	startEffect = function () {
		moveLine();
		setInterval(function () {
		changeBackground();
		moveLine();
		}, delay);
	};
	$('.control-tabs a').on('click', function(e){
		e.preventDefault();
		var 
		clickControl = $(this),
		itemsControl = $('.control-tabs a');
		indexCurrentControl = itemsControl.index(clickControl),
		contentItems = $('.tabs-content li');
		clickControl.parent();
		contentItems.eq(indexCurrentControl)
		.addClass('active')
		.siblings()
		.removeClass('active');
		clickControl.parent('li')
		.addClass('active').siblings()
		.removeClass('active');
	});
	startEffect();
});

