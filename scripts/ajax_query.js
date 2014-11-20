var search_system_querry = {
    doSearch : function(search_system_form){
        var search_system_results = document.getElementById("search_system_results");
        search_system_results.style.display = (search_system_form.search_system_value.value!="")? "block" : "none";
        var querySearch = "value="+search_system_form.search_system_value.value;
        var xmlhttpSearch = new ajaxRequest(
        "includes/search_system.php",
        function()
        {
            var searchReady = xmlhttpSearch.req;
            if (searchReady.readyState==4)
            {
                search_sytem_results.innerHTML = (searchReady.status == 200)
                ? searchReady.responseText : "ERROR";
            }
        },
        "POST",
        querySearch,
        ["Content-Type","application/x-www-form-urlencoded"]
        );
        xmlhttpSearch.doRequest();
    }
}