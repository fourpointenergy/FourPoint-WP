jQuery(document).ready(function($){window.dataLayer=window.dataLayer||[];var t,e={},a,l="",n="";a=window.location.pathname.split("/"),l=a[1],n=a[2],""!=l&&dataLayer.push({event:"page load",main_menu:l,sub_menu:n}),$("body").on("click","a, input.button",function(a){t=$(this),e={},t.hasClass("logo")?e={event:"exit link",label:t.attr("href")}:"/faqs/"==window.location.pathname?e={event:"FAQ",question:t.closest("ul").prev("h2").text(),label:t.text()}:t.hasClass("slider-button")?e={event:"button click",label:t.closest(".hero-slider-copy").find("h1").text()}:$(a.target).is("input")?e={event:"submit form",label:"contact us"}:t.hasClass("button")?e={event:"button click",label:t.text()}:t.hasClass("social-link")?e={event:"social link",label:t.find("img").attr("alt")}:t.attr("href").indexOf("mailto:")>=0?e={event:"email",label:t.attr("title")||t.attr("href").replace("mailto:","")}:t.attr("href").indexOf(".pdf")>=0&&(e={event:"download",label:t.attr("href").split("/").pop()}),$.isEmptyObject(e)||dataLayer.push(e)})});