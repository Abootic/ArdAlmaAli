<footer class="tm-footer row tm-mt-small" >
            <div class="col-12 font-weight-light">
                <p class="text-center text-white mb-0 px-4 small"> Alaber  
                    Copyright &copy; <b>2020</b> All rights reserved. 
                   
                    Design: <a rel="nofollow noopener" href="#" class="tm-footer-link">Alnajm</a>
                </p>
            </div>
        </footer>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/moment.min.js"></script>
    <!-- https://momentjs.com/ -->
    <script src="js/Chart.min.js"></script>
    <!-- http://www.chartjs.org/docs/latest/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script src="js/tooplate-scripts.js"></script>
	
	<script>
function deleteChk(Id){
		
	var chkDel = window.confirm("هل تريد فعلا حذف هذا العنصر؟");
	if(chkDel === true){
        var encId=document.getElementById(Id).innerHTML;
	    var page='?action=delete&id='+encId;
		window.location=page;
	}
};

</script>
	
    <script>
        Chart.defaults.global.defaultFontColor = 'white';
        let ctxLine,
            ctxBar,
            ctxPie,
            optionsLine,
            optionsBar,
            optionsPie,
            configLine,
            configBar,
            configPie,
            lineChart;
        barChart, pieChart;
        // DOM is ready
        $(function () {
            drawLineChart(); // Line Chart
            drawBarChart(); // Bar Chart
            drawPieChart(); // Pie Chart

            $(window).resize(function () {
                updateLineChart();
                updateBarChart();                
            });
        })
    </script>
</body>

</html>