$(function() {
  
  // Inatilize the sortableness
  $(".sort").sortable({
    items: ".portlet:not(.sticky)",
    connectWith: ".sort",
    handle: ".portlet-header",
    cancel: ".sticky",
    placeholder: "portlet-placeholder ui-corner-all"
  });
  
  // Add the default sorting classes to style the sortable elements
  $(".portlet")
    .addClass("clearfix")
    .find(".portlet-header")
      .prepend("<span class='glyphicon glyphicon-move'>&nbsp;</span><span class='glyphicon glyphicon-plus portlet-toggle'>");
  
  // Adding the default unlocked state indicator
  $(".sort .portlet .portlet-content")
    .append("<span class='portlet-lock glyphicon glyphicon-unchecked'></span></span><span class='glyphicon glyphicon-refresh portlet-update'></span>");
  
  // Locking the jobs at the begining of the machines
  $(".machine .sort .portlet:first-child .portlet-content .portlet-lock")
    .toggleClass("glyphicon-unchecked glyphicon-lock");
  $(".machine .sort .portlet:first-child")
    .addClass("sticky");
  
  // Show / Hide the full data
  $(".portlet-toggle").click(function() {
    var icon = $(this);
    icon.toggleClass("glyphicon-plus glyphicon-minus");
    icon.closest(".portlet").find(".portlet-form").toggleClass("portlet-edit");
  });
  
  // Toggle the lock
  $(".portlet-lock").click(function() {
    var icon = $(this);
    icon.toggleClass("glyphicon-lock glyphicon-unchecked");
    icon.closest(".portlet").toggleClass("sticky");
  });
  
  var machineName;
  var columns;
  // Done on sorting [sortstop]
  $(".sort").on("sortstop", function(event, ui) {
    var job = $(ui.item);
    
    // Get the id of the machine that the job was moved into
    if(typeof(job.closest(".machine").prop('id')) === "undefined")
    {
      // Moved into the cue
      machineName = "cue";
      columns = [];
      columns = $().getSortables();
      console.log(columns);
    }
    else
    {
      // Moved into a machine (may be the same machine)
      machineName = job.closest(".machine").prop('id');
      columns = [];
      columns = $().getSortables();
      console.log(columns);
    }
    
    // Now iterate through each column and get the total time into an object
    var data = {};
    $(columns).each(function(index,value) {
      var idx = "#"+value;
      // Start the object empty so that if there are no jobs it starts with no data
      data[idx] = [];
      var times = [];
      $(idx).find(".portlet").each(function() {
        var hour = $(".hours",this).html();
        times.push(hour);
        //console.log(idx+" "+$(".hours",this).html());
        //console.log("X "+hour);
      });
      data[idx] = times;
      //console.log(idx+" "+times);
    });
    //console.log(data);
    
    // Now updat the progress bar UI
    $.each(data,function(key, value) {
      var bar = $(key+"-bar");
      // Clear the HTML in the progress bars
      $(bar).html(" ");
      var t = 0;
      $.each(value,function(k,v) {
        // Figure out what percent of 160 the current hour total represents
        t = t + parseInt(v);
      });
      var x = t/1.6;
      //console.log("x = "+x+" t = "+t);
      var y = "progress-bar-success";
      if(x > 100) {
        x = 100;
        y = "progress-bar-danger";
      }
      else if(x > 75) {
        y = "progress-bar-warning";
      }
      else if(x > 25) {
        y = "progress-bar-success";
      }
      else {
        y = "progress-bar-info";
      }
      var name = key.substring(1);
      
      $(bar).append('<div class="progress-bar '+y+'" style="width: '+x+'%"> </div><span>'+name+'</span>');
    });
  });
  
  
  
  // Datepicker Stuff
  $(function() {
    $( ".datepicker" ).datepicker({
      showOtherMonths: true,
      selectOtherMonths: true
    });
  });
});

// Get the ids of all of the sortable fields
(function( $ ){
   $.fn.getSortables = function() {
      var columns = [];
      $(".column").each(function(i, el) {
        var name = $(el).prop('id');
        columns[i] = name;
      });
      return columns;
   }; 
})( jQuery );