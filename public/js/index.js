//   HOME SECTION

    // VALIDATION FEEDBACK FORM
    (function() {
        'use strict';
        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');
          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
      
        // STATUS ALERTS
      $(document).ready(function(){
          $('#alert-status').fadeIn().delay(3000).fadeOut();
      });
    
      
    function openRegisterTab(){
        var win = window.open(BASE_URL+'/register', '_blank');
        if (win) {
            //Browser has allowed it to be opened
            win.focus();
        } else {
            //Browser has blocked it
            alert('Please allow popups for this website');
        }
    }
    
    // RESET DESIGN
    function resetButtonDidTouch() {
        objDesign.art = null;
        $('#objDesignArt').val('');
        $('#printObjDesignArt').val('');
        $('.art').empty().append('<img src="' + BASE_URL + '/storage/Frame_UX/decoraArt.jpg" alt="artcover" style="width: 100%; height: 100%;">');
    
        objDesign.frame =  null;
        $('#objDesignFrame').val('');
        $('#printObjDesignFrame').val('');
        $('.frame').empty().append('<img src="'+BASE_URL+'/storage/frames/GroupC_L822831_Classic_Biltmore_Black_-_Flat.png" alt="artcover" style="width: 100%; height: 100%;">');
    
        objDesign.liner = null;
        $('#objDesignLiner').val('');
        $('#printObjDesignLiner').val('');
        $('.liner').empty().append('<img src="'+BASE_URL+'/storage/liners/GroupBC_VWD07N_Natural.png" alt="artcover" category="" id="painted-liner" style="width: 100%; height: 100%;">');
        
        $.ajax({
            url: BASE_URL+"/resetDesign",
            method:"GET",
        });
    }
    
    // CREATING DESIGN

    // DESIGN CONTROLLER HOME PAGE
    objDesign = {
        art: null,
        frame: null,
        liner: null,
        user:false,
        observation: null,
        category: null,
        checkoutType: null
    };

    function sendRequest(type,category) {
        
        
        if (type == "art") {
            if(!category){
                category = "artCollections"
            }
    
            $('#collection-categories').empty()
            $('#collection-categories').append(
            `
            <div class="col-4 my-1"><button class="category-button w-100" id="artCollections" onclick="sendRequest('art','artCollections')">All galleries</button></div>
            <div class="col-4 my-1">
                <button class="category-button w-100" id="byArtists" onclick="sendRequest('art','Michael_Shaffer')">By Artists</button>
            </div>
            <div class="col-4 my-1">
                <button class="category-button w-100" id="upload" onclick="sendRequest('art','upload')">Upload your own art</button>
            </div>
            <div class="row-col-12 pl-3" >
                <p class="text-danger mt-2 mb-0">
                    There are slight variations on the formatting of the pictures. It will be adjusted according to the specified project.
                </p>
            </div>
            <div class="row col-12 justify-content-md-center mx-auto" id="galleries-list" style="display:none">
            <hr noshade="noshade" size="1" width="100%" />
                <div class="col-auto my-1">
                    <button class="category-button w-100" id="Michael_Shaffer" onclick="sendRequest('art', 'Michael_Shaffer')">Michael Shaffer</button>
                </div>
                <div class="col-auto my-1">
                    <button class="category-button w-100" id="Howard_Behrens" onclick="sendRequest('art','Howard_Behrens')">Howard Behrens</button>
                </div>
                <div class="col-auto my-1">
                    <button class="category-button w-100" id="Carlos_De_Soto" onclick="sendRequest('art','Carlos_De_Soto')">Carlos De Soto</button>
                </div>
            </div>
            `)
    
            $.ajax({
                url: BASE_URL+"/arts/"+category,
                method:"GET",
                
                success: function(artCollectionAndAutor) {
    
                    showItem(artCollectionAndAutor, "art", category)
    
                },
        
            });
    
        }
        else if (type == "liner") {
            if(!category){
                if (objDesign.category) {
                    category = objDesign.category
                    isExclusive = true
                }
                else {
                    $('#feedback-title').html("Frame required")
                    $('#feedback-message').html(`Please select a <a href="" onclick="sendRequest('frame');" data-dismiss="modal" class="alert-link"> FRAME</a> before chosing your liner.`)
                    $('#feedback-modal').modal('show');
                    return
                }
            }
            $('#collection-categories').empty()
            
                switch (category) {
                    case "A": $('#collection-categories').append(
                        `<div class="col-4"><button class="category-button w-100" id="group_A" onclick="sendRequest('liner','A')">Group A</button></div>
                        <div class="col-4"><button class="category-button w-100" id="group_B" onclick="sendRequest('liner','B')" disabled>Group B</button></div>
                        <div class="col-4"><button class="category-button w-100" id="group_C" onclick="sendRequest('liner','C')" disabled>Group C</button></div>
                        `)
                        
                        break;
                    case "B": $('#collection-categories').append(
                        `<div class="col-4"><button class="category-button w-100" id="group_A" onclick="sendRequest('liner','A')" disabled>Group A</button></div>
                        <div class="col-4"><button class="category-button w-100" id="group_B" onclick="sendRequest('liner','B')">Group B</button></div>
                        <div class="col-4"><button class="category-button w-100" id="group_C" onclick="sendRequest('liner','C')" disabled>Group C</button></div>`)
                        
                        break;
                    case "C": $('#collection-categories').append(
                        `<div class="col-4"><button class="category-button w-100" id="group_A" onclick="sendRequest('liner','A')" disabled>Group A</button></div>
                        <div class="col-4"><button class="category-button w-100" id="group_B" onclick="sendRequest('liner','B')" disabled>Group B</button></div>
                        <div class="col-4"><button class="category-button w-100" id="group_C" onclick="sendRequest('liner','C')">Group C</button></div>`)
                        
                        break;
                    default:
                        $('#collection-categories').append(
                        `<div class="col-4"><button class="category-button w-100" id="group_A" onclick="sendRequest('liner','A')" disabled>Group A</button></div>
                        <div class="col-4"><button class="category-button w-100" id="group_B" onclick="sendRequest('liner','B')" disabled>Group B</button></div>
                        <div class="col-4"><button class="category-button w-100" id="group_C" onclick="sendRequest('liner','C')">Group C</button></div>`)
                        
                        break;
                }
                $('#objectResult').append(`<div id="list-images" class="row col-md-12"></div>`);
            
            $.ajax({
                url: BASE_URL+"/liners/"+category,
                method:"GET",
                
                success: function(linerCollection) {
                    showItem(linerCollection, "liner", category);
                },
            
            });
    
    
        }
        else if (type == "frame")  {
            
            if(!category){
                category = "All"
            }
            $('#collection-categories').empty()
            $('#collection-categories').append(
                `<div class="col-md-2 m-1  p-1"><button class="category-button w-100" id="group_All" onclick="sendRequest('frame','All')">ALL</button></div>
                <div class="col-md-2 m-1 p-1"><button class="category-button w-100" id="group_A" onclick="sendRequest('frame','A')">Group A</button></div>
                <div class="col-md-2 m-1 p-1"><button class="category-button w-100" id="group_B" onclick="sendRequest('frame','B')">Group B</button></div>
                <div class="col-md-2 m-1 p-1"><button class="category-button w-100" id="group_C" onclick="sendRequest('frame','C')">Group C</button></div>
                <div class="col-md-2 m-1 p-1"><button class="category-button w-100" id="group_D" onclick="sendRequest('frame','D')">Group D</button></div>
                <div class="col-md-2 m-1  p-1"><button class="category-button w-100" id="group_E" onclick="sendRequest('frame','E')">Group E</button></div>`)
            $.ajax({
                url:BASE_URL+"/frames/"+category,
                method:"GET",
                success: function(frameCollection) {
    
                    $('#group_'+category).focus();
                    showItem(frameCollection, "frame", category)
    
                },
    
            });
    
        }
    }
    
        // COLLECTION OVERLAY CONSTRUCTOR 
        function showItem(collection, type, category) {
            iA = 0
            iB = 0
            iC = 0 
            iD = 0
            iE = 0
            dbIndicator = type+"_src"
            dbPreviewIndicator = type+"_src_preview"
            idIndicator = type+"_id"
            pnIndicator = type+"_pn"
            groupIndicator = type+"_group"
            descIndicator = type+"_description"
            typeUp = capitalizeFirst(type)
            $('#objectResult').empty()
        
            document.getElementById('objectResult').scrollTop = 0;
            
        
            if(type == "art"){
                if(collection.galleryName){
                    collectionArt = collection.artCollection
                    autor = collection.galleryName
                    if (collection.galleryName.id !== 4){
                        $('#objectResult').append(`<div class="row-col-12 mb-2">
                         <h3>`+autor.autor_name+` </h3>
                         <div class="col">
                            <img src="`+BASE_URL+`/storage/autors/`+autor.autor_src+`" width="150"  style="float:left; margin-right: 10px; ">
                         </div>
                         <div class="col">
                            <p>`+autor.autor_description+`</p>
                         </div>
                         </div>`);
                    } else {
                        $('#objectResult').append(`<div class="row-col-12 mb-2">
                         <h1>`+autor.autor_name+` </h1>
                         </div`);
                    }
                     showArtistsList();
                     $('#byArtists').focus();
                }
                if(category == "upload"){
        
                    $('#objectResult').append(`
                    <p style="color: red; font-style: italic">Please read carefully before uploading your image.</p>
                    <p style="color: #37367e; font-style: italic">The file to be uploaded cannot be larger than 5MB.  It will be deleted as soon as you leave the designer tool.The upload of your image does not provide right of usage and printing. It is only to provide a visual effect of the final product.You must have the authority to reproduce the photo/art, taking under consideration that the image file provided can be enlarged to the required file size.</p>
                    <p style="color: #37367e; font-style: italic">** File requirements and release form can be provided upon request **</p>
                    <div class=" offset-6 form-check">
                        <input class="form-check-input offset-10" type="checkbox" name="accept-upload" id="accept-upload">
                        <label class="form-check-label" for="accept-upload">Agree to terms & conditions.</label>
                    </div>
        
                    <div class="form-group row mb-5">
                        <form action="/save_custom_image" enctype="multipart/form-data" method="POST" id="imageSaver">
                            <label for="userImage" class="col-form-label" ><h5>Upload your image</h5></label>
                            <input type="file" id="userImage" name="userImage"  class="form-control-file" onchange="showImage(event)" disabled>
                        </form>
                    </div>
                    `);
                } else {
        
                    if (category == "artCollections") {
                        collectionArt = collection.artCollection
                        $('#objectResult').append(`
                        <p style="color: #37367e; font-style: italic">
                            AVI Solutions Plus offers a selection of multiple arts of varied styles. The arts are printed on archival canvas. The printing process is called Giclee printing.
                            A Custom Art can be provided to be reproduced with the proper usage rights and digital file size as  your own artwork, family portrait, company logo, among many other images
                        </p>`)
                    }
        
                    $('#objectResult').append(`<div id="list-images" class="row col-md-12"></div>`)
                     $('#collection-title').html(typeUp)
                    
                    $.each(collectionArt,function(i, object) {
                        column = 2
                        if (i % 3 == 0){
                            column = 1
                        } else if (i % 3 == 2){
                            column = 3
                        }
                        $('#list-images').append(`
                        <div class="custom-outline-dark px-2 mb-2 col-md-4" >
                            
                                <img width="100%"  `+type+`_id="`+object[idIndicator]+`" pn="`+object[pnIndicator]+`" class="img-`+type+` column-`+column+`" style="object-fit:contain" category="`+object[groupIndicator]+`" onclick="objectWasSelected($(this));" src="`+BASE_URL+`/storage/`+type+`s/`+object[dbIndicator]+`" />  
                            
                            <div class="row col-12 px-2 mx-auto">
                                <p class="mx-auto">`+object[pnIndicator]+`</p>
                            </div>
                        </div>`);
                    });
                }
                showOverlay();
                $('#'+category).focus();
            } else if(type == 'frame'){
                if(category == "All"){
                    $('#objectResult').append(
                        `<div class="row-col-12 p-3">
                            <p style="color: #37367e; font-style: italic">AVI Solutions Plus offers a variety of wood frames designed to enhance the room décor.  There are five groups of frames: Good (A), Better (B), Best (C), Superior (D) and Luxury (E) which include modern, contemporary, and classic frames selections. A liner must be chosen per group selection.  The frame is Custom made based on the TV make, model and dimensions.</p>
                        </div>`);   
            
                        $('#objectResult').append(`<div id="list-images" class="row col-md-12"></div>`);
                        $('#list-images').append(`<div class="row col-12"><h4>Group A </h4></div>`)
                        $.each(collection,function(i, object) {
                            
                            $('#collection-title').html(typeUp)
                            if (object[groupIndicator] == "A"){
                                column = 2
                                if (iA % 3 == 0){
                                    column = 1
                                } else if (iA % 3 == 2){
                                    column = 3
                                }
                                $('#list-images').append(`
                                <div class="custom-outline-dark px-1 col-md-4 h-100">
                                    <img width="100%" height="90%" `+type+`_id="`+object[idIndicator]+`" original="storage/`+type+`s/`+object[dbIndicator]+`" pn="`+object[pnIndicator]+`" class="img-`+type+` column-`+column+`" style="object-fit:contain" category="`+object[groupIndicator]+`" onclick="objectWasSelected($(this));" src="`+BASE_URL+`/storage/`+type+`s/`+object[dbPreviewIndicator]+`" />
                                    <div class="row px-2 col-12 mx-auto">
                                        `+object[pnIndicator]+`
                                    </div>
                                    <div class="row px-2 col-12 mx-auto">
                                        `+object[descIndicator]+`
                                    </div>
                                </div>`);
                                iA += 1
                            }
                        });
                        $('#list-images').append(`<hr noshade="noshade" size="1" width="100%">`)
                        $('#list-images').append(`<div class="row col-12"><h4>Group B </h4></div>`)
        
                        $.each(collection, function(i, object){
                            if (object[groupIndicator] == "B"){
                                column = 2
                                if (iB % 3 == 0){
                                    column = 1
                                } else if (iB % 3 == 2){
                                    column = 3
                                }
                                $('#list-images').append(`
                                <div class="custom-outline-dark px-1 col-md-4 h-100">
                                    <img width="100%" height="90%" `+type+`_id="`+object[idIndicator]+`" original="storage/`+type+`s/`+object[dbIndicator]+`" pn="`+object[pnIndicator]+`" class="img-`+type+` column-`+column+`" style="object-fit:contain" category="`+object[groupIndicator]+`" onclick="objectWasSelected($(this));" src="`+BASE_URL+`/storage/`+type+`s/`+object[dbPreviewIndicator]+`" />
                                    <div class="row px-2 col-12 mx-auto">
                                        `+object[pnIndicator]+`
                                    </div>
                                    <div class="row px-2 col-12 mx-auto">
                                        `+object[descIndicator]+`
                                    </div>
                                </div>`);
                                iB += 1
                            }
                        });
                        $('#list-images').append(`<hr noshade="noshade" size="1" width="100%">`)
                        $('#list-images').append(`<div class="row col-12"><h4>Group C </h4></div>`)
        
                        $.each(collection, function(i, object){
                            if (object[groupIndicator] == "C"){
                                column = 2
                                if (iC % 3 == 0){
                                    column = 1
                                } else if (iC % 3 == 2){
                                    column = 3
                                }
                                $('#list-images').append(`
                                <div class="custom-outline-dark px-1 col-md-4 h-100">
                                    <img width="100%" height="90%" `+type+`_id="`+object[idIndicator]+`" original="storage/`+type+`s/`+object[dbIndicator]+`" pn="`+object[pnIndicator]+`" class="img-`+type+` column-`+column+`" style="object-fit:contain" category="`+object[groupIndicator]+`" onclick="objectWasSelected($(this));" src="`+BASE_URL+`/storage/`+type+`s/`+object[dbPreviewIndicator]+`" />
                                    <div class="row px-2 col-12 mx-auto">
                                        `+object[pnIndicator]+`
                                    </div>
                                    <div class="row px-2 col-12 mx-auto">
                                        `+object[descIndicator]+`
                                    </div>
                                </div>`);
                                iC += 1
                            }
                        });
                        $('#list-images').append(`<hr noshade="noshade" size="1" width="100%">`)
                        $('#list-images').append(`<div class="row col-12"><h4>Group D </h4></div>`)
        
                        $.each(collection, function(i, object){
                            if (object[groupIndicator] == "D"){
                                column = 2
                                if (iD % 3 == 0){
                                    column = 1
                                } else if (iD % 3 == 2){
                                    column = 3
                                }
                                $('#list-images').append(`
                                <div class="custom-outline-dark px-1 col-md-4 h-100">
                                    <img width="100%" height="90%" `+type+`_id="`+object[idIndicator]+`" original="storage/`+type+`s/`+object[dbIndicator]+`" pn="`+object[pnIndicator]+`" class="img-`+type+` column-`+column+`" style="object-fit:contain" category="`+object[groupIndicator]+`" onclick="objectWasSelected($(this));" src="`+BASE_URL+`/storage/`+type+`s/`+object[dbPreviewIndicator]+`" />
                                    <div class="row px-2 col-12 mx-auto">
                                        `+object[pnIndicator]+`
                                    </div>
                                    <div class="row px-2 col-12 mx-auto">
                                        `+object[descIndicator]+`
                                    </div>
                                </div>`);
                                iD += 1 
                            }
                        });
                        $('#list-images').append(`<hr noshade="noshade" size="1" width="100%">`)
                        $('#list-images').append(`<div class="row col-12"><h4>Group E </h4></div>`)
                        
                        $.each(collection, function(i, object){
                            if (object[groupIndicator] == "E"){
                                column = 2
                                if (iE % 3 == 0){
                                    column = 1
                                } else if (iE % 3 == 2){
                                    column = 3
                                }
                                $('#list-images').append(`
                                <div class="custom-outline-dark px-1 col-md-4 h-100">
                                    <img width="100%" height="90%" `+type+`_id="`+object[idIndicator]+`" original="storage/`+type+`s/`+object[dbIndicator]+`" pn="`+object[pnIndicator]+`" class="img-`+type+` column-`+column+`" style="object-fit:contain" category="`+object[groupIndicator]+`" onclick="objectWasSelected($(this));" src="`+BASE_URL+`/storage/`+type+`s/`+object[dbPreviewIndicator]+`" />
                                    <div class="row px-2 col-12 mx-auto">
                                        `+object[pnIndicator]+`
                                    </div>
                                    <div class="row px-2 col-12 mx-auto">
                                        `+object[descIndicator]+`
                                    </div>
                                </div>`);
                                iE += 1
                            }
                        });
                } else {
                    $('#objectResult').append(`<div id="list-images" class="row col-md-12"></div>`);
        
                    $.each(collection,function(i, object) {
                        column = 2
                        if (i % 3 == 0){
                            column = 1
                        } else if (i % 3 == 2){
                            column = 3
                        }
            
                        $('#collection-title').html(typeUp)
                        $('#list-images').append(`
                        <div class="custom-outline-dark px-1 col-md-4 h-100">
                            <img width="100%" height="90%" `+type+`_id="`+object[idIndicator]+`" original="storage/`+type+`s/`+object[dbIndicator]+`" pn="`+object[pnIndicator]+`" class="img-`+type+` column-`+column+`" style="object-fit:contain" category="`+object[groupIndicator]+`" onclick="objectWasSelected($(this));" src="`+BASE_URL+`/storage/`+type+`s/`+object[dbPreviewIndicator]+`" />
                            <div class="row px-2 col-12 mx-auto">
                                `+object[pnIndicator]+`
                            </div>
                            <div class="row px-2 col-12 mx-auto">
                                `+object[descIndicator]+`
                            </div>
                            </div>`);
                    });
                }
                showOverlay();
                $('#group_'+category).focus();
            }
            else {
        
                $('#objectResult').append(`<div id="list-images" class="row col-md-12"></div>`);
        
                $.each(collection,function(i, object) {
                    column = 2
                    if (i % 3 == 0){
                        column = 1
                    } else if (i % 3 == 2){
                        column = 3
                    }
        
                    $('#collection-title').html(typeUp)
                    $('#list-images').append(`
                    <div class="custom-outline-dark px-1 col-md-4">
                        <img width="100%" `+type+`_id="`+object[idIndicator]+`" original="storage/`+type+`s/`+object[dbIndicator]+`" pn="`+object[pnIndicator]+`" class="img-`+type+` column-`+column+`" style="object-fit:contain" category="`+object[groupIndicator]+`" onclick="objectWasSelected($(this));" src="`+BASE_URL+`/storage/`+type+`s/`+object[dbPreviewIndicator]+`" />
                        <div class="row px-2 col-12 mx-auto">
                            `+object[pnIndicator]+`
                        </div>
                        <div class="row px-2 col-12 mx-auto">
                            `+object[descIndicator]+`
                        </div>
                     </div>`);
                });
                showOverlay();
                if(category=="D"||category=="E"){
                    $('#group_C').focus();    
                } else {
                    $('#group_'+category).focus();
                }
            }
        
        }
    
    
        function showOverlay() {
            $('.overlay').css('visibility','visible');
        }
        function hideOverlay() {
            $('#objectResult').empty()
            $('#collection-title').empty()
            $('.overlay').css('visibility','hidden');
        }
        window.onclick = function(event) {
            if (event.target == $("#overlay")[0]) {
                hideOverlay();
            }
        }
        function capitalizeFirst(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
        }
        function showArtistsList(){
            $('#galleries-list').css('display','flex');
        }
            // UPLOAD IMAGE SECTION
            function showImage(event) {
                objDesign.art = "custom"
                customImageURL = URL.createObjectURL(event.target.files[0])
                $('.art').empty().append('<img src="' + customImageURL+ '" alt="artcover" style="width: 100%; height: 100%;">');  
                $('#objDesignArt').val("custom");
                $('#printObjDesignArt').val("custom");
                
                var formData = new FormData(document.getElementById("imageSaver"));
                
            
                hideOverlay();
                    $.ajax({
                        url: "/save_custom_image",
                        type: "post",
                        dataType: "html",
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(imagePath) {
                            $('#objDesignImagePath').val(imagePath);
                            $('#printUserImagePath').val(imagePath);
                        },
                        error:function(e) {
                            $('.art').empty().append(`<img src="`+BASE_URL+`/storage/Frame_UX/decoraArt.jpg" id="art-display" width="100%" height="100%" alt="">`);
                            $('#feedback-title').html("Error uploading your file")
                            $('#feedback-message').html("Error uploading your image. Please read the terms and conditions and try again.")
                            // $('#feedback-message').html(e.statusText)
                            $('#feedback-message').attr('class','alert alert-danger');
                            $('#feedback-modal').modal('show');
                        }
                    })
            }    
            
            $( function() {
                $( document ).on( "change", "#accept-upload", function () {
                    if($(this).is(':checked')) {
                        $('#userImage').prop('disabled', false)
                    } else {
                        $('#userImage').prop('disabled', true)
                    }
                });
            });
            // END UPLOAD IMAGE SECTION
        // END COLLECTION OVERLAY CONSTRUCTOR
    
        // SELECTION OF ITEM
        function objectWasSelected(objSelected) {
    
            hideOverlay();
        
            if (objSelected.attr('class').includes("img-art")) {
        
                objDesign.art = objSelected.attr('art_id');
                $('#objDesignArt').val(objDesign.art);
                $('#printObjDesignArt').val(objDesign.art);
                $('#printUserImagePath').val('');
        
                $('.art').empty().append('<img src="' + objSelected.attr('src') + '" alt="artcover" style="width: 100%; height: 100%;">');
        
            }
            else if (objSelected.attr('class').includes("img-liner")){
        
                sessionStorage.setItem("liner_src", objSelected.attr('original'))
                sessionStorage.setItem("liner_id", objSelected.attr('liner_id'))
        
                objDesign.liner = objSelected.attr('liner_id');
                $('#objDesignLiner').val(objDesign.liner);
                $('#printObjDesignLiner').val(objDesign.liner);
                objDesign.category = objSelected.attr('category');
        
                $('.liner').empty().append('<img src="'+BASE_URL+'/' + objSelected.attr('original') + '" alt="artcover" category="'+objSelected.attr('category')+'" id="painted-liner" style="width: 100%; height: 100%;">');
                
            }
            else if (objSelected.attr('class').includes("img-frame")){
        
                if (objDesign.liner){
                    if ($('#painted-liner').attr('category') == "A" && objSelected.attr('category') !== "A" || ($('#painted-liner').attr('category') !== "A" && objSelected.attr('category') == "A")) {
                        $('.liner').empty();
                        objDesign.liner = objSelected.attr('liner_id');
                        $('#objDesignLiner').val('');
                        $('#printObjDesignLiner').val('');
            
                        $('#feedback-title').html("Category was changed")
                        $('#feedback-message').html(`You change the frame category. Please select a <a href="" onclick="sendRequest('liner');" data-dismiss="modal" class="alert-link"> LINER</a> again.`)
                        $('#feedback-modal').modal('show');
                    } 
                }
        
                objDesign.frame = objSelected.attr('frame_id');
                $('#objDesignFrame').val(objDesign.frame);
                $('#printObjDesignFrame').val(objDesign.frame);
                objDesign.category = objSelected.attr('category');
        
                $('.frame').empty().append('<img src="'+BASE_URL+'/' + objSelected.attr('original') + '" alt="artcover" style="width: 100%; height: 100%;">');
                
            }
        
        }
        // END SELECTION ITEM
    // END CREATING DESIGN
    
    // CHECKOUT SECTION
    
    function finishDesign(checkoutType) {
    
        if(($('#objDesignArt').val() && $('#objDesignFrame').val() && $('#objDesignLiner').val()) || checkoutType == "sample") {
    
        objDesign.checkoutType = checkoutType
        
        $.get(BASE_URL+"/get_session", {
        }, function(user){
            if (user) {
                objDesign.user = user.ID;
                $('#userEmail').val(user.user_email);
                
    
                confirmUser();
                
            }
            else {
                $("#login-modal").modal('show');
            }
        }
        );  
    } 
    else {
        
        $('#feedback-title').html("Nothing is selected")
        $('#feedback-message').html(`Please select a <a href="" onclick="sendRequest('frame');" data-dismiss="modal" class="alert-link"> FRAME</a>, a <a href="" onclick="sendRequest('liner');" data-dismiss="modal" class="alert-link"> LINER</a> and an <a href="" onclick="sendRequest('art');" data-dismiss="modal" class="alert-link"> ART</a> from the list.`)
        $('#feedback-modal').modal('show');
        
    }
    
    }
    
    function confirmUser(userId) {
    
        if (objDesign.user == false) {
            if(userId){
                objDesign.user = userId
                if(objDesign.checkoutType == "quote"){
                    $("#checkout-modal").modal('show');
                } else if (objDesign.checkoutType == "order"){
                    $("#checkout-title").html('Place Order')
                    $("#checkoutButton").attr('formaction',BASE_URL+'/order_page')
                    $("#checkout-modal").modal('show');
                } else if(objDesign.checkoutType == "sample"){
                    $("#sample-modal").modal('show');            }
            } else {
    
                $.get(BASE_URL+"/get_session", {
                }, function(user){
                    if (user) {
                        objDesign.user = user.ID;
                        if(objDesign.checkoutType == "quote"){
                            $("#checkout-modal").modal('show');
                        } else if (objDesign.checkoutType == "order"){
                            $("#checkout-title").html('Place Order')
                            $("#checkoutButton").attr('formaction',BASE_URL+'/order_page')
                            $("#checkout-modal").modal('show');
                        } else if(objDesign.checkoutType == "sample"){
                            $("#sample-modal").modal('show');                    }
    
                    }
                    else {
                        $("#login-modal").modal('show');
                    }
                }
                );
    
            }
        } else {
            if(objDesign.checkoutType == "quote"){
                $("#checkout-modal").modal('show');
            } else if(objDesign.checkoutType == "order"){
                $("#checkout-title").html('Place Order')
                $("#checkoutButton").attr('formaction',BASE_URL+'/order_page')
                $("#checkout-modal").modal('show');
            } else if(objDesign.checkoutType == "sample"){
                $("#sample-modal").modal('show');
            }
            
        }
    
    }
    
    function loginButtonDidTouch () {
        $.ajax({
            url: BASE_URL+"/login",
            method: "POST",
            data:{
                _token: $('input[name="_token"]').val(),
                user_email: $("#email").val(),
                password: $("#password").val(),
                returnId: true
            },
            dataType: "json",
            success: function(user) {
                $('#login-modal').modal('hide');
                $('#userEmail').val(user.user_email);
                confirmUser(user.ID)
    
            },
            error: function(e) {
                $('#password').val("");
                alert(e.responseJSON.message);
            }
        })
    }
    // END CHECKOUT SECTION