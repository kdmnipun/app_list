$(function() {

    $('#side-menu').metisMenu();

});

//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
// Sets the min-height of #page-wrapper to window size
$(function() {
    $(window).bind("load resize", function() {
        topOffset = 50;
        width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.navbar-collapse').addClass('collapse');
            topOffset = 100; // 2-row-menu
        } else {
            $('div.navbar-collapse').removeClass('collapse');
        }

        height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $("#page-wrapper").css("min-height", (height) + "px");
        }
    });

    var url = window.location;
    var element = $('ul.nav a').filter(function() {
        return this.href == url || url.href.indexOf(this.href) == 0;
    }).addClass('active').parent().parent().addClass('in').parent();
    if (element.is('li')) {
        element.addClass('active');
    }
});


//Datatable
$(document).ready( function () {
    $('#dataTables-example').DataTable();
});

$(document).ready( function () {
    $('#analyTable').DataTable();
});

$(document).ready( function () {
    $('#attendancdtable').DataTable();
    $('.dataTables_length').addClass('bs-select');
});

function delete_confirm(){
  var numberOfChecked = $('.select:checked').length;
  var nameSelectedMember = $('.membername').text();
  //   if($('.select:checked').length > 0){
  //       var result = confirm("Given totall attendance "+ numberOfChecked +" !");
  //       if(result){
  //           return true;
  //       }else{
  //           return false;
  //       }
  //   }else{
  //       confirm("Given totall attendance 0!");
  //       return false;
  //   }

return confirm("Given totall attendance "+ numberOfChecked +" !");
}

//datepicker for attendance information
var date = $('#s_date').datepicker({ 
    dateFormat: 'yy-mm-dd',
    changeMonth: true,
    changeYear: true
}).val();

var date = $('#e_date').datepicker({ 
    dateFormat: 'yy-mm-dd',
    changeMonth: true,
    changeYear: true
}).val();

var date = $('#f_date').datepicker({ 
    dateFormat: 'yy-mm-dd',
    changeMonth: true,
    changeYear: true
}).val();

var date = $('#t_date').datepicker({ 
    dateFormat: 'yy-mm-dd',
    changeMonth: true,
    changeYear: true
}).val();

var date = $('#fdate').datepicker({ 
    dateFormat: 'yy-mm-dd',
    changeMonth: true,
    changeYear: true
}).val();
var date = $('#tdate').datepicker({ 
    dateFormat: 'yy-mm-dd',
    changeMonth: true,
    changeYear: true
}).val();



$(".yearpicker").yearpicker();


$("form#infoAtn").validate({
    rules: {
        tag: {
            required: true,

        },
        attend: {
            required: true,

        },

        num: {
            required: false,
            number: true,
        },

        fdate: {
            required: true,

        },

        tdate: {
            required: true,

        },                                    
    },
    messages: {
        tag: {
            required: "This field is required",

        },
        attend: {
            required: "This field is required",
        },

        num: {
            //required: "This field is required",
            number: "Character should be digit",
        },

        fdate: {
            required: "This field is required",
        },

        tdate: {
            required: "This field is required"
        },                                    
    }
}); 

//Add Member form validation
$("form#form1").validate({
    rules: {
        name: {
            required: true,

        },
        gender: {
            required: true,

        },

        member: {
            required: true,

        },

        type: {
            required: true,

        },

        phone: {
            required: true,

        },                                    
    },
    messages: {
        name: {
            required: "This field is required",

        },
        gender: {
            required: "This field is required",
        },

        member: {
            required: "This field is required",
        },

        type: {
            required: "This field is required",
        },

        phone: {
            required: "This field is required",
        },                                    
    }
});

//memberEdit form validation
$("form#memberEdit").validate({
    rules: {
        name: {
            required: true,

        },
        gender: {
            required: true,

        },

        member: {
            required: true,

        },

        type: {
            required: true,

        },

        phone: {
            required: true,
        },                                    
    },
    messages: {
        name: {
            required: "This field is required",

        },
        gender: {
            required: "This field is required",
        },

        member: {
            required: "This field is required",
        },

        type: {
            required: "This field is required",
        },

        phone: {
            required: "This field is required",
        },                                    
    }
});

//Select Member form validation
$("form#form2").validate({
    rules: {
        'member[]': {
            required: true
        }
    },
    messages: {
        'member[]': {
            required: "Select at least one type of member",

        },                                   
    }    

});
//Attendance form validation
$("form#attnForm").validate({
    rules: {
        tag: {
            required: true
        }
    },
    messages: {
        tag: {
            required: "Select one programme",

        },                                   
    }    

});

//Edit Attendance form validation
$("form#a_editForm").validate({
    rules: {
        tag: {
            required: true
        },
        date: {
            required: true
        },
    },
    messages: {
        tag: {
            required: "Select one programme",

        },                                   
    }    

});

//Edit Attendance form validation
$("form#abForm").validate({
    rules: {
        tag: {
            required: true
        },
        f_date: {
            required: true
        },
        t_date: {
            required: true
        },
    },
    messages: {
        tag: {
            required: "Select one programme",

        }, 
        f_date: {
            required: "This field is required",

        }, 
        t_date: {
            required: "This field is required",

        },                                   
    }    

});

//Attendance form validation
$("form#infoForm").validate({
    rules: {
        tag: {
            required: true
        },
        attend: {
            required: true
        },
        date: {
            required: true
        },
    },
    messages: {
        tag: {
            required: "Select one programme",

        },                                   
    }    

});

//Select Member form validation
$("form#form5").validate({
    rules: {
        'member[]': {
            required: true
        }
    },
    messages: {
        'member[]': {
            required: "Select at least one type of member",

        },                                   
    }    

});

//Select Member form validation
$("form#form3").validate({
    rules: {
        'member[]': {
            required: true
        },        
        'type': {
            required: true
        }
    },
    messages: {
        'member[]': {
            required: "Select at least one type of member",

        },        
        'type': {
            required: "Select one",

        },                                   
    }    

});

//Select Member form validation
$("form#formprog").validate({
    rules: {
        'member[]': {
            required: true
        },        
        'tag': {
            required: true
        },
        
        'attend': {
            required: true
        }
    },
    messages: {
        'member[]': {
            required: "Select at least one type of member",

        },        
        'tag': {
            required: "Select at least one programme",

        },
        'attend': {
            required: "required",

        },                                   
    }    

});

//Search modal
$('#button1').on('click', function(){
     var live = $('#search').val();
     if (live != '') {
     $('#newModal').modal('show');
     $('#newModal').find('.modal-title').text('Search result');
      }
  $.ajax({
      type: 'ajax',
      method: 'POST',
      url: '/Welcome/searchModal',
      data: {search:live},
      async: false,
      dataType: 'text',
      success: function(data){
       $(".modal-b").html(data);
      },
      error: function(){
        alert('Could not Edit Data');
      }
  });
}); 

//Search modal
$('#myForm').submit(function(e){
	e.preventDefault();
     var live = $('#search').val();
     if (live != '') {
     $('#newModal').modal('show');
     $('#newModal').find('.modal-title').text('Search result');
      }
  $.ajax({
      type: 'ajax',
      method: 'POST',
      url: '/Welcome/searchModal',
      data: {search:live},
      async: false,
      dataType: 'text',
      success: function(data){
       $(".modal-b").html(data);
      },
      error: function(){
        alert('Could not Edit Data');
      }
  });
});




