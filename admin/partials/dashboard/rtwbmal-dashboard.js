(function( $ ) {
	'use strict';

	$(function() {   
    $(".rtw_close_popup").on("click",function(){
        $(".rtw_popup").hide();
    });

        $(document).on('click', '.rtwbmal_dashboard_tabs ul li a', function(){
            var data_content = $(this).attr('data-tabs');
            $(document).find('.rtwbmal_dashboard_tabs ul li a').removeClass('active');
            $(this).addClass('active');

            $(document).find('.rtwbmal_dashboard_tabs-content').each(function(){
                if( $(this).attr('data-tabs')== data_content)
                {
                    $(this).addClass('show');
                }else{
                    $(this).removeClass('show');
                }
            });
        });

        $(document).find('.rtwbmal_progress_bar').each(function(){
            var width = $(this).text();
            $(this).parent().find('.rtwbmal_dashboard_progress_inner_bar').css('width', width);
        });
        var dates = $(document).find('#rtwbmal_this_week_apps').data('dates');
        var apps = $(document).find('#rtwbmal_this_week_apps').data('apps');
        console.log(apps);
        new Chart(document.getElementById("rtwbmal_this_week_apps"), {
            type: 'bar',
            barThickness: 1,
            data: {
              labels: [dates[0], dates[1], dates[2], dates[3], dates[4], dates[5], dates[6]],
              datasets: [
                {
                  label: "Appointments",
                  backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#b9b737","#ea8484"],
                  data: [ apps[0] , apps[1],apps[2], apps[3], apps[4], apps[5], apps[6] ]
                }
              ]
            },
            options: {
              scales:
              {
                  yAxes: [{
                      display: false
                  }],
                  xAxes: [{
                    barPercentage: 0.4
                  }]
              }
            }
        });
        // doughnut
        var rtw_old = $(document).find('#rtwbmal_custmoers_chart').data('old');
        var rtw_new = $(document).find('#rtwbmal_custmoers_chart').data('new');
        new Chart(document.getElementById("rtwbmal_custmoers_chart"), {
            type: 'doughnut',
            data: {
              labels: ['New', 'Returning'],
              datasets: [
                {
                  label: "Appointments",
                  backgroundColor: ["#a8ac26","#1fa22d"],
                  data: [ rtw_new, rtw_old ]
                }
              ]
            }
        });

        var sevdays = $('#rtwbmal_total_revenue').data('sevdays');
        console.log(sevdays);
        new Chart(document.getElementById("rtwbmal_total_revenue"), {
          type: 'bar',
            barThickness: 1,
            data: {
              labels: [sevdays[0]['date'], sevdays[1]['date'], sevdays[2]['date'], sevdays[3]['date'], sevdays[4]['date'], sevdays[5]['date'], sevdays[6]['date'] ],
              datasets: [
                {
                  label: "Revenue",
                  backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#b9b737","#ea8484"],
                  data: [ sevdays[0]['paid'] , sevdays[1]['paid'],sevdays[2]['paid'], sevdays[3]['paid'], sevdays[4]['paid'], sevdays[5]['paid'], sevdays[6]['paid'] ]
                }
              ]
            },
            options: {
              scales:
              {
                  yAxes: [{
                      display: false
                  }],
                  xAxes: [{
                    barPercentage: 0.4
                  }]
              }
            }
      });
    });

})( jQuery );
