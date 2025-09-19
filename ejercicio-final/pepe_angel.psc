Algoritmo pepe
	
		Definir N,i,s5,nar,num,dig,inv,par,impar Como Entero
		s5 <- 0
		nar <- 0
		inv <- 0
		par <- 0
		impar <- 0
		
		Escribir "numer de monedas?"
		Leer N
		
		// torre de suma
		Para i<-1 Hasta N Hacer
			Si i MOD 5 = 0 Entonces
				s5 <- s5 + i
			FinSi
		FinPara
		Escribir "suma mult 5:", s5
		Si s5 > 100 Entonces
			Escribir "pase especial!"
		FinSi
		
		// naranjos
		Para i<-1 Hasta N Hacer
			Si i MOD 2 = 0 Entonces
				nar <- nar + 2
			SiNo
				nar <- nar + 1
			FinSi
		FinPara
		Escribir "naranjs totales:", nar
		
		// espejo (invertir numero)
		num <- N
		Mientras num > 0 Hacer
			dig <- num MOD 10
			inv <- inv * 10 + dig
			num <- num / 10     
		FinMientras
		Escribir "espejo dice:", inv
		
		// puerta
		num <- N
		Mientras num > 0 Hacer
			dig <- num MOD 10
			Si dig MOD 2 = 0 Entonces
				par <- par + 1
			SiNo
				impar <- impar + 1
			FinSi
			num <- num / 10   
		FinMientras
		
		Si par > impar Entonces
			Escribir "Acceso concecido!"
		SiNo
			Escribir "Acceso denegado :("
		FinSi


FinAlgoritmo
