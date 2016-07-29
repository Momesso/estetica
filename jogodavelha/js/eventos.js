//Mostra a div depois de clicar em iniciar
		window.onload =	function() { document.getElementById('game').style.visibility = 'hidden' };
		
		function Jogador(nome, forma) {
			this.nome = nome;
			this.forma = forma;
		}
		
		var jogador1, jogador2;
		//Jogador da rodada
		var jogadorAtual;
		var formas = ['X', 'O'];
		var index = null;

		/*
			0 1 2
			3 4 5
			6 7 8
		*/
		var tabuleiro = new Array(9);


		initGame = function() {
			var nomeJogador1 = document.getElementById('jogador1').value;
			var nomeJogador2 = document.getElementById('jogador2').value;
			jogador1 = new Jogador(nomeJogador1, 0); //X
			jogador2 = new Jogador(nomeJogador2, 1); //O

			jogadorAtual = jogador1;
			setLabelJogadorAtual();

			//APOS DEFINIÇÃO DE JOGADORES, EXIBE A DIV E INICIA JOGO
			document.getElementById('game').style.visibility = 'visible';
			
		}

		/*Resetar*/
		reset = function() { window.location.reload(); }
		
		/*Mostra de qual jogador é a vez*/
		setLabelJogadorAtual = function() {
			document.getElementById('jogadorAtual').innerHTML = 'Jogador atual:  ' + jogadorAtual.nome;
		}

		/*Verifica se o tabuleiro está totalemnte preenchido, se estiver, significa que ninguém venceu*/
		tabuleiroIsFilled = function() {
			var preenchidos = 0;
				for(var i = 0; i < tabuleiro.length; i++)
					if(tabuleiro[i]	!= undefined) 
						preenchidos++;
				return preenchidos == tabuleiro.length;
		}

		/*Ve se alguem ganhou (LINHA)*/
		allElementsInSomeLine = function() {
			for( var i = 0; i < 7; i += 3) {
				if ( tabuleiro[i] == 'X' && tabuleiro[i + 1] == 'X' && tabuleiro[i + 2] == 'X' ) { 
					alert (jogador1.nome + ' Ganhou!!!');
					reset();
				}
				if ( tabuleiro[i] == 'O' && tabuleiro[i + 1] == 'O' && tabuleiro[i + 2] == 'O' ) {
					alert (jogador2.nome + ' Ganhou!!!');
					reset();
				}
			}
		}

		/*Ve se alguem ganhou (coluna)*/
		allElementsInSomeColumn = function() {
			for( var i = 0; i < 3; i++) {
				if ( tabuleiro[i] == 'X' && tabuleiro[i + 3] == 'X' && tabuleiro[i + 6] == 'X' ) { 
					alert (jogador1.nome + ' Ganhou!!!');
					reset();
				}
				if ( tabuleiro[i] == 'O' && tabuleiro[i + 3] == 'O' && tabuleiro[i + 6] == 'O' ) {
					alert (jogador2.nome + ' Ganhou!!!');
					reset();
				}
			}

		}

		/*Ve se alguem ganhou (DIagonal)*/
		allElementsInSomeDiagonal = function() {
			if ( (tabuleiro[0] == 'X' && tabuleiro[4] == 'X' && tabuleiro[8] == 'X') ||
	 			 (tabuleiro[2] == 'X' && tabuleiro[4] == 'X' && tabuleiro[6] == 'X')) {
					alert (jogador1.nome + ' Ganhou!!!');
				reset();
			} else if ( (tabuleiro[0] == 'O' && tabuleiro[4] == 'O' && tabuleiro[8] == 'O') ||
					    (tabuleiro[2] == 'O' && tabuleiro[4] == 'O' && tabuleiro[6] == 'O') ) {
					alert (jogador2.nome + ' Ganhou!!!');
				reset();
			} 
		}

		/*Marca casa escolhida*/
		setOnCeil = function(cel, pos) { 
				if(tabuleiro[pos] == undefined) {
					cel.innerHTML = formas[jogadorAtual.forma];
					tabuleiro[pos] = formas[jogadorAtual.forma];

					//define o jogador da rodada
					(jogadorAtual.forma == 0) ? jogadorAtual = jogador2 : jogadorAtual = jogador1;
					setLabelJogadorAtual();

				} else alert('Opa, este campo ja esta marcado!');

				allElementsInSomeLine();
				allElementsInSomeColumn();
				allElementsInSomeDiagonal();
	
				if ( tabuleiroIsFilled() ) {
					alert ('Ninguem ganhou, tente novamente!');
					reset();
				}
				
			
		}
