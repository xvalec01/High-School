
 
 $("table").delegate('td','mouseover mouseleave', function(e) {
    if (e.type === 'mouseover') {
      $(this).parent().addClass("yellow");
    }
    else {
      $(this).parent().removeClass("yellow");
    }
});
