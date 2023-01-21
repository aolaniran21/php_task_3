var ajaxURLPath = document.location.origin + '/';
setInterval(function(){
    $.ajax({
        url: ajaxURLPath + 'v1/api/time',
        dataType: 'json',
        type: "GET",
        success: function (res) { 
            $('#ldn').text(res['london'])
            $('#est').text(res['est'])
            $('#nig').text(res['nigeria'])
            $('#pak').text(res['pakistan'])
            // console.log(res);
        } 
    })},1000)
setInterval(function(){
    $.ajax({
        url: ajaxURLPath + 'v1/api/weather',
        dataType: 'json',
        type: "GET",
        success: function (res) 
        {  
            $('#weather').attr('src', res['condition']['icon'])
            $('#temp').text(res['temp_c'])
            // console.log(res); 
        } 
    })},1000)


    
    // $(".get_airports").select2({
    //     minimumInputLength: 1, 
    //     ajax: {
    //         url: ajaxURLPath + 'v1/api/airports',
    //         dataType: 'json',
    //         type: "GET",
    //         quietMillis: 50,
    //         minimumResultsForSearch: 50,
    //         data: function (term) 
    //         {
    //             return term;
    //         },
    //         results:  function (data) 
    //         {  
    //             return  { results: data  }; 
    //         } 
    //     }
    // }); 

    $('.card').click(()=>{
        console.log('well');
        $.ajax({
            url: ajaxURLPath + 'v1/api/analytics',
            // dataType: 'json',
            type: "POST",
            data: {
                click : 1,
                browser: jQuery.browser
            },
            success: function (res) 
            {  
                console.log(res); 
            } 
        })
    })
