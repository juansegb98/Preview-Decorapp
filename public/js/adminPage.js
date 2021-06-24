var tableArt = false
var tableLiner = false
var tableFrame = false

function tableMaker(type) {
    if(type == "arts"){
        if (!tableArt){
            $.ajax({
                url: BASE_URL+"/"+type,
                method: "GET",
                success: function(artCollection){
                    tableConstructor(artCollection, type)
                    tableArt = true
                }
        
            });
        } else {
            $("#table-"+type).empty();
            tableArt = false
        }
    } else if (type == "liners") {
        if (!tableLiner) {
            $.ajax({
                url: BASE_URL+"/"+type,
                method: "GET",
                success: function(linerCollection){
                    tableConstructor(linerCollection, type)
                    tableLiner = true
                }
        
            });
        } else {
            $("#table-"+type).empty();
            tableLiner = false
        }
    } else if (type == "frames") {
        if (!tableFrame){
            $.ajax({
                url: BASE_URL+"/"+type,
                method: "GET",
                success: function(frameCollection){
                    tableConstructor(frameCollection, type)
                    tableFrame = true
                }
        
            });
        } else {
            $("#table-"+type).empty();
            tableFrame = false
        }
    }
    else {
        return
    }
}

function tableConstructor(collection, type){
    tableId = "table-"+type
    const typeSingular = type.slice(0,-1)
    const item_src = typeSingular+"_src"
    const item_id = typeSingular+"_id"
    const item_pn = typeSingular+"_pn"

    $("#"+tableId).empty();
    $.each(collection, function(i, item){
        $('#'+tableId).append(`<div id="`+tableId+`-content"></div>`);
        $('#'+tableId+'-content').attr("style","max-height: 500px; overflow-y: auto;overflow-x: hidden;");
        $("#"+tableId+"-content").append(`
        <div `+typeSingular+`_id="`+item[item_id]+`" class="row pr-4 border p-1 my-1 rounded img-`+typeSingular+`" >
            <div class="col-4">
                <img width=100 pn="`+item[item_pn]+`" src="`+BASE_URL+`/storage/`+type+`/`+item[item_src]+`" />
            </div>
            
            <div class="col align-self-center my-auto">
                id: `+item[item_id]+`
            </div>
            <div class="col-align-self-end my-auto">
                <a class="btn btn-outline-info" type="button" href="`+BASE_URL+`/`+type+`/`+item[item_id]+`/edit">Edit</a>
                <a class="btn btn-outline-danger" type="button" onclick="confirmDelete($(this))" item_id="`+item[item_id]+`" item_type="`+type+`" >Delete</a>
            </div>
        </div>`);
    });
    $("#"+tableId).append('<div class="row  my-2"><div class="col align-self-end"><a class="btn btn-outline-success col-12" type="button" href="'+BASE_URL+'/'+type+'/create">+</a></div></div> ');

}

function confirmDelete(itemSelected){
    itemId = itemSelected.attr('item_id');
    itemType = itemSelected.attr('item_type');
    switch (itemType) {
        case "liners":
            $('#deleteConfirmation').attr("action","{{url('/liners')}}"+"/"+itemId);    
            break;
        case "arts":
            $('#deleteConfirmation').attr("action","{{url('/arts/')}}"+"/"+itemId);
            break;
        case "frames":
            $('#deleteConfirmation').attr("action","{{url('/frames/')}}"+"/"+itemId); //"{{ route('frames.destroy', "+itemId+") }}"
            break;
    }
    $('#deleteModal').modal('show');
}