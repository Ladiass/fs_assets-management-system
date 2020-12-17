
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
        $(".btn-bar").toggleClass("v-hidden");
    });

    $('#bar-close,.this-nav>div>ul>li>a').click((e)=>{
        $("#wrapper").toggleClass("toggled");
        setTimeout(()=>{
            $(".btn-bar").toggleClass("v-hidden");
        },300);
    })

    $("#reg-btn").click(()=>{
        $("#form-page").load("/views/forms/register.php");
    })

    $("#lgn-btn").click(()=>{
        $("#form-page").load("/views/forms/login.php");
    })
    