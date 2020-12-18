
$("#add-btn").click(function () { 
    $("#form-page").load("/views/add_item.php");
});

document.addEventListener("click",(ev)=>{
    let e =ev.target
    if(e.id == "edit_btn"){
        let id = e.getAttribute("value");
        $.post("/views/edit_item.php",{
        id : id
        },function (data , status){
        $("#form-page").html(data);
    });
    }
    if(e.id == "active_btn"){
        let id = e.getAttribute("value");
        $.post("/controllers/item.act.php",{
            id : id
        });
    }
    if(e.id == "brr-btn"){
        let id = e.getAttribute("value");
        $.post("/controllers/item.brr.php",{
            id : id
        });
    }
})
