function sideNavClickListener() {
  var listener = $(document).mouseup(function(e) {
    var container = $("#sidenav");
    if (!container.is(e.target)) {
      hideSideNav();
    }
  });
}

function showSideNav() {
  $("#sidenav").css({
    "display": "block"
  });
}

function hideSideNav() {
  $("#sidenav").css({
    "display": "none"
  });
}

function init() {
  sideNavClickListener();
  albumViewClickListener();
  $("#hamburger").on("click", showSideNav);
  $("#sideNavCross").on("click", hideSideNav);
}

$(document).ready(function() {
  init();
});