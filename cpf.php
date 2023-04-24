<?php
	//***********************************************************************************************
	// AUTOR: Ricardo Erick Rebêlo
	// Objetivo: funções para tratar o CPF
	// Alterações:
	// 0.1   24/04/2023 - Começo da primeira conversão

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