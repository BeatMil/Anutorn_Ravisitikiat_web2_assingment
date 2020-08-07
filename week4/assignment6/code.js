$("#width").append($(window).width());
$("#height").append($(window).height());


document.getElementById("bg_button").onclick = function() {change_bg()};
document.getElementById("append").onclick = function() {append_text()};

mouse_ele = document.getElementById("show_event");

mouse_ele.onclick = function() {m_on_click()};
function m_on_click() //mouse on click
{
    mouse_ele.innerHTML = "onclick";
}
mouse_ele.ondblclick = function() {m_on_dbclick()};
function m_on_dbclick() //mouse on click
{
    mouse_ele.innerHTML = "oncdblick";
}
mouse_ele.onmouseup = function() {m_on_mouse_up()};
function m_on_mouse_up() //mouse on click
{
    mouse_ele.innerHTML = "on_mouse_up";
}
mouse_ele.onmousedown = function() {m_on_mouse_down()};
function m_on_mouse_down() //mouse on click
{
    mouse_ele.innerHTML = "on_mouse_down";
}
mouse_ele.onmouseover = function() {m_on_mouse_over()};
function m_on_mouse_over() //mouse on click
{
    mouse_ele.innerHTML = "on_mouse_over";
}
mouse_ele.onmouseout = function() {m_on_mouse_out()};
function m_on_mouse_out() //mouse on click
{
    mouse_ele.innerHTML = "show event here";
}


// show_hide button
$("button#show_hide").click(function()
{
    butt_ele = document.getElementById("show_hide");
    $("p#p_change").toggle(); // toggle show and hide
    
    // toggle text "show" "hide"
    if (butt_ele.innerHTML == "hide")
    {
        butt_ele.innerHTML = "show";
    }
    else
    {
        butt_ele.innerHTML = "hide";
    }
});


function change_bg()
{
    the_p_ele = document.getElementById("p_change");
    if (the_p_ele.style.backgroundColor == "red")
    {
        the_p_ele.style.backgroundColor = "blue";
    }
    else
    {
        the_p_ele.style.backgroundColor = "red";
    }
}


function append_text()
{
    document.getElementById("p_change").innerHTML += "Hello ITE220";

}



