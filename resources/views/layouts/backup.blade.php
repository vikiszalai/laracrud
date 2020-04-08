<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="http://localhost/laravel/public/css/app.css">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
        integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css"
        href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/flick/jquery-ui.css">
    <link href="resources/css/jquery.tagit.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/g/sweetalert2@6.6.0(sweetalert2.min.css+sweetalert2.css)">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
        integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous">
    </script>
    <script src="http://code.jquery.com/jquery-1.8.1.min.js" type="text/javascript" charset="utf-8">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.min.js" type="text/javascript"
        charset="utf-8"></script>
    <script src="resources/js/tag-it.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
</head>

<body>
    <div id="app">

        @include('inc.navbar')
        <div class="container">


            @yield('content')
        </div>


    </div>
    </div>
</body>

</html>

<!-- Modal -->
<div class="modal fade" id="mainModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="lang-text6 modal-title" id="mainModalLabel"> Termék felvétele</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-body bg-light mt-5">
                    <form id="contact-form" class="form" action="" method=" POST">
                        <input type="hidden" name="e_prod_id" id="e_prod_id" value="">
                        <div class="form-group">
                            <label id="product_l">Név</label>
                            <input type="text" class="form-control form-control-lg validation" name="product_name"
                                id="product_name">
                        </div>
                        <div class="form-group">
                            <label id="product_d">Leírás</label>
                            <textarea class="form-control form-control-lg" name="product_desc"
                                id="product_desc"></textarea>
                        </div>
                        <label id="product_p">Ár</label>
                        <div class="form-group" style="display:flex; flex-direction: row;align-items: center">
                            <input type="number" style="width:150px;" class="form-control form-control-lg validation"
                                name="product_price" id="product_price" min="0.00" max="10000.00" step="0.01" />
                            &nbsp;&nbsp<label> Ft</label>
                        </div>
                        <label id="tags">Cimkék</label>
                        <ul id="myTags">
                        </ul>
                        <div class="form-group">
                            <div style="text-align:center; padding: 5px;">
                                <img id="product_img_u" src="" style="width:600px;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label id="img">Kép feltöltése</label>
                            <input type="file" class="form-control" name="product_img" id="product_img">
                        </div>
                        <br>
                        <div class="form-group"
                            style="position: relative;display: -ms-flexbox;display: flex;width: 100%;">
                            <label id="act">Aktív:</label>
                            <input type="text" style="width:190px;" class="form-control datepicker"
                                id="active_from" /><label for="">-tól</label>
                            &nbsp;&nbsp;

                            <input type="text" style="width:190px;" class="form-control datepicker"
                                id="active_to" /><label for="">-ig</label>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Bezárás</button>
                <button type="button" id="submit" class="btn btn-primary">Mentés</button>
            </div>
        </div>
    </div>
</div>

<script>
    $("#myTags").tagit();
    //CKEDITOR beállítások
    var edit_value = undefined;
    CKEDITOR.replace("product_desc");
    CKEDITOR.config.basicEntities = false;
    CKEDITOR.config.entities = false;
    CKEDITOR.config.entities_greek = false;
    CKEDITOR.config.entities_latin = false;
    CKEDITOR.config.htmlEncodeOutput = false;
    CKEDITOR.config.entities_processNumerical = false;
    CKEDITOR.instances.product_desc.setData("<h1>Helló Világ!</h1><p>Láss neki a szerkesztéshez!.</p>"
);

    $(".datepicker").datepicker({
    dateFormat: "yy-mm-dd 23:59:59",
    onSelect: function (date) {
    var d = new Date(); // current
    var h = d.getHours();
    h = h < 10 ? "0" + h : h; 
    var m=d.getMinutes(); m=m < 10 ? "0" + m : m; 
    var s=d.getSeconds(); s=s < 10 ? "0" + s : s;
    date=date + " " + h + ":" + m + ":" + s; 
    var date2=$("#active_from").datepicker("getDate"); 
    var nextDayDate=new Date(); 
    nextDayDate.setDate(date2.getDate() + 7); 
    $("#active_to").datepicker().datepicker("setDate", nextDayDate);
    },
});

