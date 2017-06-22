function showSideNav() {
  $("#sidenav").css({
    "display": ""
  });
}

function init() {
  $("#sidenav").css({
    "display": "none"
  });
  $("#hamburger").on("click", showSideNav);
}

$(document).ready(function() {
  init();
});