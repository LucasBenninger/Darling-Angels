function albumViewClickListener() {
  var listener = $(document).mouseup(function(e) {
    var container = $("#albumView");
    if (!container.is(e.target)) {
      hideAlbumView();
    }
  });
}

function showAlbumView() {
  $("#albumView").css({
    "display": ""
  });
}

function hideAlbumView() {
  $("#albumView").css({
    "display": "none"
  });
}