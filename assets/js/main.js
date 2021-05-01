const clickSearch = document.querySelector('.search');
const openInput = document.querySelector('.input_search');
const body = document.querySelector('.overlay');
const searchSubmit = document.querySelector('.search-submit');
const menusBar = document.querySelector('.menus-bar');
const sideBarOpen = document.querySelector('.side-menu');
const menuClose = document.querySelector('.menu-sidebar-close');
const html = document.querySelector('html');
// start of search bar js
body.onclick = function(){
	openInput.style.opacity = '0';
	openInput.style.visibility = 'hidden'
	this.style.opacity = '0';
	this.style.visibility = 'hidden'
	this.style.transform = 'scale(0)';
	searchSubmit.style.opacity = '0';
	searchSubmit.style.visibility = 'hidden';
	sideBarOpen.style.left = '-400px';
}
clickSearch.onclick = function(){
	searchSubmit.style.opacity = '1';
	searchSubmit.style.visibility = 'visible';
	searchSubmit.style.top = '5%';
	searchSubmit.style.transform = 'scale(1)';
    openInput.style.opacity = '1';
	openInput.style.transition = '0.3s';
	openInput.style.width = '60%';
	openInput.style.top = '5%';
	openInput.style.transform = 'scale(1)';
	body.style.width = '100%';
	body.style.height = '100%';
	body.style.transform = 'scale(1)';
	body.style.visibility = 'visible';
	body.style.opacity = '.5';
	openInput.style.visibility = 'visible';
	body.style.visibility = 'visible';
}
// end of search bar js
// sidemenu js
menusBar.onclick = function(){
	sideBarOpen.style.left = '0';
	body.style.opacity = '1';
	body.style.visibility = 'visible';
	body.style.width = '100%';
	body.style.height = '100%';
	body.style.transform = 'scale(1)';
	body.style.opacity = '.5';
}
menuClose.onclick = function(){
	sideBarOpen.style.left = '-400px';
	body.style.opacity = '0';
	body.style.visibility = 'hidden';
	body.style.transform = 'scale(0)';
	body.style.opacity = '0';


}
// end of side menu js

// owl-carousel-area
$(document).ready(function(){
	$('.carousel-inner').owlCarousel({
    animateOut: 'slideOutDown',
    animateIn: 'flipInX',
    items:1,
    margin:30,
    stagePadding:30,
    smartSpeed:450,
    loop:true,
    autoplay:false,
    dots:false,
    nav:false
});
	$('.product-carousel').owlCarousel({
    items:1,
    margin:30,
    loop:true,
    autoplay:true,
    dots:false,
    nav:true,
    navText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"]
	})
})

$(document).ready(function(){
	$('#data').dataTable();
})