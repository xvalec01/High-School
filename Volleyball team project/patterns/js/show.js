$("table").delegate('td','mouseover mouseleave', function(e) {
    if (e.type === 'mouseover') {
      $(this).parent().addClass("green");
    }
    else {
      $(this).parent().removeClass("green");
    }
});