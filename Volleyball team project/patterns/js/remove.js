$("table").delegate('td','mouseover mouseleave', function(e) {
    if (e.type === 'mouseover') {
      $(this).parent().addClass("red");
    }
    else {
      $(this).parent().removeClass("red");
    }
});

$("table").delegate('td','click dblclick', function(e) {
    if (e.type === 'click') {
      $(this).parent().addClass("permred");
    }
    else {
      $(this).parent().removeClass("permred");
    }
});