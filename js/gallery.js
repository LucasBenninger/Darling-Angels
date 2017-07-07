function loadAdeleAlbum(){
  console.log("test");
  //Set html

  //Show Album
  showAlbumView();
}

function albumViewClickListener() {
  var listener = $(document).mouseup(function(e) {
    var container = $("#albumView");
    if (!container.is(e.target) && container.has(e.target).length === 0) {
      hideAlbumView();
    }
  });
}

function showAlbumView() {
  $("#albumViewerBackground").css({
    "display":"block"
  });
  $("#albumView").css({
    "display": "block"
  });
}

function hideAlbumView() {
  $("#albumViewerBackground").css({
    "display":"none"
  });
  $("#albumView").css({
    "display": "none"
  });
}

function galleryInit(){
  $("#adeleAlbum").on("click", loadAdeleAlbum);
}