//kep blobba 
  var img_blob;
  var err_message;
  document.getElementById("product_img").onchange = function (e) {
    var file = document.getElementById("product_img").files[0];
    var reader = new FileReader();
    reader.onload = function () {
      img_blob = reader.result;
      $("#product_img_u").attr("src", img_blob);
      var blob = window.dataURLtoBlob(reader.result);
      alert(
        blob,
        new File([blob], "image.png", {
          type: "image/png",
        })
      );
    };
    reader.readAsDataURL(file);
  };


$(".delete").on('click', function() {
   var ID = $(this).data('id');
   if (confirm('Biztosan törlöd ezt a terméket?')) {
    $.ajax({
    type: "POST",
    url: './delete',
    data: { _token: '{{csrf_token()}}',
    product_id: ID,
   },
    
    success: function (data) {
       console.log(data);
    },
    error: function (data, textStatus, errorThrown) {
        console.log(data);

    },
});
} else {
}

});

$(".edit").on('click', function() {

    edit_value = "yes";

   
   var datas = [
        $(this).data("id"),
        $(this).data("title"),
        $(this).data("price"),
        $(this).data("active_from"),
        $(this).data("active_to"),
      ];

      var ids = [
        "#e_prod_id",
        "#product_name",
        "#product_price",
        "#active_from",
        "#active_to",
      ];

      for (i = 0; i < datas.length; i++) {
        $(".modal-body " + ids[i]).val(datas[i]);
      }

      var edit_product_desc = $(this).data("body");
      CKEDITOR.instances.product_desc.setData(edit_product_desc);
      var image = $(this).data("image");
      $(".modal-body #product_img_u").attr("src", image);
      var array = $(this).data("tags").split(",");
      $("#myTags").tagit("removeAll");
      $.each(array, function (i) {
        $("#myTags").tagit("createTag", array[i]);
      });



if(status == "ok"){ 

    $.ajax({
    type: "POST",
    url: './delete',
    data: { _token: '{{csrf_token()}}',
    product_id: ID,
   },
    
    success: function (data) {
       console.log(data);
    },
    error: function (data, textStatus, errorThrown) {
        console.log(data);

    },
});
}


});


    $("#submit").click(function () { 
        $("#mainModal .modal-content .form-group input").each(function (index,data) {
      var value = $(this).val();
      var inputId = $(this).attr("id");
      status = "ok";

      if (value == "") {
        $(this).addClass("is-invalid");
        status = "not ok";
      } else {
        $(this).removeClass("is-invalid");
        //status = "ok";
      }


      
    });
    img_blob = $("#product_img_u").attr("src");
  
    if (img_blob == undefined && edit_value == undefined) {
      $("#product_img").addClass("is-invalid");

      status = "not ok";
    } else {
      $("#product_img").removeClass("is-invalid");
      //status = "ok";
    }


    if (CKEDITOR.instances["product_desc"].getData() == "") {
      status = "not ok";
    } else {
      //status = "ok";
    }
    if ($("#myTags").tagit("assignedTags") == "") {
      status = "not ok";
      $("ul.tagit").css("border", "1px solid red");
    } else {
      //status = "ok";
      $("#myTags").removeClass("is-invalid");
    }




  if(status == "ok"){

      $.ajax({
    type: "POST",
    url: './create',
    data: { _token: '{{csrf_token()}}',product_id: $("#e_prod_id").val(),
    product_name: $("#product_name").val(),
    product_desc: CKEDITOR.instances["product_desc"].getData(),
    product_price: $("#product_price").val(),
    tags: $("#myTags").tagit("assignedTags"),
    active_from: $("#active_from").val(),
    active_to: $("#active_to").val(),
    img: img_blob},
    
    success: function (data) {
       console.log(data);
    },
    error: function (data, textStatus, errorThrown) {
        console.log(data);

    },
});

    }else{
        alert("Töltsd ki a hiányzó mezőket");
    }
    });
</script>