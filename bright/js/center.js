var width = document.querySelector("html").offsetWidth;
if(width >=988)
{
        //var url = window.location.href.substr(34)
        var url = window.location.href.substr(24,4)
	var html = window.location.href.substr(-4,4)
        if(url.length != 0 && html == "html")
        {
                try
                {
                        var val = Number(url);
                        if (!isNaN(val))
                        {
                                var obj = document.getElementById("secondary");
                                obj.style.cssText = "display:none;";
                                
                                var post_obj = document.getElementsByClassName("post")[0]
                                post_obj.style.width='146%';
									
				var post_title_obj = document.getElementsByClassName("post-title")[0]
				post_title_obj.style.textAlign="center";

				var post_meta_obj = document.getElementsByClassName("post-meta")[0]
				post_meta_obj.style.textAlign="center";
                        }
                        else
                        {
                                var obj = document.getElementById("secondary");
                                obj.style.cssText = "display: unset;";
                                
                                var post_obj = document.getElementsByClassName("post")[0]
                                post_obj.style.width='107%';

				var post_title_obj = document.getElementsByClassName("post-title")[0]
				post_title_obj.style.textAlign="unset";
									
				var post_meta_obj = document.getElementsByClassName("post-meta")[0]
				post_meta_obj.style.textAlign="unset";
                        }
                }catch(exception)
                {
                }
        }
}