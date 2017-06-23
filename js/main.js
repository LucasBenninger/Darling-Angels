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
    "display": ""
  });

  sideNavClickListener();
}

function hideSideNav() {
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