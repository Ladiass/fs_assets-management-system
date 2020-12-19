
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
        },function(data,status){
            console.log(data)
            if(data != 0){
                e.classList.remove("btn-success");
                e.classList.add("btn-warning");
                e.innerHTML = "unActive";
            }else{
                e.classList.remove("btn-warning");
                e.classList.add("btn-success");
                e.innerHTML = "Active";
            }

        });
    }
    if(e.id == "brr-btn"){
        let id = e.getAttribute("value");
        // location.href = "?id=" ;
        $("#form-page").load("/views/borrow.php",{
            id:id
        });
        ev.preventDefault();
    }
})
