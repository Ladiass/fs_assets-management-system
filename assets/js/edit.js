$("#bar-close-form").click(()=>{
    setTimeout(()=>{
        $("#form-page .form").remove();
    },100)
});
$("#image-input").change((ev)=>{
    // ev.preventDefault();
    let	newData = new FormData();
    let files = $("#image-input")[0].files[0];
    newData.append("image",files);

    $.ajax({
        url:"/controllers/img_change.php",
        type : "POST",
        data : newData,
        contentType:false,
        processData:false,
        success:function(response){
            if(response != 0){
                // ev.preventDefault();
                $("#cImage").attr("src",response);
                $("#cImage").show();
                $(".img__text").hide();
            }else{
                alert("File not uploaded");
            }
        }
    })
});