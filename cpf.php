<?php
	//***********************************************************************************************
	// AUTOR: Ricardo Erick Reb�lo
	// Objetivo: fun��es para tratar o CPF
	// Altera��es:
	// 0.1   24/04/2023 - Come�o da primeira convers�o

	namespace jacknpoe;

	//***********************************************************************************************
	// Classe CPF

	class CPF
	{
		function validaCPF( $cpf = "")
		{
			$cpf = preg_replace('/[^0-9]/', '', $cpf);
			echo $cpf;
			return true;
		}
	}
?>