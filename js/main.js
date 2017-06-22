function showSideNav() {
  $("#sidenav").css({
    "display": ""
  });
}

function hideSideNav(){
	$("#sidenav").css({
    "display": "none"
  });
}

function init() {
  hideSideNav();
  $("#hamburger").on("click", showSideNav);
	$("#sideNavCross").on("click", hideSideNav);
}

$(document).ready(function() {
  init();
});