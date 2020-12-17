
$("#add-btn").click(function () { 
    $("#form-page").load("/views/add_item.php");
});



// $("#edit_btn").click((e)=>{
//     let id = $("#edit_btn").attr("value");
//     $.post("/views/edit_item.php",{
//         id : id
//     },function (data , status){
//         // console.log(status)
//         $("#form-page").html(data);
//     });
// })

document.addEventListener("click",(ev)=>{
    let e =ev.target
    // console.log(e)
    if(e.id == "edit_btn"){
        // console.log("11")
        let id = e.getAttribute("value");
        $.post("/views/edit_item.php",{
        id : id
        },function (data , status){
        // console.log(status)
        $("#form-page").html(data);
    });
    }
})
