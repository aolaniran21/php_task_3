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
    })},10000000000)
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
    })},10000000000)
setInterval(function(){
    $.ajax({
        url: ajaxURLPath + 'v1/api/count',
        dataType: 'json',
        type: "GET",
        success: function (res) 
        {  
            // $('#count').text(res['temp_c'])
            console.log(res); 
        } 
    })},1000000000)


    
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

    $('div.card').click((e)=>{
        // var id = e.target.id;
        var id = this.id;
        // var id = $(this).attr('id');
        console.log(id);
        $.ajax({
            url: ajaxURLPath + 'v1/api/analytics',
            // dataType: 'json',
            type: "POST",
            data: {
                click : 1,
                type: id,
                browser: jQuery.browser
            },
            success: function (res) 
            {  
                console.log(res); 
            } 
        })
    })

    

    $('#bill').click((e)=>{
        
        var change = moneyChanger(parseInt($('#count').val()))
        console.log(change)
        Object.keys(change).forEach(key => {
            // console.log(key, obj[key]);
          
            $('#show').append('<h3>'+key+ ' * ' + change[key] +'</h3>')

            
         }) 

    })
    function moneyChanger(money){
        bills = [0.01, 0.05, 5, 20]
        if (bills[0] < bills[1]) bills.reverse();
        const change = {}
        bills.forEach(b => {
           change[b] = Math.floor(money/b)
           money = money - (b*change[b])
        }) 
        return change
    }
    
    
    // const change = moneyChanger(2507.345)

    $('#upload').on('click', function() {
        var file_data = $('#img').prop('files')[0];   
        var form_data = new FormData();                  
        form_data.append('file', file_data);
        alert(form_data);                             
        $.ajax({
            url: ajaxURLPath + 'v1/api/upload', // <-- point to server-side PHP script 
            dataType: 'text',  // <-- what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,                         
            type: 'post',
            success: function(response){
                alert(file_data[0]); // <-- display response from the PHP script, if any
            }
         });
    });

    var map = new ol.Map({
        layers: [
          new ol.layer.Tile({
            source: new ol.source.OSM()
          })
        ],
        target: 'map',
        controls: ol.control.defaults({
          attributionOptions: /** @type {olx.control.AttributionOptions} */ ({
            collapsible: false
          })
        }),
        view: new ol.View({
          center: [0, 0],
          zoom: 2
        })
      });

      $.ajax({
        url: ajaxURLPath + 'v1/api/airport',
        dataType: 'json',
        type: "GET",
        success: function (res) 
        {  
            // $('#count').text(res['temp_c'])
            console.log(res); 
            $('#dist').append('<h3>'+ getDistanceFromLatLonInKm(lon, lat,65.8252,144.0657) +'</h3>')
        } 
    })
      $('#airport select').val()
      $('#dist').append('<h3>'+ getDistanceFromLatLonInKm(lon, lat,65.8252,144.0657) +'</h3>')
      function getDistanceFromLatLonInKm(lat1,lon1,lat2,lon2) {
        var R = 6371; // Radius of the earth in km
        var dLat = deg2rad(lat2-lat1);  // deg2rad below
        var dLon = deg2rad(lon2-lon1); 
        var a = 
          Math.sin(dLat/2) * Math.sin(dLat/2) +
          Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) * 
          Math.sin(dLon/2) * Math.sin(dLon/2)
          ; 
        var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
        var d = R * c; // Distance in km
        return d;
      }
      
      function deg2rad(deg) {
        return deg * (Math.PI/180)
      }