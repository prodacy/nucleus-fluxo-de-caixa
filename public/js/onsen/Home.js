var Home = {

	obj_chartPie1 : null,

	init : function(){
		console.log('init home');
		Home.atualiza();

		User.auth();

	},

	atualiza : function(callback=null){

		Home.atualizaDados();
		

	},

	pullHook : function(done){

		Home.atualiza(done);

	},

	chartPie1 : function(){


		if(Home.obj_chartPie1 instanceof Chart && !Home.obj_chartPie1.attached){
			Home.obj_chartPie1.destroy();
			Home.obj_chartPie1 = null;
		}

		// cria chart
		if(!Home.obj_chartPie1){
			$(document).ready(function(){
				var ctx = document.getElementById('chart_1');
				data = {
					labels: [
					'carregando...',
					],
					datasets: [{
						data: [1],
						backgroundColor: Config.colorsPendencia,
						hoverOffset: 4
					}]
				};
				Home.obj_chartPie1 = new Chart(ctx, {
					type: 'doughnut',
					data: data,
					options: {
						// scales: {
						// 	yAxes: {
						// 		beginAtZero: true,
						// 		gridLines: {
						// 			drawBorder: false,
						// 			 display: false,
						// 		},
						// 	},
						// 	ticks: {
						// 		display: false
						// 	}
						// },
						plugins: {
							legend:{
								position: 'bottom',
								// maxHeight: 50,
								labels: {
									font: {
										size: 11,
									},
									boxWidth: 11,
									boxHeight: 11,
									padding: 4,
									// usePointStyle: true,
								}
							},

						}
					}
				});

			});
		}

	},

	atualizaDados : function(){


		// Recuperar dados via API e atualizar dados
		// not_implemented

		a_receber = ( rand(0,2000) + (rand(0,99)/100) );
		a_pagar = ( rand(0,2000) + (rand(0,99)/100) );

		$('.conta-mes .receber').html( moeda(a_receber) );
		$('.conta-mes .pagar').html( moeda(a_pagar) );

		Home.chartPie1();

		setTimeout(function(){

			var data = Home.obj_chartPie1.data;
			if (data.datasets.length > 0) {

				data.labels = ['À Receber','À Pagar']
				data.datasets[0].data = [a_receber,a_pagar];

				Home.obj_chartPie1.update();
			}

		},1500)


	},

	inativo : function () {
		onsAlert('Funcionalidade não implementada');
	}


}